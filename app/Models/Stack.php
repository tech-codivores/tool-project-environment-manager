<?php

namespace App\Models;

class Stack extends Base
{
    protected static $file = 'stacks.json';
    protected static $resourceList = null;

    public static function typeOptionList(bool $with_empty_value = false): array
    {
        $list = [];

        if ($with_empty_value === true) {
            $list[''] = ' - ';
        }

        return $list
            + [
                'dedicated' => __('Dedicated stack'),
                'standard' => __('Standard stack'),
            ];
    }

    public static function optionlist(bool $with_empty_value = false): array
    {
        $list = [];

        if ($with_empty_value === true) {
            $list[''] = ' - ';
        }

        $resourceList = self::all();

        foreach ($resourceList as $resource) {
            $list[$resource['slug']] = $resource['name'];
        }

        return $list;
    }
}
