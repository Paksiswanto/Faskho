<?php

namespace App\Http\Controllers;
use App\Models\tempat;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class TempatController extends Controller
{
    public function  index(Request $request)
    {
        $keyword = $request->keyword;
        $data = tempat::where('nama', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
        return view('post.tempat.index',compact('data'));
      
    }
    public function tambahtempat(){
        $data = tempat::all();
        return view('post.tempat.tambah');
    }
    
    public function insertdatatempat(request $request){
        //dd($request->all());
        $validatedata=$request->validate([
            'Nama'=>'required',
            'jam_oprasional'=>'required',
            'Alamat'=>'required',
            'konten'=>'required'

        ]);
    $data = tempat::create($request->all());
    
    return redirect()->route('tempat')->with('success','data Berhasil Ditambahkan');
    }
    public function tampilkandatatempat($id){
        $data = tempat::find($id);
       // dd($data);
       return view('post.tempat.tampildatatempat', compact('data'));
    }
    public function updatedata(Request $request,$id){
        $data = tempat::find($id);
        $data->update([
            'Nama' =>$request->Nama,
            'jam_oprasional' =>$request->jam_oprasional,
            'Alamat' =>$request->Alamat,
            'konten' =>$request->konten

        ]);
    return redirect()->route('tempat')->with('success','data Berhasil Di Update');
    }
    public function deletetempat($id){
        $data = tempat::find($id);
        $data->delete();
        return redirect()->route('tempat')->with('success','data Berhasil Di Hapus');

    }
    
}
