<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use App\Models\Komen;
use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function inut(){
        $data = postingan::all();
        $komen = Komen::all();
        return view ('user.utama1', ['data' => $data, 'komen' => $komen]);
    }
    public function inpem(){
        $data = postingan::all();
        $komen = Komen::all();
        return view ('user.pembuka1', ['data' => $data, 'komen' => $komen]);
    }
    public function inpes(){
        $data = postingan::all();
        $komen = Komen::all();
        return view ('user.tampil', ['data' => $data, 'komen' => $komen]);
    }
   public function insert(Request $request){
       $data = Komen::create([
            'rating' => $request->rating,
            'nama' => $request->nama, 
            'email' => $request->email,
            'foto' => $request->foto,
            'pesan' => $request->pesan
        ]);
        // dd($data);
        if($request->hasFile('foto')){

            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save(); 

        }
<<<<<<< Updated upstream
        return redirect()->route('inpem');
        return redirect()->route('index');
<<<<<<< Updated upstream
=======
        return redirect()->route('inut');
>>>>>>> Stashed changes
=======
        
>>>>>>> Stashed changes
    }
}
