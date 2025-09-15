<?php

namespace App\Models;

use App\Enums\LendStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lend extends Model
{
    protected $fillable = [
        'book_id',
        'person_id',
        'loan_date',
        'expected_return_date',
        'returne_date',
        'status',
        'description'
    ];

    protected $casts = [
        'status' => LendStatusEnum::class,
        'expected_return_date' => 'datetime'
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
