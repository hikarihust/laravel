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

    public function __construct()
    {
    //   View::share('controllerName', $this->controllerName);
      view()->share('controllerName', $this->controllerName);
    }

    public function index()
    {   
        $mainModel = new MainModel();
        $items = $mainModel->listItems(null, ['task' => 'admin-list-items']);

        foreach ($items as $item) {
            echo $item->link;
            echo "<br />";
        }

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
        return redirect()->route('slider');
    }

    public function delete()
    {
        return "SlideController - delete";
    }
}