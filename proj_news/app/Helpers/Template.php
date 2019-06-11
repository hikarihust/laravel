<?php 
namespace App\Helpers;
use Config;
class Template {
    public static function showItemHistory ($by, $time) {
        $xhtml = sprintf('<p><i class="fa fa-user"></i> %s</p>
                    <p><i class="fa fa-clock-o"></i> %s</p>', $by, date(Config::get('zvn.format.short_time'), strtotime($time)));
        return $xhtml;
    }

    public static function showItemStatus ($controllerName, $id, $status) {
        $tmpStatus = [
            'active' => ['name' => 'Kích hoạt', 'class' => 'btn-success'],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-info']
        ];
        $currentStatus = $tmpStatus[$status];
        $link          = route($controllerName.'/status', ['status' => $status, 'id' => $id]);
        $xhtml = sprintf('<a href="%s" type="button" class="btn btn-round %s">%s</a>', $link, $currentStatus['class'], $currentStatus['name']);

        return $xhtml;
    }

    public static function showItemThumb ($controllerName, $thumbName, $thumbAlt) {
        $xhtml = sprintf('<img src="%s" alt="%s" class="zvn-thumb">', asset("images/$controllerName/$thumbName"), $thumbAlt);
        return $xhtml;
    }
}