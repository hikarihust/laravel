<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;

class CategoryModel extends AdminModel
{
    public function __construct() {
        $this->table = 'category';
        $this->folderUpload = 'category';
        $this->fieldsearchAccepted = ['id', 'name'];
        $this->crudNotAccepted = ['_token'];
    }

    public function listItems($params = null, $options = null){
        $result = null;
        if ($options['task'] === 'admin-list-items') {
            $query = $this->select('id', 'name', 'status', 'is_home', 'created', 'created_by', 'modified', 'modified_by');    
            if ($params['filter']['status'] !== 'all') {
                $query->where('status', '=', $params['filter']['status']);
            }

            if ($params['search']['value'] !== '') {
                if ($params['search']['field'] === 'all') {
                    $query->where(function($query) use ($params) {
                        foreach ($this->fieldsearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldsearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }
            $result = $query->orderBy('id', 'desc')
                    ->paginate($params['pagination']['totalItemsPerPage']);
        }

        if ($options['task'] === 'news-list-items') {
            $query = $this->select('id', 'name')
                            ->where('status', '=', 'active')
                            ->limit(8);

            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function countItems($params = null, $options = null){
        $result = null;
        if ($options['task'] === 'admin-count-items-group-by-status') {
            $query = self::select(DB::raw('count(id) as count, status'));
                        
            if ($params['search']['value'] !== '') {
                if ($params['search']['field'] === 'all') {
                    $query->where(function($query) use ($params) {
                        foreach ($this->fieldsearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE', "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldsearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
                }
            }

            $query->groupBy('status');
            $result = $query->get()->toArray();
        }

        return $result;
    }

    public function getItem($params = null, $options = null) {
        $result = null;
        if ($options['task'] === 'get-item') {
            $result = self::select('id', 'name', 'status')
                        ->where('id', $params['id'])->first()->toArray();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) {
        if ($options['task'] === 'change-status') {
            $status = ($params['currentStatus'] === 'active') ? 'inactive' : 'active';
            self::where('id', $params['id'])->update(['status' => $status]);
        }

        if ($options['task'] === 'change-is-home') {
            $isHome = ($params['currentIsHome'] === 'yes') ? 'no' : 'yes';
            self::where('id', $params['id'])->update(['is_home' => $isHome]);
        }

        if ($options['task'] === 'add-item') {
            $params['created_by'] = 'quang';
            $params['created'] = date('Y-m-d');
            self::insert($this->_prepareParams($params));
        }

        if ($options['task'] === 'edit-item') {
            $params['modified_by'] = 'quang';
            $params['modified'] = date('Y-m-d');
            self::where('id', $params['id'])->update($this->_prepareParams($params));
        }
    }

    public function deleteItem($params = null, $options = null) {
        if ($options['task'] === 'delete-item') {
            self::where('id', $params['id'])->delete();
        }
    }
}
