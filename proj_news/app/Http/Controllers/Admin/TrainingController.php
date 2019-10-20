<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel as MainModel;
use App\Http\Requests\SliderRequest as MainRequest;
use Excel;
use DB;

class TrainingController extends Controller
{
    private $pathViewController = 'admin.pages.training.';
    private $controllerName = 'training';
    private $params         = array();
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 1;
        view()->share('controllerName', $this->controllerName);
    }

    // ============================== Download(Excel) ====================================
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

    // ============================== Import and Export Excel and CSV in Laravel 5 Using maatwebsite ====================================
    public function form(Request $request)
    {   
        return view($this->pathViewController . 'form');
    }

    public function submit(Request $request)
    {   
        $path = $request->file->getRealPath();
            $data = Excel::load($path)->get();
            foreach($data as $value) {
                $arr[] = [
                    'title' => $value->title,
                    'body' => $value->body
                ];
            }

            if (! empty($arr)) {
                DB::table('news')->insert($arr);
                echo "data inserted!";
            }
    }   

    public function export(Request $request)
    {   
        $type = $request->type;
        $results = DB::table('news')->get();
        $data = array();
        foreach ($results as $result) {
           $data[] = (array)$result;  
        }

        return Excel::create('Filename', function($excel) use($data) {
            $excel->sheet('Sheetname', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        })->export($type);
    } 
}