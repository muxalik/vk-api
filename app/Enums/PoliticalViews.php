<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum PoliticalViews: string
{
    use Localizable, Enumerable;

    case NONE = 'none';
    case APATHETIC = 'apathetic';
    case COMMUNIST = 'communist';
    case SOCIALIST = 'socialist';
    case MODERATE = 'moderate';
    case LIBERAL = 'liberal';
    case CONSERVATIVE = 'conservative';
    case MONARCHIST = 'monarchist';
    case ULTRACONSERVATIVE = 'libertarian';
}
