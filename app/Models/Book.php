<?php

namespace App\Models;

use App\Enums\BookGenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'publisher',
        'sinopse',
        'gender',
        'image',
        'status',
        'publish_year'
    ];

    protected $casts = [
        'title' => 'string',
        'gender' => BookGenderEnum::class,
    ];

    public function lends(): HasMany
    {
        return $this->hasMany(Lend::class, 'book_id');
    }

    public function currentLend(): HasOne
    {
        return $this->hasOne(Lend::class, 'book_id')->where('status', 'em_andamento');
    }

    public function currentLendTo(): HasOneThrough
    {
        return $this->hasOneThrough(
            Person::class,
            Lend::class,
            'book_id',
            'id',
            'id',
            'person_id'
        )->where('status', 'em_andamento');
    }
}
