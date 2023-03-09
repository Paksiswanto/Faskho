<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use App\Models\User;
use App\Models\kategori;
use App\Models\Komen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    


    public function  posts(Request $request)
    {
        $keyword = $request->keyword;
        $data = postingan::with('kategori')->where('judul', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);
        return view('post.postingan.post', compact('data'));
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
        return redirect()->route('posts')->with('success', 'data Berhasil Ditambahkan');
    }
    public function tampilkandatapostingan($id)
    {
        $data = postingan::with('kategori')->find($id);
        $user_id = User::all();
        $dtkategori = kategori::all();
        $kt = postingan::with('kategori')->find($id);


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
        return redirect()->route('posts')->with('success', 'data Berhasil Di Update');
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

        return view('post.postingan.show', compact('data'));
    }
    public function pembuka()
    {
        $pembuka = postingan::where('kategori_id', '=', '1')->get()
        ;
        return view('user.pembuka',compact('pembuka'));
    }

    public function utama()
    {
        $utama=postingan::where('kategori_id', '=', '2')->get()
        ;;
        return view('user.utama',compact('utama'));
    }

    public function penutup()
    {
        $penutup=postingan::where('kategori_id', '=', '3')->get();
        return view('user.penutup',compact('penutup'));
    }
    //ini untuk tampil di halaman utama
    public function tampil($id)
    {
        $data = postingan::findOrFail($id);
        $data->increment('views');
        $komentars = Komen::where('postingan_id', $id)->get();


        return view('user.tampil', compact('data','komentars'   ));
    }

    public function artikel()
    {
        $artikel=postingan::all();
        return view('user.artikel',compact('artikel'));
    }
    public function litindex(Request $request)
    {
        $keyword = $request->keyword;

        $results = DB::table('postingans')
           ->where('judul', 'LIKE', "%{$keyword}%")
           ->get();

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

        $foto = $request->file('foto');
        if ($foto) {
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->storeAs('public/komentar', $fotoName);
        } else {
            $fotoPath = null;
        }

        $komentar = Komen::create($request->all());

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}
