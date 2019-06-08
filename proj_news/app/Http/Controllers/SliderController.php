<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
 
    public function form($id = null)
    {   
        echo $id;
        $title = 'SliderController - form';
        return view($this->pathViewController . 'form', ['id' => $id, 'title' => $title]);
    }

    public function status(Request $request)
    {   
        echo $request->id;
        echo "<br />";
        echo $request->route('status');
        echo "<br />";
        return "SlideController - status";
    }

    public function delete()
    {
        return "SlideController - delete";
    }
}