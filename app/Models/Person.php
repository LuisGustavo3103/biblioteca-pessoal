<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'neighborhood',
        'city',
        'zip_code',
        'state'
    ];

    public function lends(): HasMany
    {
        return $this->hasMany(Lend::class, 'person_id');
    }

    public function currentLends(): HasMany
    {
        return $this->hasMany(Lend::class, 'person_id')->where('status', 'in_progress');
    }
}
