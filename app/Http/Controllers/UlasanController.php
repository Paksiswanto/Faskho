<?php

namespace App\Http\Controllers;

use App\Models\ulasan;
use App\Models\Comment;
use App\Models\postingan;

use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Yoeunes\Toastr\Toastr as ToastrToastr;

class UlasanController extends Controller
{
    public function  index(Request $request)
    {
        $keyword = $request->keyword;
        $data = ulasan::where('nama', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
        return view('dataulasan',compact('data'));
    }
    public function tambahulasan(){
        $data = ulasan::all();
        return view('tambahulasan');
    }
    
    public function insertdataulasan(request $request){
        //dd($request->all());
    $data = ulasan::create($request->all());
    return redirect()->back()->with('success','Ulasan Dikirim, terimakasih atas ulasan anda');
    }
    public function tampilkandataulasan($id){
        $data = ulasan::find($id);
       // dd($data);
       return view('tampildataulasan', compact('data'));
    }
    public function updatedata(Request $request,$id){
        $data = ulasan::find($id);
        $data->update([
            'nama' =>$request->nama,
            'komentar' =>$request->komentar,

        ]);
    return redirect()->route('ulasan')->with('success','data Berhasil Di Update');
    }
    public function deletedata($id){
        $data = ulasan::find($id);
        $data->delete();
        return redirect()->route('ulasan')->with('success','data Berhasil Di Hapus');

    }
    public function store(Request $request)
{
    $comment = new Comment();
    $comment->content = $request->body;
    $comment->post_id = $request->post_id;
    $comment->user_id = auth()->user()->id;
    $comment->save();
    return redirect()->back();
}
public function show($id)
{
    $post = postingan::findOrFail($id);
    $comments = $post->comments()->with('user')->get();

    return view('user.single1', compact('post', 'comments'));
}
public function hubungi(Request $request)
    {
        $keyword =  $request->keyword;
        // dd($keyword);
        $data = ulasan::where('nama','LIKE','%'.$keyword.'%')->get();
        return view('login.hubungi',compact('data'));
    }
    public function inserthubungii(Request $request)
    { 
        $request->validate([
            'email' => 'required|exists:users,email'
        ]);
            ulasan::create([
            'nama' => $request->nama, 
            'email' => $request->email,
            'laporan' => $request->laporan
        ]);
        return redirect()->back()->with('success', 'Anda berhasil mengirimkan pesan!');;
    }
    public function dataulasan()   
    {
        $data = ulasan::all();
        return view('user.dataulasan', compact('data'));
    }
    public function deletehubungi($id){ 
        $data = ulasan::find($id);
        $data->delete();
        return back() ->with('success', 'Data Behasil Di Hapus!');
    }

    public function data($id)
{
    
    $data = ulasan::findOrFail($id);
    return response()->json($data->laporan);
}

    

}
