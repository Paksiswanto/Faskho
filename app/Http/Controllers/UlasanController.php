<?php

namespace App\Http\Controllers;
use App\Models\ulasan;

use Illuminate\Http\Request;

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
        $validatedata=$request->validate([
            'nama'=>'required',
            'komentar'=>'required'
        ]);
    $data = ulasan::create($request->all());
    
    return redirect()->route('ulasan')->with('success','data Berhasil Ditambahkan');
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

}
