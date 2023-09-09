<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum Currencies: string
{
    use Localizable, Enumerable;

    case VOTE = 'vote';
    case RUB = 'RUB';
}
