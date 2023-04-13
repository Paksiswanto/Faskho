<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Komen;
use App\Models\kategori;
use App\Models\postingan;
use App\Models\DeletedPost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PostinganController extends Controller
{
    public function postingan(Request $request)
    {
        $keyword = $request->keyword;
        $data = postingan::with('kategori')->where('judul', 'LIKE', '%' . $keyword . '%')
        ->join('users', 'postingans.user_id', '=', 'users.id')
        ->select('postingans.id', 'postingans.thumbnail','postingans.kategori_id', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
            ->where('postingans.status', 'pending')
            ->where('users.is_banned',false)
            ->orderBy('postingans.updated_at', 'desc')
            ->paginate(10);
        $datauser = User::all();
        $datakategori = kategori::all();


        return view('admin.postingan.index', compact('data', 'datauser', 'datakategori',));
    }

    public function  pending(Request $request, $id)
    {
        $keyword = $request->key;
        $notif = DeletedPost::where('user_id', $id)->count();
        $data = Postingan::where('judul', 'like', '%' . $keyword . '%');
        $data = Postingan::where('user_id', $id)
        ->where('status', 'pending')
            ->paginate(5);
        $user = Auth::user();
        if ($user->id != $id) {
            return view('error.403');
        }
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();

$unreadCount = count($notifications);

        return view('post.postingan.pending', ['data' => $data, 'notif' => $notif], compact('data', 'notif','unreadCount'));
    }
    

    public function terima(Request $request)
    {
        $keyword = $request->keyword;
        $data = postingan::where('judul', 'LIKE', '%' . $keyword . '%')
        ->join('users', 'postingans.user_id', '=', 'users.id')
        ->select('postingans.id', 'postingans.thumbnail','postingans.kategori_id', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
            ->where('postingans.status', 'diterima')
            ->orderBy('postingans.updated_at', 'desc')
            ->paginate(10);
        $datauser = User::all();
        $datakategori = kategori::all();

        return view('admin.terima.index', compact('data', 'datauser', 'datakategori',));
    }
    public function diterima(Request $request)
    {
        if ($request->has('myCheckbox')) {
            foreach ($request->myCheckbox as $row) {
                postingan::find($row)->update([
                    'status' => 'diterima'
                ]);
            }
            return redirect('terima')->with('success', 'Promo Berhasil Diterima');
        } else {
            return redirect()->back()->with('error', 'Tidak ada promo yang dipilih');
        }
    }

    public function tolak(Request $request,$id)
    {
        $keyword = $request->key;
        $notif = DeletedPost::where('user_id', $id)->count();
        $data = Postingan::where('judul', 'like', '%' . $keyword . '%');
        $data = Postingan::where('user_id', $id)
        ->where('status', 'ditolak')
            ->paginate(5);
        $user = Auth::user();
        if ($user->id != $id) {
            return view('error.403');
        }

        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();

$unreadCount = count($notifications);

        return view('post.postingan.post', ['data' => $data, 'notif' => $notif], compact('data', 'notif','unreadCount'));
    }
    

      
    public function ditolak(Request $request,$id)
    {
        $data = postingan::find($id);
        $data->update(
            [
                'status' => 'ditolak'
            ]
        );
        $data = postingan::find($id);
        $deletedPost = new DeletedPost();
        $deletedPost->user_id = $data->user_id;
        $deletedPost->judul = $data->judul;
        $deletedPost->content ="postigan anda judul ".$data->judul." kami tolak karena ". $request->pesan;
        $deletedPost->foto=$data->thumbnail;
        $deletedPost->post_id=$data->id;
        $deletedPost->save();
        
        return redirect()->back()->with('sukses', 'Data Berhasil Di Perbarui');
    }

    public function deletepost($id)
    {
        $data = postingan::find($id);
        $deletedPost = new DeletedPost();
        $deletedPost->user_id = $data->user_id;
        $deletedPost->judul = $data->judul;
        $deletedPost->content = 'telah admin hapus karena melanggar aturan komunitas';
        $deletedPost->save();
        $data->delete();
        return redirect()->route('postingan')->with('success', 'data Berhasil Di Hapus');
    }

    public function  posts(Request $request, $id)
    {
        $keyword = $request->key;
        $notif = DeletedPost::where('user_id', $id)->count();
        $data = Postingan::where('judul', 'like', '%' . $keyword . '%');
        $data = Postingan::where('user_id', $id)
            ->where('status','=','diterima')
            ->paginate(5);
        $user = Auth::user();
        if ($user->id != $id) {
            return view('error.403');
        }
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();

$unreadCount = count($notifications);

        return view('post.postingan.post', ['data' => $data, 'notif' => $notif], compact('data', 'notif','unreadCount'));
    }
    public function tambahpostingan()
    {
        $datauser = User::all();
        $dtkategori = kategori::all();
        $data = postingan::all();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);
        return view('post.postingan.tambah', compact('datauser', 'dtkategori','unreadCount'));
    }

    public function insertdatapost(request $request)
    {
        // dd($request->all());
        $validatedata = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,jfif',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'agree' => 'required',

        ]);
        $data = postingan::create($request->all());

        if ($request->hasFile('thumbnail')) {
            $imageName = time() . '_' . Str::random(10) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move('thumbnail/', $imageName);
            $data->thumbnail = $imageName;
            $data->save();
        }
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();

$unreadCount = count($notifications);
        return redirect()->route('pending', $data->user_id)->with('success', 'data Berhasil Ditambahkan',compact('unreadCount'));
    }

    public function tampilkandatapostingan($id)
    {
        $data = postingan::with('kategori')->find($id);
        $user_id = User::all();
        $dtkategori = kategori::all();
        $kt = postingan::with('kategori')->find($id);
        if ($data->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();

$unreadCount = count($notifications);

        // dd($data);
        return view('post.postingan.tampildatapost', compact('data', 'user_id', 'dtkategori', 'kt','unreadCount'));
    }
    public function updt(Request $request, $id)
    {
        $data = postingan::with('kategori')->find($id);
        $data->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'status'=>'pending',
            'user_id' => $request->user_id

        ]);
        if ($request->hasFile('thumbnail')) {
            unlink(public_path('thumbnail/' . $data->thumbnail));
            $imageName = time() . '_' . Str::random(10) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move('thumbnail/', $imageName);
            $data->thumbnail = $imageName;
            $data->save();
        }
        return redirect()->route('posts', $data->user_id)->with('success', 'data Berhasil Di Update');
    }
    public function deletepostingan($id)
    {
        $data = postingan::find($id);
        // Hapus file foto dari server
        if (file_exists(public_path('thumbnail/' . $data->thumbnail))) {
            unlink(public_path('thumbnail/' . $data->thumbnail));
        }

        $data->delete();

        return redirect()->back()->with('success', 'Post berhasil dihapus.');
    }
    //ini untuk pratinjau
    public function show($id)
    {
        $data = postingan::findOrFail($id);
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
        ->where('user_id', Auth::id())
        ->whereNull('read_at')
        ->get();
        
        $unreadCount = count($notifications);
        if ($data->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);  
          return view('post.postingan.show', compact('data','unreadCount','unreadCount'));
    }
    public function pembuka()
    {
        $pembuka = postingan::where('kategori_id', '=', '1')
            ->paginate(9);
        return view('user.pembuka', compact('pembuka'));
    }

    public function utama()
    {
        $utama = postingan::where('kategori_id', '=', '2')
            ->paginate(9);
        return view('user.utama', compact('utama'));
    }

    public function penutup()
    {
        $penutup = postingan::where('kategori_id', '=', '3')
            ->paginate(9);
        return view('user.penutup', compact('penutup'));
    }

    public function lainnya(Request $request)
    {
        $cari =$request->cari;
        $data=postingan::where('kategori_id', '=', '4');
        $kat = kategori::query()
        ->where('kategori', 'LIKE', '%'.$cari.'%')
        ->paginate();
        $kategori = kategori::all();
        return view('user.lainnya', compact( 'kat','kategori','data'));
    }
    //ini untuk tampil di halaman utama
    public function tampil(Request $request, $id)
    {
        $kat = kategori::all();
        $komentars = Komen::where('postingan_id', $id)->get();
        $like = Komen::where('komen_id', $request->komen_id)->count();
        $data = postingan::findOrFail($id);
        $balas = komen::all();
        $totallike = like::where('komen_id')->count();
        $trend = postingan::all();
        $trend = DB::table('postingans')
        ->join('users', 'postingans.user_id', '=', 'users.id')
        ->select('postingans.id', 'postingans.thumbnail', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
        ->where('users.is_banned', '=', 0)
        ->where('postingans.status','=','diterima')
        ->orderBy('views', 'desc')
        ->get()
        ->take(10);
        $komenhi=Komen::where('postingan_id',$id)->count();
    
        // dd($kat,$komentars,$like,$data,$balas,$totallike,$trend);
        return view('user.tampil', compact('data', 'komentars', 'balas', 'totallike', 'trend', 'kat','komenhi'));
    }

    public function artikel(Request $request)
    {
        $keyword = $request->key;
        $kat = kategori::all();
        $artikel = DB::table('postingans')
        ->where('judul', 'LIKE', '%' . $keyword . '%')
        ->join('users', 'postingans.user_id', '=', 'users.id')
        ->select('postingans.id', 'postingans.thumbnail', 'postingans.views', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
        ->where('users.is_banned', '=', 0)
        ->where('postingans.status','=','diterima')
        ->orderBy('postingans.views', 'desc')
        ->paginate(9);
        
        return view('user.artikel', compact('artikel', 'kat'));
    }
    public function litindex(Request $request)
    {
        $keyword = $request->keyword;
        $kat = kategori::all();
        $data = postingan::with('kategori')->where('judul', 'LIKE', '%' . $keyword . '%');
        $randomData = DB::table('postingans')
            ->join('users', 'postingans.user_id', '=', 'users.id')
            ->select('postingans.id', 'postingans.thumbnail', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
            ->where('postingans.status','=','diterima')
            ->where('users.is_banned', '=', 0)->inrandomOrder()->take(2)->get();


        $posts = DB::table('postingans')
            ->join('users', 'postingans.user_id', '=', 'users.id')
            ->select('postingans.id', 'postingans.thumbnail', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
            ->where('users.is_banned', '=', 0)
            ->where('postingans.status','=','diterima')
            ->orderBy('postingans.created_at', 'desc')
            ->get()
            ->take(5);


        $data = DB::table('postingans')
            ->join('users', 'postingans.user_id', '=', 'users.id')
            ->select('postingans.id', 'postingans.thumbnail', 'postingans.views', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
            ->where('users.is_banned', '=', 0)
            ->where('postingans.status','=','diterima')
            ->orderBy('postingans.views', 'desc')
            ->get()
            ->take(10);

        $trend = DB::table('postingans')
            ->join('users', 'postingans.user_id', '=', 'users.id')
            ->select('postingans.id', 'postingans.thumbnail', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
            ->where('users.is_banned', '=', 0)
            ->where('postingans.status','=','diterima')
            ->orderBy('views', 'desc')
            ->get()
            ->take(1);
        return view('user.index', compact('posts', 'data', 'trend', 'randomData', 'kat'));
    }
    public function storeKomentar(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|numeric|min:1|max:5',
        ]);
        $post=postingan::find($id);
        $data = Komen::create($request->all());
        $deletedPost = new DeletedPost();
        $deletedPost->user_id=$post->user_id;
        $deletedPost->content ="Anda Mendapatkan Komentar Dari <h6>".$request->nama."</h6> Pada Postingan <b>".$post->judul."</b>.berupa: ".$request->pesan;
        $deletedPost->foto=$post->thumbnail;
        $deletedPost->post_id=$id;
        $deletedPost->save();
        if ($data->parent != 0) {
            // Ambil induk komentar dari database
            $induk = Komen::find($data->parent);
            $data = Komen::where('id',$induk);
            dd($data);
        } else {
            // data adalah induk komentar
            $induk = $data;
        }

        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('storage/komentar/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }


        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function showTotalviews($id)
    {
        $postingan = postingan::all();
        $user = Auth::user();

        $totalpostingan = postingan::where('user_id', $id)->where('status','diterima')->count();
        $totalviews = postingan::where('user_id', $id)->sum('views');
        $postings = postingan::select('judul', 'views')
            ->where('status','diterima')
            ->where('user_id', $user->id)
            ->orderBy('views', 'DESC')
            ->take(6)
            ->get();
        $user = Auth::user();
        if ($user->id != $id) {
            return view('error.403');
        }
        $data = [];

        foreach ($postings as $posting) {
            $data[] = [
                'judul' => $posting->judul,
                'views' => $posting->views
            ];
        }
        $data = array_reverse($data);
        $data = array_slice($data, 0, 6);
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);
        return view('statistik', ['totalpostingan' => $totalpostingan, 'totalviews' => $totalviews, 'data' => $data,'unreadCount'=>$unreadCount]);
    }

    public function like()
    {

        return redirect('tampil', compact('totallike'));
    }

    public function komenku($id)
    {

        $data = komen::all();
        $data = Komen::where('user_id', $id)
            ->paginate(5);
        $user = Auth::user();
        if ($user->id != $id) {
            return view('error.403');
        }
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);
        return view('komenku', ['data' => $data], compact('data','unreadCount'));
    }
    public function notif($id)
    {
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();

$unreadCount = count($notifications);
        return view('post.notif', compact('notifications','unreadCount'));
    }
    public function hapus($id)
    {
        $data = DeletedPost::find($id);
        $data->delete();
        return redirect()->back()->with('success,Data berhasil di hapus');
    }

    public function deletekomenku($id)
    {
        $data = Komen::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }

    public function kategori2($id)
    {
        $kat = kategori::all();
        $kategori = kategori::where('id', $id)->get()->first();

        $data = postingan::where('kategori_id', $id)->paginate(9);
        return view('user.kategori', compact('kategori', 'data', 'kat'));
    }
    public function markAsRead($id)
{
    $notification = DB::table('deleted_posts')->where('id', $id)->update(['read_at' => now()]);
    
    return redirect()->back()->with('success','Berhasil');
}

public function lihat($id)
{
    $data = postingan::findOrFail($id);
        

    return view('admin.postingan.lihat', compact('data'));
}

}
