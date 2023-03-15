<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Komen;
use App\Models\kategori;
use App\Models\postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostinganController extends Controller
{
    public function postingan(Request $request)
    {
        $keyword = $request->keyword;
        $data = postingan::with('kategori')->where('judul', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        $datauser = User::all();
        $datakategori = kategori::all();
        return view('admin.postingan.index', compact('data', 'datauser', 'datakategori'));
    }

    public function deletepost($id)
    {
        $data = postingan::find($id);
        $data->delete();
        
         // set cookie untuk notifikasi popup
         setcookie("article_deleted", "true", time() + (86400 * 30), "/posts"); // berlaku selama 30 hari
        return redirect()->route('postingan')->with('success', 'data Berhasil Di Hapus');
    }
    


    public function  posts(Request $request,$id)
        {
        $keyword = $request->keyword;
        $data = postingan::with('kategori')->where('judul', 'LIKE', '%' . $keyword . '%')
            ;
            
               $data = Postingan::where('user_id', $id)->paginate(5);
               $user = Auth::user();
               if ($user->id != $id) {
                return view('error.403');

               }
        return view('post.postingan.post',['data' => $data],compact('data'));

    }
    public function tambahpostingan()
    {
        $datauser = User::all();
        $dtkategori = kategori::all();
        $data = postingan::all();

        return view('post.postingan.tambah', compact('datauser','dtkategori'));
    }

    public function insertdatapost(request $request)
    {
        //dd($request->all());
        $validatedata = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'agree' => 'required',
            'tag' => 'required'

        ]);
        $data = postingan::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('thumbnail/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        
        return redirect()->route('posts',$data->user_id)->with('success', 'data Berhasil Ditambahkan');
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

        // dd($data);
        return view('post.postingan.tampildatapost', compact('data', 'user_id','dtkategori','kt'));
    }
    public function updt(Request $request, $id)
    {
        $data = postingan::with('kategori')->find($id);
        $data->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'tag' => $request->tag,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'user_id' => $request->user_id

        ]);
        if ($request->hasFile('foto')) {
            unlink(public_path('thumbnail/'.$data->foto));
            $request->file('foto')->move('thumbnail/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('posts',$data->user_id)->with('success', 'data Berhasil Di Update');
    }
    public function deletepostingan($id)
    {
        $data = postingan::find($id);
        $data->delete();
        $cookie_name = "article_deleted";
        $cookie_value = true;
        $cookie_expire = time() + (60 * 60 * 24); // cookie akan berlaku selama 1 hari
        setcookie($cookie_name, $cookie_value, $cookie_expire, "/");
            return redirect()->back()->with('success', 'Post berhasil dihapus.');
        }
        //ini untuk pratinjau
    public function show($id)
    {
        $data = postingan::findOrFail($id);
        if ($data->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('post.postingan.show', compact('data'));
    }
    public function pembuka()
    {
        $pembuka = postingan::where('kategori_id', '=', '1')
        ->paginate(6)
        ;
        return view('user.pembuka',compact('pembuka'));
    }

    public function utama()
    {
        $utama=postingan::where('kategori_id', '=', '2')
        ->paginate(6)
        ;
        return view('user.utama',compact('utama'));
    }

    public function penutup()
    {
        $penutup=postingan::where('kategori_id', '=', '3') 
        ->paginate(6)
        ;
        return view('user.penutup',compact('penutup'));
    }
    //ini untuk tampil di halaman utama
    public function tampil($id)
    {
        $data = postingan::findOrFail($id);
        $komentars = Komen::where('postingan_id', $id)->get();


        return view('user.tampil', compact('data','komentars'   ));
    }

    public function artikel(Request $request)
    {
        $keyword = $request->key;
        $artikel = postingan::where('judul', 'LIKE', '%' . $keyword . '%')
            ->paginate(3);

        return view('user.artikel',compact('artikel'));
    }
    public function litindex(Request $request)
    {
        $keyword = $request->keyword;

        $data = postingan::with('kategori')->where('judul', 'LIKE', '%' . $keyword . '%');

            $posts=postingan::all();
            $posts = DB::table('postingans')
            ->latest()
            ->get()
            ->take(5);
            
            $data=postingan::all();
            $data=DB::table('postingans')
            ->orderBy('views','desc')
            ->get()
            ->take(10);
        return view('user.index',compact('posts','data'));
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

        $data = Komen::create($request->all());
        
        $foto = $request->file('foto');
        if($request->hasFile('foto')){
                $request->file('foto')->move('storage/komentar/', $request->file('foto')->getClientOriginalName());
                $data->foto = $request->file('foto')->getClientOriginalName();
                $data->save();
            }
        

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function showTotalviews($id)
{
    $postingan=postingan::all();
    $user = Auth::user();

    $totalpostingan=$user->postingans->count();
    $totalviews=$user->postingans->sum('views');
$postings = postingan::select('judul', 'views')
->where('user_id', $user->id)
->orderBy('views', 'DESC')
->limit(25)
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

    return view('statistik',['totalpostingan'=>$totalpostingan,'totalviews'=>$totalviews,'data'=>$data]);
}


    public function like(Komen $komen)
    {
        
        $komen->like();
        return back();
        return redirect()->back();
    }
}


