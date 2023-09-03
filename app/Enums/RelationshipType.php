<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum RelationshipType: string
{
    use Localizable, Enumerable;

    case NONE = 'none';
    case SINGLE = 'single';
    case IN_A_RELATIONSHIP = 'in_a_relationship';
    case ENGAGED = 'engaged';
    case MARRIED = 'married';
    case IN_A_CIVIL_UNION = 'in_a_civil_union';
    case IN_LOVE = 'in_love';
    case ITS_COMPLICATED = 'its_complicated';
    case ACTIVELY_SEARCHING = 'actively_searching';
}
