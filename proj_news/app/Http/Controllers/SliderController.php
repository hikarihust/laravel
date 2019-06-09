<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider as MainModel;
// use Illuminate\Support\Facades\View;

class SliderController extends Controller
{
    private $pathViewController = 'admin.slider.';
    private $controllerName = 'slider';
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        view()->share('controllerName', $this->controllerName);
    }

    public function index()
    {   
        $items = $this->model->listItems(null, ['task' => 'admin-list-items']);
        return view($this->pathViewController . 'index', ['items' => $items]);
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
        return redirect()->route('slider');
    }

    public function delete()
    {
        return "SlideController - delete";
    }
}