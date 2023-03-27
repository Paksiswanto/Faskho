<?php

namespace App\Http\Controllers;

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
        
        $data = User::where('name', 'LIKE', '%'.$keyword.'%')
                -> paginate(10);
                
        return view('admin.user.index',compact('data'));
    }
    public function showTotalUsers()
{
    $postingan=postingan::all();
    $laporan=laporan::all();
    $user=user::all();
    $totalViews = Postingan::sum('views');

    $totalpostingan=postingan::count();
    $totallaporan=laporan::count();
    $totalUsers = User::count();
    
   
$postings = Postingan::all();
$postings = Postingan::orderByDesc('views')->take(10)->get();

        $data = [];
        $posts = postingan::selectRaw('kategori_id, COUNT(*) as count')
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
        
        $pot=postingan::all();
        $pot=DB::table('postingans')
        ->orderBy('views','desc')
        ->get()
        ->take(10);
    return view('admin', ['totalUsers' => $totalUsers,'totalpostingan'=>$totalpostingan,'totallaporan'=>$totallaporan,'data'=>$data,'pot'=>$pot]);
}





    public function deleteda($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user')->with('success','data Berhasil Di Hapus');
    
    }
    public function updateprofile(Request $request, $id)
    {
        //dd($request->all());
        $data = User::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            // $file = $request->file('foto');
            // $extention = $file->getClientOriginalExtension( );
            // $filename = time() . '.' . $extention;
            // $file->move('fotouser/', $filename);
            // $data->foto = $filename;
            $data->foto = $request->file('foto')->store('fotouser', 'public');
        }
        $data->save();
        // Storage::disk('public')->put('foto',  $request ->file('foto'));
        return redirect()->back()->with('sukses', 'Data Berhasil Di Perbarui');
    }


    public function unbannedUser($id)
    {
        $user = User::findOrFail($id);
        $user->unbanned();
        Toastr::success('Pengguna berhasil di unbanned.', 'Success');
    
        return redirect()->back();
    }
    public function bannedUser($id)
{
    $user = User::findOrFail($id);
    $user->banned();
    Toastr::success('Pengguna berhasil dibanned.', 'Success');

    return redirect()->back();
}
public function ban(Request $request)
{
    $keyword = $request->keyword;
    $data = User::where('name', 'LIKE', '%'.$keyword.'%')
    -> paginate(10);
    $bannedUsers = User::where('is_banned', true)->get();
    return view('admin.user.ban', compact('bannedUsers','data'));
}
}

