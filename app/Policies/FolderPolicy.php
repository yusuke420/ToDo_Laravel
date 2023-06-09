<?php

namespace App\Policies;

use App\Folder;
use App\User;

class FolderPolicy
{
    /**
     * フォルダの閲覧権限
     * @param User $user
     * @param Folder $folder
     * @return bool
     */
    public function view(\App\Models\User $user, \App\Models\Folder $folder)
    {
        return $user->id === $folder->user_id;
    }
}