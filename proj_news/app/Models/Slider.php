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
            $result = $this->all();
        }

        return $result;
    }
}
