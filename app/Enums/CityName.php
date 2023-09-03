<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum CityName: string
{
    use Localizable, Enumerable;

    case VLADIMIR = 'vladimir';
    case MOSCOW = 'moscow';
    case SAINT_PETERSBURG = 'saint_petersburg';
}
