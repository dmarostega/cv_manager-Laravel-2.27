<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function currentUser(): User
    {
        return User::with('Profile')->findOrFail(Auth::id());
    }

    protected function currentProfile(): Profile
    {
        return $this->currentUser()->Profile()->firstOrFail();
    }

    protected function authorizeProfileRecord($record): void
    {
        abort_unless((int) $record->profile_id === (int) $this->currentProfile()->id, 403);
    }
}
