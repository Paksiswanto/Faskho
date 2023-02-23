<?php

namespace App\Http\Controllers;

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
    public function deleteda($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('index')->with('success','data Berhasil Di Hapus');

    }
}
