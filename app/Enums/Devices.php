<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum Devices: string 
{
    use Localizable, Enumerable;
    
    case COMPUTER = 'computer';
    case MOBILE = 'mobile';
}