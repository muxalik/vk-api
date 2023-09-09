<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum PersonalPriorities: string
{
    use Localizable, Enumerable;

    case NONE = 'not_specified';
    case FAMILY_AND_CHILDREN = 'family_and_children';
    case CAREER_AND_MONEY = 'career_and_money';
    case ENTERTAINMENT_AND_LEISURE = 'entertainment_and_leisure';
    case SCIENCE_AND_RESEARCH = 'science_and_research';
    case IMPROVING_THE_WORLD = 'improving_the_world';
    case PERSONAL_DEVELOPMENT = 'personal_development';
    case BEAUTY_AND_ART = 'beauty_and_art';
    case FAME_AND_INFLUENCE = 'fame_and_influence';
}
