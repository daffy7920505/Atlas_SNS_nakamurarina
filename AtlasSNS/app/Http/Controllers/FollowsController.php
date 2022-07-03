<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;
use App\User;
use App\Follow;

class FollowsController extends Controller
{
    // 一覧表示
    public function followlist()
    {
        $list = \DB::table('posts')->get();
        return view('follows.followList',['list'=>$list]);
    }
    public function followerlist()
    {
        $list = \DB::table('posts')->get();
        return view('follows.followerList',['list1'=>$list1]);
    }
    // // 新規ツイート入力画面
    // public function create()
    // {
    //     //
    // }

    // // 新規ツイート投稿処理
    // public function store(Request $request)
    // {
    //     //
    // }

    // // ツイート詳細画面
    // public function show($id)
    // {
    //     //
    // }

    // // ツイート編集画面
    // public function edit($id)
    // {
    //     //
    // }

    // // ツイート編集処理
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // // ツイート削除処理
    // public function destroy($id)
    // {
    //     //
    // }

        // フォロー
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか(isFollwingigが紐づいている)
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする（follow）
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }


}
