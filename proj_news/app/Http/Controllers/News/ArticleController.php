<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

use App\Models\ArticleModel;
use App\Models\CategoryModel; 

class ArticleController extends Controller
{
    private $pathViewController = 'news.pages.article.';
    private $controllerName = 'article';
    private $params         = array();
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
        $params['articleId'] = $request->articleId;
        $articleModel  = new ArticleModel();
        $itemArticle   = $articleModel->getItem($params, ['task' => 'news-get-item']);
        if(empty($itemArticle)) return redirect()->route('home');

        $itemsLatest   = $articleModel->listItems(null, ['task' => 'news-list-items-latest']);
        
        return view($this->pathViewController . 'index', [
            'params' => $this->params,
            'itemsLatest' => $itemsLatest,
            'itemArticle' => $itemArticle
        ]);
    }
}