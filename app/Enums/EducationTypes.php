<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum EducationTypes: string
{
    use Localizable, Enumerable;

    case SECONDARY_AND_CONTINUING = 'secondary_and_continuing';
    case HIGHER = 'higher';
}
