<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',
        'slug',
        'image'

    ];

    /* Relationships */
    public function drops() {

        return $this->belongsToMany(Drop::class, 'drop_person')
                ->withPivot('is_dropper')
                ->withTimestamps();

    }
}
