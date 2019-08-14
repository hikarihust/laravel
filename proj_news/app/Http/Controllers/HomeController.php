<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\ArticleModel;
use App\Models\CategoryModel; 

class HomeController extends Controller
{
    private $pathViewController = 'news.pages.home.';
    private $controllerName = 'home';
    private $params         = array();
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
        $sliderModel = new SliderModel();
        $itemsSlider = $sliderModel->listItems(null, ['task' => 'news-list-items']);

        $categoryModel = new CategoryModel();
        $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items-is-home']);

        $articleModel  = new ArticleModel();
        $itemsFeature  = $articleModel->listItems(null, ['task' => 'news-list-items-feature']);
        $itemsLatest   = $articleModel->listItems(null, ['task' => 'news-list-items-latest']);

        return view($this->pathViewController . 'index', [
            'params' => $this->params,
            'itemsSlider' => $itemsSlider,
            'itemsCategory' => $itemsCategory,
            'itemsFeature' => $itemsFeature,
            'itemsLatest' => $itemsLatest
        ]);
    }
}