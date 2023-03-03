<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $data=User::all();
        return view('post.profile',['data'=>$data]);
    }
    public function tampilprofile($id){
        $data = User::find($id);
        $data=User::all();
       // dd($data);
       return view('post.edit', compact('data'));
    }
    public function updatedpo(Request $request,$id){
        $data = User::find($id);
        $data->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'deskripsi' =>$request->deskripsi,
        ]);
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('avatar/', $request->file('avatar')->getClientOriginalName());
            $data->foto = $request->file('avatar')->getClientOriginalName();
            $data->save();
        }
    return redirect()->route('profile')->with('success','data Berhasil Di Update');
    }
}
