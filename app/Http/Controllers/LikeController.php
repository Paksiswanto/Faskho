<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($komen_id)
    {
        $like = Like::where('komen_id', $komen_id)->where('user_id', auth()->user()->id)->first();

        if ($like){
            return "like ada";
        } else {
            Like::create([
                'user_id' => Auth::user()->id,
                'komen_id' => $komen_id
            ]);
            return back();
        }
    }
}
