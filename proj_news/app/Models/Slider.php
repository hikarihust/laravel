<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $primaryKey = 'id';
    public $timestamps = false;
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function listItems($params, $options){
        $result = null;
        if ($options['task'] === 'admin-list-items') {
            $result = self::select('id', 'name', 'description', 'status', 'link', 'thumb', 'created', 'created_by', 'modified', 'modified_by')
                        // ->where('id', '>', 3)
                        ->orderBy('id', 'desc')
                        ->paginate($params['pagination']['totalItemsPerPage']);
                        // ->get();
        }

        return $result;
    }
}
