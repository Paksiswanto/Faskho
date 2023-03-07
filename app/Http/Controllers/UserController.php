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
    $postingan=postingan::all();
    $laporan=laporan::all();
    $user=user::all();

    $totalpostingan=postingan::count();
    $totallaporan=laporan::count();
    $totalUsers = User::count();
    
   
$postings = Postingan::all();
$postings = Postingan::orderByDesc('views')->take(10)->get();

        $data = [];
        
        foreach ($postings as $posting) {
            $data[] = [
                'judul' => $posting->judul,
                'views' => $posting->views
            ];
        }
        

    return view('admin', ['totalUsers' => $totalUsers,'totalpostingan'=>$totalpostingan,'totallaporan'=>$totallaporan,'data'=>$data]);
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
