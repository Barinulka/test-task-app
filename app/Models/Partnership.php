<?php

namespace App\Models;

use Database\Factories\PartnershipFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    /** @use HasFactory<PartnershipFactory> */
    use HasFactory;

    protected $table = 'partnership';

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
