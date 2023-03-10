<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = laporan::where('laporan', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
        return view('admin.laporan.index',compact('data'));
    }
    public function deletedp($id){
        $data = laporan::find($id);
        $data->delete();
        return redirect()->back()->with('success','data Berhasil Di Hapus');

    }
    public function insertlaporan(Request $request)
    {
        $data=laporan::create($request->all());
        return redirect('/kontak');
    }
}


