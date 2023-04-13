<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
   public function like($id)
{
    $like = Like::where('komen_id', $id)->where('user_id',auth()->user()->id)->first();

    if ($like) {
        $like->delete();
        $liked = false;
    } else {
        Like::create([
            'user_id' => Auth::user()->id,
            'komen_id' => $id
        ]);
        $liked = true;
    }

    // Mengembalikan jumlah like untuk ditampilkan di tampilan
    $like_count = Like::where('komen_id', $id)->count();

    if (request()->ajax()) {
        return response()->json([
            'liked' => $liked,
            'like_count' => $like_count,
        ]);
    } else {
        return redirect()->route('tampil', $id);
    }
}


    
}
