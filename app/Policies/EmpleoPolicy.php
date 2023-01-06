<?php

namespace App\Policies;

use App\Models\Empleo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpleoPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Empleo $empleo){
        
        return $user->id === $empleo->user_id;
    }

    public function published(?User $user, Empleo $empleo){
        if ($empleo->status == 2) {
            return true;
        } else {
            return false;
        }
        
    }

}
