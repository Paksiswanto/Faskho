<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function  index(Request $request)
    {
        $keyword = $request->keyword;
        $data = kategori::where('kategori', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
        return view('admin.kategori.index',compact('data'));
    }
}
