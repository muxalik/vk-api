<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum Language: string
{
    use Localizable, Enumerable;

    case ENGLISH = 'english';
    case RUSSIAN = 'russian';
}
