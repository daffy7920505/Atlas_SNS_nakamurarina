<?php

namespace App;
use App\Post;
use App\follow;

use Illuminate\Database\Eloquent\Model;
    // フォローする
    public function follow(Int $user)
    {
        return $this->follows()->attach($user);
    }

    // フォロー解除する
    public function unfollow(Int $user)
    {
        return $this->follows()->detach($user);
    }

    // フォローしているか
    public function isFollowing(Int $user)
    {
        return (boolean) $this->follows()->where('following_id', $user)->first(['id']);
    }

    // フォローされているか
    public function isFollowed(Int $user)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['id']);
    }
