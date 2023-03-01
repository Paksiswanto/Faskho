<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use App\Models\User;
use App\Models\kategori;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        $data = postingan::findOrFail($id);
        return view('post.postingan.show', compact('data'));
    }
}
