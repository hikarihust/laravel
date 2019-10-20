<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel as MainModel;
use App\Http\Requests\SliderRequest as MainRequest;

class TrainingController extends Controller
{
    private $pathViewController = 'admin.pages.slider.';
    private $controllerName = 'slider';
    private $params         = array();
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 1;
        view()->share('controllerName', $this->controllerName);
    }

    public function download(Request $request)
    {   
        $items = array();
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field'] = $request->input('search_field', '');
        $this->params['search']['value'] = $request->input('search_value', '');

        $items = $this->model->listItems($this->params, ['task' => 'admin-list-items']);
        if (! empty($items)) {
            $items = $items->first()->toArray();
            $fileName = "Export_excel.xls";
            header("Content-Type: application/xls; charset=UTF-8");
            header("Content-Disposition: attachment; filename=\"$fileName\"");
            echo implode("\t", array_keys($items)) . "\n";
            echo implode("\t", array_values($items)) . "\n";
            exit();
        }
    }
}