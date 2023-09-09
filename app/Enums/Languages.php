<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum Languages: string
{
    use Localizable, Enumerable;

    case ENGLISH = 'english';
    case RUSSIAN = 'russian';
}
