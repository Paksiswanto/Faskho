<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Postingan $postingan)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
        ]);

        $postingan->comments()->save($comment);

        return redirect()->back();
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }
}
