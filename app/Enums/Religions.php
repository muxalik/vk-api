<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum Religions: string
{
    use Localizable, Enumerable;

    case NONE = 'none';
    case JUDADAISM = 'judaism';
    case ORTHODOXY = 'orthodoxy';
    case CATHOLICISM = 'catholisism';
    case PROTESTANTISM = 'protestantism';
    case ISLAM = 'islam';
    case BUDDISM = 'buddism';
    case CONFUCIANISM = 'confucianism';
    case SECULAR_HUMANISM = 'secular_humanism';
    case PASTAFARIANISM = 'pastafarianism';
}
