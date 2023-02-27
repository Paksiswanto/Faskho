<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use App\Models\User;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = postingan::where('judul', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
                $data2=User::all();
        return view('post.postingan.index',compact('data'));
    }

        public function  posts(Request $request)
        {
            $keyword = $request->keyword;
            $data = postingan::where('nama', 'LIKE', '%'.$keyword.'%')
                    -> paginate(10);
            return view('post.tempat.index',compact('data'));
          
        }
        public function tambahtempat(){
            $data = postingan::all();
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
        $data = postingan::create($request->all());
        
        return redirect()->route('tempat')->with('success','data Berhasil Ditambahkan');
        }
        public function tampilkandatatempat($id){
            $data = postingan::find($id);
           // dd($data);
           return view('post.tempat.tampildatatempat', compact('data'));
        }
        public function updatedata(Request $request,$id){
            $data = postingan::find($id);
            $data->update([
                'Nama' =>$request->Nama,
                'jam_oprasional' =>$request->jam_oprasional,
                'Alamat' =>$request->Alamat,
                'konten' =>$request->konten
    
            ]);
        return redirect()->route('tempat')->with('success','data Berhasil Di Update');
        }
        public function deletetempat($id){
            $data = postingan::find($id);
            $data->delete();
            return redirect()->route('tempat')->with('success','data Berhasil Di Hapus');
    
        }
    }

