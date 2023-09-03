<?php

namespace App\Enums;

use App\Traits\Enumerable;
use App\Traits\Localizable;

enum InterestType: string
{
    use Localizable, Enumerable;

    case ACTIVITIES = 'activities';
    case INTERESTS = 'interests';
    case FAVORITE_MUSIC = 'favorite_music';
    case FAVORITE_MOVIES = 'favorite_movies';
    case FAVORITE_TV_SHOWS = 'favorite_tv_shows';
    case FAVORITE_BOOKS = 'favorite_books';
    case FAVORITE_GAMES = 'favorite_games';
    case FAVORITE_QUOTES = 'favorite_quotes';
    case ABOUT_ME = 'about_me';
}
