<?php

namespace App\Http\Controllers\backend\player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ActivityController extends Controller
{
    public function activity()
    {

        return view('backend.player.activity');
    }
}
