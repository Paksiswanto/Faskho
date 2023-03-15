<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\laporanar;
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
        return redirect()->back();
    }

    //laporanar
    public function laporanar(Request $request,$id)
    {
        $data=laporanar::all();
        $data=laporanar::create($request->all());
        
    }
    public function indexar(Request $request)
    {
        $keyword = $request->keyword;
        $data = laporanar::where('laporan', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
        return view('admin.laporanar.index',compact('data'));
    }
}


