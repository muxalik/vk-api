<?php

namespace App\Traits;

use stdClass;

trait Localizable
{
    public function localize(): object
    {
        $obj = new stdClass;
        $obj->value = $this->value;
        $obj->locale = $this->getLocale();

        return $obj;
    }

    private function getLocale(): string
    {
        $filename = str(__CLASS__)->kebab();
        $key = $this->value;

        return __("$filename.$key");
    }
}
