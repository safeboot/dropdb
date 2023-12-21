<?php

namespace App\Enums;

enum DropRating: string
{
    case LINUS_SIZED = 'linus_sized';
    case MEDIUM_IMPACT = 'medium_sized';
    case HARD_IMPACT = 'hard_impact';
    case YEP_ITS_BROKEN = 'yep_its_broken';

    public static function getRating(int $rating): DropRating {

        if ($rating <= 3) {
            return DropRating::LINUS_SIZED;
        } elseif ($rating <= 6) {
            return DropRating::MEDIUM_IMPACT;
        } elseif ($rating <= 9) {
            return DropRating::HARD_IMPACT;
        } else {
            return DropRating::YEP_ITS_BROKEN;
        }

    }
}
