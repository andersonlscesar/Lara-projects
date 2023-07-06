<?php

use Illuminate\Support\Str;

function sortable($label, $column = null)
{
    $column = $column ?? Str::snake($label);
    $sort = request()->query('sort');
    $class = '';
    if(ltrim($sort, "-") == $column) {
        $class = strpos($sort, "-") === 0 ? 'desc' : 'asc';
    }
    $sort = strpos($sort, '-') === 0 ? $column : "-{$column}"; 
    $url = request()->fullUrlWithQuery(['sort' => $sort]);
    return "<a href='$url' class='sortable $class'>$label</a>";
}   