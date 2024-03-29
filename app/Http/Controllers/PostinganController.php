<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Like;
use App\Models\User;
use App\Models\Komen;
use App\Models\kategori;
use App\Models\TermsCondition;
use App\Models\postingan;
use App\Models\DeletedPost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


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
            ->where('users.is_banned', false)
            ->orderBy('postingans.updated_at', 'desc')
            ->paginate(10);
        $datauser = User::all();
        $datakategori = kategori::all();

        return view('admin.terima.index', compact('data', 'datauser', 'datakategori',));
    }
    public function diterima(Request $request)
    {
        ($request->myCheckbox);
        if ($request->has('myCheckbox')) {
            foreach ($request->myCheckbox as $row) {
                postingan::where('id',$row)->update([
                    'status' => 'diterima'
                ]);
            }
            return redirect('terima')->with('success', 'Postingan Berhasil Diterima');
        } else {
            return redirect()->back()->with('error', 'Tidak ada postingan yang dipilih');
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
        
        return response()->json(['success' => 'Berhasil Menolak'],200);
        }

    public function deletepost($id)
    {
        $data = postingan::find($id);
        if (file_exists(public_path('thumbnail/' . $data->thumbnail))) {
            unlink(public_path('thumbnail/' . $data->thumbnail));
        }
        $deletedPost = new DeletedPost();
        $deletedPost->user_id = $data->user_id;
        $deletedPost->judul = $data->judul;
        $deletedPost->content = 'telah admin hapus karena melanggar aturan komunitas';
        $deletedPost->save();
        $data->delete();
        return redirect()->back()->with('success', 'data Berhasil Di Hapus');
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
        $termsAndConditions = TermsCondition::all();
        $dtkategori = kategori::all();
        $data = postingan::all();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);
        return view('post.postingan.tambah', compact('datauser', 'dtkategori','unreadCount','termsAndConditions'));
    }

    public function insertdatapost(request $request)
    {
        // dd($request->all());
        $validatedata = $request->validate([
            'judul' => 'required|max:65',
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
    // Validasi input
    $validatedData = $request->validate([
        'judul' => 'required',
        'konten' => 'required',
        'deskripsi' => 'required',
        'kategori_id' => 'required',
        'user_id' => 'required',
        'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi file gambar
    ]);

    $data = postingan::with('kategori')->find($id);
    $data->update([
        'judul' => $validatedData['judul'],
        'konten' => $validatedData['konten'],
        'deskripsi' => $validatedData['deskripsi'],
        'kategori_id' => $validatedData['kategori_id'],
        'status' => 'pending',
        'user_id' => $validatedData['user_id']
    ]);

    if ($request->hasFile('thumbnail')) {
        unlink(public_path('thumbnail/' . $data->thumbnail));
        $imageName = time() . '_' . Str::random(10) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
        $request->file('thumbnail')->move('thumbnail/', $imageName);
        $data->thumbnail = $imageName;
        $data->save();
    }

    return redirect()->route('pending', $data->user_id)->with('success', 'Data Berhasil Di Update');
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
        $kat = kategori::all()->take(3);
        $kategori = kategori::query()
        ->where('kategori', 'LIKE', '%'.$cari.'%')
        ->paginate();

        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);
        return view('user.lainnya', compact( 'kat','kategori','data','unreadCount'));
    }
    //ini untuk tampil di halaman utama
    public function tampil(Request $request, $id)
    {
        $kat = kategori::all()->take(3);
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
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);
    
        // dd($kat,$komentars,$like,$data,$balas,$totallike,$trend);
        return view('user.tampil', compact('data', 'komentars', 'balas', 'totallike', 'trend', 'kat','komenhi','unreadCount'));
    }

    public function artikel(Request $request)
    {
        $keyword = $request->key;
        $kat = kategori::all()->take(3);
        $artikel = DB::table('postingans')
        ->where('judul', 'LIKE', '%' . $keyword . '%')
        ->join('users', 'postingans.user_id', '=', 'users.id')
        ->select('postingans.id', 'postingans.thumbnail', 'postingans.views', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
        ->where('users.is_banned', '=', 0)
        ->where('postingans.status','=','diterima')
        ->orderBy('postingans.views', 'desc')
        ->paginate(9);

        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);
        
        return view('user.artikel', compact('artikel', 'kat','unreadCount'));
    }
    public function litindex(Request $request)
    {
        $keyword = $request->keyword;
        $kat = kategori::all()->take(3);
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

            $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);
        return view('user.index', compact('posts', 'data', 'trend', 'randomData', 'kat','unreadCount'));
    }
    public function storeKomentar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => ['required', 'not_regex:/\b(kontol|memek|anjing|asu|kirek)\b/i'],
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|numeric|min:1|max:5',
        ], [
            'pesan.not_regex' => 'Komentar mengandung kata-kata tidak sopan',
        ]);
        
        if ($validator->fails()) {
            Toastr::warning($validator->errors()->first(), 'Warning');
            return redirect()->back()->withErrors($validator)->withInput();
        }
                
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
            $data = Komen::where('id',$induk)->get();
            $post=postingan::find($id);

            $deletedPost = new DeletedPost();
            $deletedPost->user_id=$post->user_id;
            $deletedPost->content ="Anda Mendapatkan Balasan Dari <h6>".$request->nama."</h6> Pada Komentar <b>".$post->judul."</b>.berupa: ".$request->pesan;
            $deletedPost->foto=$post->thumbnail;
            $deletedPost->post_id=$post->id;
            $deletedPost->save();
            
        
        }
        $foto = $request->file('foto');
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('storage/komentar/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }


        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan','error','komentar');
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

        $notifications=DB::table('deleted_posts')
            ->join('postingans', 'deleted_posts.post_id', '=', 'postingans.id')
            ->select('deleted_posts.id', 'deleted_posts.foto', 'postingans.views', 'deleted_posts.created_at', 'postingans.judul', 'postingans.deskripsi','postingans.status','deleted_posts.user_id','deleted_posts.content','deleted_posts.read_at','deleted_posts.post_id')
            ->where('deleted_posts.user_id',$id)
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
        $balas = Komen::where('parent',$id)->get();

        foreach ($balas as $key) {
            $key->delete();
        }
        $data->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }

    public function kategori2(Request $request,$id)
    {
        $kat = kategori::all()->take(3);
        $kategori = Kategori::find($id);
        $keyword = $request->cari;

        $data = postingan::where('judul', 'LIKE', '%'.$keyword.'%')
        ->where('kategori_id',$id)
        ->join('users', 'postingans.user_id', '=', 'users.id')
        ->select('postingans.id', 'postingans.thumbnail', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi')
        ->where('postingans.status','=','diterima')
        ->where('users.is_banned', '=', 0)
        ->paginate(9);
        $firstPost = $data->firstItem();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();
    $unreadCount = count($notifications);
        return view('user.kategori', compact('kategori', 'data', 'kat','unreadCount'));
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

    public function markAllAsRead()
    {
        $user = Auth::user();
        DB::table('deleted_posts')->where('user_id', $user->id)->update(['read_at' => now()]);
        return redirect()->back()->with('success','Notifikasi Telah dibaca semua');
    }
}

