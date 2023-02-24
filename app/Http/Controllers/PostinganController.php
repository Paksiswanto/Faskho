<?php

namespace App\Http\Controllers;

use App\Models\postingan;
use App\Models\User;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = postingan::where('judul', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
                $data2=User::all();
        return view('admin.postingan.index',compact('data'));
    }
}
