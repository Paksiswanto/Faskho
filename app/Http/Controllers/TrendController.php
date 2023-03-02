<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use App\Models\Trend; 
use Illuminate\Http\Request;

class TrendController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = Trend::with('postingan')->where('posts_id', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        $datapostingan = postingan::all();
        return view('admin.trend.index', compact('data', 'datapostingan'));
    }
}
