<?php

namespace App\BB;

use App\BB\Entities\Property;
use Doctrine\Common\Collections\Collection;

class DataObject
{
    public function toArray(array $parents = null, array $collections = [])
    {
        if (!is_array($parents) || sizeof($parents) === 0) {
            $parents = [$this];
        } elseif (!in_array($this, $parents)) {
            $parents[] = $this;
        }

        $r = [];

        foreach (get_class_methods($this) as $method) {
            if (strpos($method, 'get') === 0) {
                $property = snake_case(substr($method, 3));
                $value = $this->$method();

                if ($value instanceof Collection) {
                    if (in_array($property, $collections))
                        $r[$property] = $this->$method()->toArray();
                } else {
                    $r[$property] = $this->$method();
                }

                if (isset($r[$property])) {
                    if (is_array($parents) && in_array($r[$property], $parents, true)) {
                        unset($r[$property]);
                    } elseif ($r[$property] instanceof DataObject) {
                        $r[$property] = $r[$property]->toArray($parents);
                    } elseif (is_array($r[$property])) {
                        foreach ($r[$property] as $key => $val) {
                            if (strpos($property, '__') === false) {
                                if (is_array($parents) && in_array($val, $parents, true)) {
                                    unset($r[$property][$key]);
                                } elseif ($val instanceof DataObject) {
                                    $r[$property][$key] = $val->toArray($parents);
                                }
                            }
                        }

                    }
                }
            }
        }

        return $r;
    }
}