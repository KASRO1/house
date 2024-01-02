<?php

namespace App\Classes;

use App\Models\BindingUser;

class WorkerFunction
{
    public function BindingUser($user_id_worker, $user_id_mamont, $type)
    {
        $bindingUser = new BindingUser();
        $bindingUser->user_id_worker = $user_id_worker;
        $bindingUser->user_id_mamont = $user_id_mamont;
        $bindingUser->type = $type;
        $bindingUser->save();
        if ($bindingUser->wasRecentlyCreated) {
            return true;
        } else {
            return false;
        }

    }

    public function getWorker($user_id_mamont)
    {
        $bindingUser = BindingUser::where("user_id_mamont", $user_id_mamont)->first();
        return $bindingUser;
    }
}
