<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use App\Models\User;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostinganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = postingan::with('kategori')->where('judul', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        $datauser = User::all();
        $datakategori = kategori::all();
        return view('admin.postingan.index', compact('data', 'datauser', 'datakategori'));
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
        return redirect()->route('posts')->with('success', 'data Berhasil Di Hapus');
    }
        //ini untuk pratinjau
    public function show($id)
    {
        $data = postingan::findOrFail($id);
        $data->increment('views');

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
        $penutup=postingan::where('kategori_id', '=', '3')->get()
        ->paginate(6);;
        return view('user.penutup',compact('penutup'));
    }
    //ini untuk tampil di halaman utama
    public function tampil($id)
    {
        $data = postingan::findOrFail($id);
        $data->increment('views');

        return view('user.tampil', compact('data'));
    }

    public function artikel()
    {
        $artikel=postingan::all();
        return view('user.artikel',compact('artikel'));
    }
}
