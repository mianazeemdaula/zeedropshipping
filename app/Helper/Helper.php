<?php

namespace App\Helper;

class Helper
{
    public static function parseDigiPhone($value){
        // remove all spaces
        $value = str_replace(' ', '', $value);
        // remove + from the start
        $value = str_replace('+', '', $value);
        // remove - from the start
        return $value;
    }

    public static function sortParam($param){
        $param = explode('-', $param);
        $sort = $param[0];
        $order = $param[1];
        return [$sort, $order];
    }

    public static function genSortUrl($column){
        $order = 'asc';
        if(request()->has('sort')){
            $param = explode('-', request()->sort);
            if($param[0] == $column){
                $order = $param[1] == 'asc' ? 'desc' : 'asc';
            }
        }
        return request()->fullUrlWithQuery(['sort' => $column.'-'.$order]);
        // return route(request()->route()->getName(), array_merge(request()->all(), ['sort' => $sort.'-'.$order]));
    }
    
}