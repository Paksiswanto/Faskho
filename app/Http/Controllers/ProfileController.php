<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DeletedPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile($id)
    {
        $data=User::all();
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();

$unreadCount = count($notifications);
        return view('post.profile',['data'=>$data,'unreadCount'=>$unreadCount]);
    }
    public function tampilprofile($id){
        $data = User::find($id);
        $data=User::all();
        $data = User::where('id', $id);
        $user = Auth::user();
        if ($user->id != $id) {
         return view('error.403');

        }
        $notifications= DeletedPost::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('deleted_posts')
    ->where('user_id', Auth::id())
    ->whereNull('read_at')
    ->get();

$unreadCount = count($notifications);
       // dd($data);
       return view('post.edit', compact('data','unreadCount'));
    }
    public function updateprofile(Request $request, $id)
    {
        $validatedata = $request->validate([
            'name' => 'required|max:10',
            'foto' => 'mimes:png,jpg,jpeg,jfif',

        ]);
        //dd($requ
        $user = User::find($id);
        $user->update([
            'name' => $request->name,

        ]);
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
    
    return redirect()->route('profile',$user->id);

}
}

