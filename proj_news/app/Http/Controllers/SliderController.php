<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    // public function show($id)
    // {
    //     return view('user.profile', ['user' => User::findOrFail($id)]);
    // }

    public function index()
    {
        return "SlideController - index";
    }

    public function form()
    {
        return "SlideController - form";
    }

    public function delete()
    {
        return "SlideController - delete";
    }
}