<?php 
namespace App\Helpers;
use Illuminate\Support\Str;

class URL {
    public static function linkCategory($id, $name) {
        return $link = route('category/index', ['categoryName' => Str::slug($name), 'categoryId' => $id]);
    }

    public static function linkArticle($id, $name) {
        return $link = route('article/index', ['articleName' => Str::slug($name), 'articleId' => $id]);
    }
}