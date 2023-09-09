<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum PersonalViews: string
{
    use Localizable, Enumerable;

    case NONE = 'none';
    case VERY_NEGATIVE = 'very_negative';
    case NEGATIVE = 'negative';
    case TOLERANT = 'tolerant';
    case NEUTRAL = 'neutral';
    case POSITIVE = 'positive';
}
