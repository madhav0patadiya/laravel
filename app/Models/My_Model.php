<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class My_Model extends Authenticatable
{
    use HasFactory;

    public static function update_data($param, $data = array()) {
        $result   = self::select(["*"]);
        if (isset($param['where'])) {
            foreach($param['where'] as $where_key => $where_value) {
                $result->where($where_key, $where_value);
            }
            return $result->update($data);
        }
    }

    public static function create_data($data = array()) {
        return self::create($data);
    }

    public static function insert_batch($data = array()) {
        return self::insert($data);
    }

    public static function delete_data($param) {
        $result   = self::select(["*"]);
        if (isset($param['where'])) {
            foreach($param['where'] as $where_key => $where_value) {
                $result->where($where_key, $where_value);
            }
            return $result->delete();
        }

        if (isset($param['or_where']) && ! empty($param['or_where'])) {
                $q   = $param['or_where'];
                $result->where(function($query) use ($q){
                    foreach($q as $w_key => $w_value) {
                        $query->orWhere($w_key, 'LIKE', '%'.$w_value.'%');
                    }
                });
                return $result->delete();
        }
    }

    public static function get_data($param = array(), $only_count = false) {
        if(isset($param['alias']) && isset($param['select'])  ) {
            $result   = self::from($param['alias'])->select($param['select']);
        } else if (isset($param['select'])){
            $result   = self::select($param['select']);
        } else {
            $result   = self::select("*");
        }

        if (isset($param['selectRaw'])){
            $result->selectRaw($param['selectRaw']);
        }

        if (isset($param['join'])) {
            foreach ($param['join'] as $key => $join){
                if($join['type'] == 'left') {
                    $result->leftJoin($join['table'], $join['field1'], $join['operation'], $join['field2']);
                } else {
                    $result->join($join['table'], $join['field1'], $join['operation'], $join['field2']);
                }
            }
        }

        if (isset($param['orderby'])) {
            $result->orderBy($param['orderby']['field'], $param['orderby']['order']);
        }

        if(isset($param['groupby'])) {
            $result->groupBy($param['groupby']);
        }

        if (isset($param['where'])) {
            foreach($param['where'] as $where_key => $where_value) {
                $result->where($where_key, $where_value);
            }
        }
        if (isset($param['customWhere'])) {
            foreach($param['customWhere'] as  $where_value) {
                $result->Where($where_value['field'], $where_value['operation'], $where_value['value']);
            }
        }
        if (isset($param['dateCustomWhere'])) {
            foreach($param['dateCustomWhere'] as  $where_value) {
                $result->whereDate($where_value['field'], $where_value['operation'], $where_value['value']);
            }
        }
        if (isset($param['or_where']) && ! empty($param['or_where'])) {
            $q   = $param['or_where'];
            $result->where(function($query) use ($q){
                foreach($q as $w_key => $w_value) {
                    $query->orWhere($w_key, 'LIKE', '%'.$w_value.'%');
                }
            });
        }

        if (isset($param['whereIn'])) {
            foreach($param['whereIn'] as $whereIn_key => $whereIn_value) {
                $result->whereIn($whereIn_key, $whereIn_value);
            }
        }

        if (isset($param['where_not_in'])) {
            foreach($param['where_not_in'] as $whereNotIn_key => $whereNotIn_value) {
                $result->whereNotIn($whereNotIn_key, $whereNotIn_value);
            }
        }

        if (isset($param['query_or_where'])) {
            foreach($param['query_or_where'] as $where_key => $where_value) {
                $result->orWhere($where_value['field'], $where_value['operation'], $where_value['value']);
            }
        }

        if(isset($param['with'])) {
            $result->with($param['with']);
        }

        if (isset($param['sum'])) {
            return $result->sum($param['sum']);
        }

        if ($only_count) {
            return $result->get()->count();
        }

        if (isset($param['limit'])) {
            $result->skip($param['limit']['skip'])->take($param['limit']['take']);
        }
        if(isset($param['paginate'])) {
            return $result->paginate($param['paginate']);
        }
        if(isset($param['get_ids'])) {
            return $result->pluck($param['get_ids']);
        }
        if(isset($param['get_ids_with_array'])) {
            return $result->pluck($param['get_ids_with_array'])->toArray();
        }

        if(isset($param['row'])) {
            if($param['row'] == 1) {
                return $result->first();
            } else if($param['row'] == 2) {
                return $result->get()->toArray();
            }
        } else {
            return $result->get();
        }

    }
}
