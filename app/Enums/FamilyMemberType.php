<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum FamilyMemberType: string
{
    use Localizable, Enumerable;

    case GRANDPARENTS = 'grandparents';
    case PARENTS = 'parents';
    case SIBLINGS = 'siblings';
    case CHILDREN = 'children';
    case GRANDCHILDREN = 'grandchildren';
}
