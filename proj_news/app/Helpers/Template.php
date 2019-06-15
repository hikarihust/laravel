<?php 
namespace App\Helpers;
use Config;
class Template {
    public static function showButtonFilter ($countByStatus) {
        $xhtml = null;

        if (count($countByStatus) > 0) {
            array_unshift($countByStatus, [
                'count' => array_sum(array_column($countByStatus, 'count')),
                'status' => 'All'
            ]);

            foreach ($countByStatus as $key => $value) {
                $xhtml .= sprintf('<a href="#" type="button" class="btn btn-primary">
                                    %s <span class="badge bg-white">%s</span>
                                </a>', $value['status'], $value['count']);
            }
        }

        return $xhtml;
    }

    //<a href="?filter_status=active"
    //     type="button" class="btn btn-success">
    // Active <span class="badge bg-white">2</span>
    // </a><a href="?filter_status=inactive"
    //     type="button" class="btn btn-success">
    // Inactive <span class="badge bg-white">2</span>
    // </a>

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

    public static function showButtonAction ($controllerName, $id) {
        $tmplButton = [
            'edit'   => ['class' => 'btn-success', 'title' => 'Edit', 'icon' => 'fa-pencil', 'route-name' => $controllerName.'/form'],
            'delete' => ['class' => 'btn-danger', 'title' => 'Delete', 'icon' => 'fa-trash', 'route-name' => $controllerName.'/delete'],
            'info'   => ['class' => 'btn-info', 'title' => 'View', 'icon' => 'fa-pencil', 'route-name' => $controllerName.'/delete']
        ];
        $buttonInArea = [
            'default' => ['edit', 'delete'],
            'slider'  =>  ['edit', 'delete']
        ];

        $controllerName = (array_key_exists($controllerName, $buttonInArea)) ? $controllerName : 'default';
        $listButtons    = $buttonInArea[$controllerName]; 
        $xhtml          = '<div class="zvn-box-btn-filter">';
        foreach ($listButtons as $key => $btn) {
            $currentButton = $tmplButton[$btn];
            $link = route($currentButton['route-name'], ['id' => $id]);
            $xhtml .= sprintf('<a href="%s" type="button" class="btn btn-icon %s" data-toggle="tooltip" data-placement="top" 
                                data-original-title="%s">
                                <i class="fa %s"></i>
                        </a>', $link, $currentButton['class'], $currentButton['title'], $currentButton['icon']);
        }
        $xhtml .= '</div>';

        return $xhtml;
    }
}