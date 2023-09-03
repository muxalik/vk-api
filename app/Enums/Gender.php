<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum Gender: string
{
    use Localizable, Enumerable;

    case MALE = 'male';
    case FEMALE = 'female';
}
