<?php

namespace App\Models;

use App\Enums\DropType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drop extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'title',
        'slug',
        'type',
        'source_url',
        'timestamp',
        'is_highlighted',
        'channel_id'

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

        'type' => DropType::class

    ];

    /* Functions */
    public static function dropOfTheWeek(): Drop | null {

        return static::where('is_highlighted', true)->first();

    }

    /* Attributes */
    public function getDropperAttribute() {

        return $this->people()->where('is_dropper', true)->first();

    }

    /* Relationships */
    public function channel(): BelongsTo {

        return $this->belongsTo(Channel::class);

    }

    public function people() {

        return $this->belongsToMany(Person::class, 'drop_person')
                ->withPivot('is_dropper')
                ->withTimestamps();
    }
}
