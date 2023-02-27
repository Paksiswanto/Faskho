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
            'nama'=>'required',
            'jam_oprasional'=>'required',
            'alamat'=>'required'
        ]);
    $data = tempat::create($request->all());
    
    return redirect()->route('tempat')->with('success','data Berhasil Ditambahkan');
    }
    public function tampilkandatatempat($id){
        $data = tempat::find($id);
       // dd($data);
       return view('tampildatatempat', compact('data'));
    }
    public function updatetempat(Request $request,$id){
        $data = tempat::find($id);
        $data->update([
            'nama' =>$request->nama,
            'jam_oprasional' =>$request->jam_oprasional,
            'alamat' =>$request->alamat,

        ]);
    return redirect()->route('tempat')->with('success','data Berhasil Di Update');
    }
    public function deletetempat($id){
        $data = tempat::find($id);
        $data->delete();
        return redirect()->route('tempat')->with('success','data Berhasil Di Hapus');

    }
    
}
