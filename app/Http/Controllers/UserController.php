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
    $postingan=postingan::all();
    $laporan=laporan::all();
    $totalpostingan=postingan::count();
    $totallaporan=laporan::count();
    
    $data=[];
    $data2=[];
    $data3=[];
foreach($user as $us){
    $data[]=$totalUsers;
}
foreach($postingan as $po){
    $data2[]=$totalpostingan;
}
foreach($laporan as $po){
    $data3[]=$totallaporan;
}


    return view('admin', ['totalUsers' => $totalUsers,'totalpostingan'=>$totalpostingan,'totallaporan'=>$totallaporan,'data'=>$data,'data2'=>$data2,'data3'=>$data3]);
}


    public function deleteda($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user')->with('success','data Berhasil Di Hapus');
    
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
            $data->foto = $request->file('foto')->store('fotouser', 'public');
        }
        $data->save();
        // Storage::disk('public')->put('foto',  $request ->file('foto'));
        return redirect()->back()->with('sukses', 'Data Berhasil Di Perbarui');
    }
}
