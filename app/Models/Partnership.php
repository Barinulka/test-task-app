<?php

namespace App\Models;

use Database\Factories\PartnershipFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partnership extends Model
{
    /** @use HasFactory<PartnershipFactory> */
    use HasFactory;

    protected $table = 'partnership';

    protected $fillable = [
        'name',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
