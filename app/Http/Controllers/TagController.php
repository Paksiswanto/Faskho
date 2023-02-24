<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function  index(Request $request)
    {
        $keyword = $request->keyword;
        $data = tag::where('tag', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
        return view('admin.tag.index',compact('data'));
    }
    public function tambahtag(){
        $data = tag::all();
        return view('admin.tag.tambah',compact('data'));
    }
    public function insertdatatag(request $request){
    $data = tag::create($request->all());
    
    return redirect()->route('tag')->with('success','data Berhasil Ditambahkan');
    }

    public function deletede($id){
        $data = tag::find($id);
        $data->delete();
        return redirect()->route('index')->with('success','data Berhasil Di Hapus');

    }

}


