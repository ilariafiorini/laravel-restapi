<?php

namespace App\Models;

use App\Models\Verification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Builder\Class_;

class Car extends Model
{
    use HasFactory;
    public function verifications(): HasMany
    {
        return $this->hasMany(Verification::class);
    }
}
