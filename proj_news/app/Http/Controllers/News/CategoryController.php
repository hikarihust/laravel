<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

use App\Models\ArticleModel;
use App\Models\CategoryModel; 

class CategoryController extends Controller
{
    private $pathViewController = 'news.pages.category.';
    private $controllerName = 'category';
    private $params         = array();
    private $model;
    protected $getIndexCategory = [
        'idCategory',
        'nameCategory',
        'display'
    ];

    protected $getIndexArticle = [
        'id',
        'name',
        'content',
        'thumb',
        'created'
    ];

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
        $params['categoryId'] = $request->categoryId;
        $articleModel  = new ArticleModel();
        $itemCategory = $this->_getItemCategory($params);
        if(empty($itemCategory)) return redirect()->route('home');
        $itemsLatest   = $articleModel->listItems(null, ['task' => 'news-list-items-latest']);

        return view($this->pathViewController . 'index', [
            'params' => $this->params,
            'itemsLatest' => $itemsLatest,
            'itemCategory' => $itemCategory
        ]);
    }

    private function _getItemCategory($params) {
        $result = null;
        $categoryModel = new CategoryModel();
        $itemCategory = $categoryModel->getItem($params, ['task' => 'news-get-item']);

        $itemCategory = new Collection($itemCategory);
        $itemCategory = $itemCategory->groupBy('idCategory')->toArray();
        $tmpCategory   = array();
        $tmpArticle    = array();
        $tmpItem       = array();

        foreach ($itemCategory as $key1 => $val1) {
            foreach ($val1 as $key2 => $val2) {
                if (empty($tmpCategory)) {
                    $tmpCategory = array_intersect_key($val2, array_flip($this->getIndexCategory));
                }
                $tmpArticle[] = array_intersect_key($val2, array_flip($this->getIndexArticle));
            }
            $tmpItem             = $tmpCategory;
            $tmpItem['articles'] = $tmpArticle;
            $result[]            = $tmpItem;
            $tmpCategory         = array();
            $tmpArticle          = array();
        }

        return $result;
    }
}