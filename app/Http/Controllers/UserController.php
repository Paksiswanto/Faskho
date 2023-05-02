<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\User;
use App\Models\laporan;
use App\Models\postingan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $data = User::where('is_banned', false)
            ->where('role', 'user')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);

        return view('admin.user.index', compact('data'));
    }
    public function showTotalUsers()
    {
        $postingan = postingan::all();
        $laporan = laporan::all();
        $user = user::all();
        $totalViews = Postingan::sum('views');

        $totalpostingan = postingan::where('status','diterima')->count();
        $totallaporan = laporan::count();
        $totalUsers = User::where('role','user')->count();

        $counts = Postingan::where('status','diterima')
            ->join('users', 'postingans.user_id', '=', 'users.id')
            ->groupBy('users.email') // memasukkan kolom users.name ke dalam GROUP BY
            ->selectRaw('users.email, count(*) as total')
            ->get();
        $postings = Postingan::all();
        $postings = Postingan::orderByDesc('views')->take(10)->get();

        $data = [];
        $posts = postingan::where('status','diterima')
            ->selectRaw('kategori_id, COUNT(*) as count')
            ->groupBy('kategori_id')
            ->get();

        $data = [];
        $total = $posts->sum('count');


        foreach ($posts as $post) {
            $data['categories'][] = $post->kategori->kategori;
            $data['counts'][] = round(($post->count / $total) * 100, 2);
        }


        foreach ($postings as $posting) {
            $data[] = [
                'judul' => $posting->judul,
                'views' => $posting->views
            ];
        }

        $pot = postingan::all();
        $pot = DB::table('postingans')
            ->where('status','diterima')
            ->join('users', 'postingans.user_id', '=', 'users.id')
            ->select('postingans.id', 'postingans.thumbnail', 'postingans.kategori_id', 'users.name', 'postingans.created_at', 'postingans.judul', 'postingans.deskripsi', 'postingans.views')
            ->orderBy('postingans.views', 'desc')
            ->get()
            ->take(10);


        return view('admin', ['totalUsers' => $totalUsers, 'totalpostingan' => $totalpostingan, 'totallaporan' => $totallaporan, 'data' => $data, 'pot' => $pot, 'counts' => $counts]);
    }





    public function deleteda($id)
    {
        $data = User::find($id);
        $post = postingan::all();
        $post = postingan::where('user_id', $id)->get();
        foreach ($post as $post) {
            if (file_exists(public_path('thumbnail/' . $post->thumbnail))) {
                unlink(public_path('thumbnail/' . $post->thumbnail));
            }
            $post->delete();
        }
        $data->delete();
        // return redirect()->route('user')->with('success','data Berhasil Di Hapus');
        return redirect()->back()->with('success','user berhasil dihapus');
    }
    public function updateprofile(Request $request, $id)
    {
        //dd($request->all());
        $data = User::find($id);
        $data->update($request->all());
        if ($request->hasFile('thumbnail')) {
            // $file = $request->file('thumbnail');
            // $extention = $file->getClientOriginalExtension( );
            // $filename = time() . '.' . $extention;
            // $file->move('thumbnailuser/', $filename);
            // $data->thumbnail = $filename;
            $data->thumbnail = $request->file('thumbnail')->store('thumbnailuser', 'public');
        }
        $data->save();
        // Storage::disk('public')->put('thumbnail',  $request ->file('thumbnail'));
        return redirect()->back()->with('sukses', 'Data Berhasil Di Perbarui');
    }


    public function unbannedUser($id)
    {
        $user = User::findOrFail($id);
        $user->unbanned();
        Toastr::success('larangan telah dibuka.', 'Success');

        return redirect()->back();
    }
    public function bannedUser($id)
    {
        $user = User::findOrFail($id);
        $user->banned();
        $post = postingan::all();
        $post = postingan::where('user_id', $id)->update(['status' => 'pending']);

        Toastr::success('Pengguna berhasil diblokir.', 'Success');

        return redirect()->back();
    }
    public function ban(Request $request)
    {
        $keyword = $request->keyword;

        $data = User::where('is_banned', true)
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate(10);
        return view('admin.user.ban', compact('data'));
    }
    public function pribadi(Request $request)
    {
        $keyword = $request->keyword;

        $data = Info::query()
        ->where('kota', 'LIKE', '%' . $keyword . '%')
        ->paginate(10);
       return view('admin.pribadi.index',compact('data'));
    }
    public function updata(Request $request)
    {
        Info::query()->update(['kota' => $request->kota, 
                              'no' => $request->no,
                            'alamat'=>$request->alamat,
                        'email'=>$request->email]);
        return redirect()->back()->with('success','Data berhasil di edit');
}
}