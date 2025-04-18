<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function homepage()
    {
        $listPosts = DB::select("SELECT 
            p.postid,
            p.img,
            p.caption,
            u.username,
            CONCAT(TIMESTAMPDIFF(hour, p.datecreated, SYSDATE()), ' minutes ago')
            AS time_ago
            FROM posts p
            JOIN users u ON p.userid = u.userid
            WHERE p.datadel = 'N';");
        return view('homepage', ['listPosts' => $listPosts]);
    }

    public function findFriends()
    {
        $user = User::where('username', '<>', Session::get('loggedIn'))->get();

        return view('find_friends', ['listUser' => $user]);
    }
    public function addPost()
    {
        return view('add_post');
    }

    public function post(Request $req)
    {
        // menyimpan data file yang diupload ke variabel $file
        $file = $req->file('file_upload');

        // isi dengan nama folder tempat kemana file diupload
        $file->move('assets', $file->getClientOriginalName());

        $newPost = new Post();
        $newPost->caption = $req->caption;
        $newPost->img = $file->getRealPath() . $file->getClientOriginalName();
        $newPost->save();
    }
}
