<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum ImportantQuality: string
{
    use Localizable, Enumerable;

    case NONE = 'none';
    case INTELLECT_AND_CREATIVITY = 'intellect_and_creativity';
    case KINDNESS_AND_HONESTY = 'kindness_and_honesty';
    case HEALTH_AND_BEAUTY = 'health_and_beauty';
    case WEALTH_AND_POWER = 'wealth_and_power';
    case COURAGE_AND_PERSISTANCE = 'courage_and_persistance';
    case HUMOR_AND_LOVE_FOR_LIFE = 'humor_and_love_for_life';
}
