<?php

namespace App\Http\Helpers\Elequent;

class MethodsHelpers
{
    static public function entities($query, $entities)
    {
        if ($entities != null || $entities != '') {
            $entities = str_replace(' ', '', $entities);
            $entities = explode(',', $entities);

            try {
                return $query = $query->with($entities);
            } catch (\Throwable $th) {
                return Json::exception(null, validator()->errors());
            }
        }
    }

    static public function group($query, $record, $group)
    {
        if ($group && $record) {
            return $query->where($record, $group);
        }

        return $query;
    }
}
