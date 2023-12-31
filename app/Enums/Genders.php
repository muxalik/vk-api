<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum Genders: string
{
    use Localizable, Enumerable;

    case NONE = 'none';
    case MALE = 'male';
    case FEMALE = 'female';
}
