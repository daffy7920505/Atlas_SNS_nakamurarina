<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Post;
use App\User;
class PostsController extends Controller
{
    //
    // public function index(){
    //     return view('posts.index');
    // }
    public function post(Request $request){
        $post = $request->input('text');
        $userID = Auth::user()->id;
        // 自分の情報を取得するときはAuthを使う
         \DB::table('posts')->insert([
            'post' => $post,
            "user_id"=>$userID
        ]);
        // 登録の処理
        return redirect("/top");
    }
    public function hello()
    {
        echo 'posts.index<br>';
        echo 'コントローラーから';
    }
    public function index()
    {
        $list = \DB::table('posts')->get();
        return view('posts.index',['list'=>$list]);
    }
    // public function update()
    // {
    //     $post = \DB::table('posts')
    //         ->where('id', 1)
    //         ->first();
    //     return view('posts', compact('post'));
    // }
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }

    // アイコン表示
//     public function image(Request $request, User $user) {

//   // バリデーション省略
//   $originalImg = $request->user_image;

//     if($originalImg->isValid()) {
//       $filePath = $originalImg->store('public');
//       $user->image = str_replace('public/', '', $filePath);
//       $user->save();
//       return redirect("/user/{$user->id}")->with('user', $user);

// }
    public function show(){
        $posts = Post::get();
        return view('yyy',compact('posts'));
    }

}
