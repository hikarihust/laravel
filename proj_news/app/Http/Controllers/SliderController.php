<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    private $pathViewController = 'admin.slider.';
    // public function show($id)
    // {
    //     return view('user.profile', ['user' => User::findOrFail($id)]);
    // }

    public function index()
    {
        return view($this->pathViewController . 'index');
    }
 
    public function form()
    {
        return view($this->pathViewController . 'form');
    }

    public function delete()
    {
        return "SlideController - delete";
    }
}