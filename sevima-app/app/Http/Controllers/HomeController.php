<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
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
            FROM posts p, users u, follows f
            where p.userid = u.userid and f.userid1 = u.userid
            and p.datadel = 'N'
            union
            SELECT 
            p.postid,
            p.img,
            p.caption,
            u.username,
            CONCAT(TIMESTAMPDIFF(hour, p.datecreated, SYSDATE()), ' minutes ago')
            AS time_ago
            FROM posts p, users u
            where p.userid = u.userid
            and p.datadel = 'N'
            ;");
        $comments = DB::select("
            select c.commentid, c.comment, u.username
            from comments c, users u
            where u.userid = c.userid
            order by c.datecreated desc; 
        ");
        return view('homepage', ['listPosts' => $listPosts, 'comments' => $comments]);
    }

    public function findFriends()
    {
        $user = User::where('username', '<>', Session::get('loggedIn'))->get();
        $userid = User::where('username', Session::get('loggedIn'))->get();

        $friends = Follow::where('userid1', $userid[0]->userid)->get();
        return view('find_friends', ['listUser' => $user, 'friends' => $friends]);
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
        return redirect('/home');

    }

    public function comment(Request $req){
        $comment = new Comment();
        $comment->postid = $req->postid;
        $comment->comment = $req->comment;
        $userid = User::where('username', Session::get('loggedIn'))->get();
        $comment->userid = $userid[0]->userid;
        $comment->save();
        return redirect('/home');
    }

    public function follow(Request $req){
        $follow = new Follow();
        $userid = User::where('username', Session::get('loggedIn'))->get();
        $follow->userid1 = $userid[0]->userid;
        $follow->userid2 = $req->friendid;
        $follow->save();
        return redirect('/find_friends');
    }
    public function unfollow(Request $req){
        $userid = User::where('username', Session::get('loggedIn'))->get();
        Follow::where('userid1', $userid[0]->userid)
          ->where('userid2', $req->friendid)
          ->delete();
        return redirect('/find_friends');
    }
    
}
