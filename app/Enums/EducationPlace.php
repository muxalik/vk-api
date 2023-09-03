<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum EducationPlace: string
{
    use Localizable, Enumerable;

    case SCHOOL = 'school';
    case COLLEGE_OR_UNIVERSIRY = 'college_or_university';
}
