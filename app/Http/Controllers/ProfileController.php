<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
        $data = User::where('id', $id);
        $user = Auth::user();
        if ($user->id != $id) {
         return view('error.403');

        }
       // dd($data);
       return view('post.edit', compact('data'));
    }
    public function updateprofile(Request $request, $id)
    {
        //dd($request->all());
        $user = User::find($id);
        if($request->hasFile('foto')){
            $data = DB::table('users')->where('id',$id)->get();
            foreach($data as $datas){
            $foto = $datas->foto;
            Storage::delete('public/'.$foto);
            }

            $foto = Storage::disk('public')->put('fotouser',$request->file('foto'));
            $data=([
                'foto'=>$foto,
            ]);
            $user->update($data);
    }
    return redirect()->route('profile');

}
}

