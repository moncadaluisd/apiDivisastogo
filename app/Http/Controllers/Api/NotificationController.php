<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return $user->notifications;
    }
}
