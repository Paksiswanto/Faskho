<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\postingan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = User::where('name', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
        return view('admin.user.index',compact('data'));
    }
    public function showTotalUsers()
{
    $totalUsers = User::count();
    $user=user::all();
    $totalpostingan=postingan::count();
    $totallaporan=laporan::count();
    
    $data=[];
    $data2=[];
    $data3=[];
foreach($user as $us){
    $data[]=$totalUsers;
    $data2[]=$totallaporan;
    $data3[]=$totalpostingan;
}


    return view('admin', ['totalUsers' => $totalUsers,'totalpostingan'=>$totalpostingan,'totallaporan'=>$totallaporan,'data'=>$data,'data2'=>$data2,'data3'=>$data3]);
}


    public function deleteda($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user')->with('success','data Berhasil Di Hapus');

    }
}
