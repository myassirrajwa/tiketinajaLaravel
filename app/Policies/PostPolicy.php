<?php

namespace App\Policies;

use App\Models\post;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update( User $user, post $post):bool
    {
        return $user->id === $post->user_id;
    }
    public function delete( User $user, post $post):bool
    {
        return $user->id === $post->user_id;
    }
}
