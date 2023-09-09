<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum Device: string 
{
    use Localizable, Enumerable;
    
    case Computer = 'computer';
    case Mobile = 'mobile';
}