<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use App\Models\Komen;
use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function index(){
        $data = postingan::all();
        $komen = Komen::all();
        return view ('user.utama1', ['data' => $data, 'komen' => $komen]);
    }
   public function insert(Request $request){
       $data = Komen::create([
            'nama' => $request->nama, 
            'email' => $request->email,
            'foto' => $request->foto,
            'pesan' => $request->pesan
        ]);
        // dd($data);
        if($request->hasFile('foto')){
<<<<<<< HEAD
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
=======
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOrigialName());
            $data->foto=$request->file('foto')->getClientOriginalName();
            $data->save();  
>>>>>>> f88e9ef42a0ec8cb3b275acf69b19ea6b770a792
        }
        return redirect()->route('index');
    }
}
