<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider as MainModel;
// use Illuminate\Support\Facades\View;

class SliderController extends Controller
{
    private $pathViewController = 'admin.pages.slider.';
    private $controllerName = 'slider';
    private $params         = array();
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 2;
        view()->share('controllerName', $this->controllerName);
    }

    public function index()
    {   
        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        $countByStatus = $this->model->countItems($this->params, ['task' => 'admin-count-items']);

        return view($this->pathViewController . 'index', [
            'items' => $items,
            'countByStatus' => $countByStatus
            ]);
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