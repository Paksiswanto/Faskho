<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function updateprofile(Request $request, $id)
    {
        //dd($request->all());
        $data = User::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            // $file = $request->file('foto');
            // $extention = $file->getClientOriginalExtension( );
            // $filename = time() . '.' . $extention;
            // $file->move('fotouser/', $filename);
            // $data->foto = $filename;
            Storage::delete('fotouser');$request->file('foto')->store('fotouser', 'public');
            $data->foto = $request->file('foto')->store('fotouser', 'public');
        }
        $data->save();
        // Storage::disk('public')->put('foto',  $request ->file('foto'));
        return redirect()->route('profile')->with('sukses', 'Data Berhasil Di Perbarui');
    }
    // public function updateprofile(Request $request,$id){
    //     $data = User::find($id);
    //     $data->update([
    //         'name' =>$request->name,
    //         'email' =>$request->email,
    //         'deskripsi' =>$request->deskripsi
    //     ]);
    //     if ($request->hasFile('avatar')) {
    //         $data->avatar = $request->file('avatar')->store('foto', 'public');
    //     }
    //     $data->save();
    // return redirect()->route('profile')->with('success','data Berhasil Di Update');
    // }
}
