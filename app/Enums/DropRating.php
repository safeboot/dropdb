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

    public function label(): string {

        return match ($this) {

            static::LINUS_SIZED => 'Linus-sized',
            static::MEDIUM_IMPACT => 'Medium Impact',
            static::HARD_IMPACT => 'Hard Impact',
            static::YEP_ITS_BROKEN => 'Yep, It\'s Broken',

        };

    }

    public function color(): array {

        return match ($this) {

            static::LINUS_SIZED => ['#f0a284', '#a15132'],
            static::MEDIUM_IMPACT => ['#97ff80', '#317023'],
            static::HARD_IMPACT => ['#263780', '#8fa3f7'],
            static::YEP_ITS_BROKEN => ['#f21313', '#f5a6a6'],

        };

    }
}
