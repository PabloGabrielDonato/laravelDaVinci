<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lawyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'topic',
        'address',
        'phone',
        'email'
    ];

    public function fullName() {
        return $this->firstName . ' ' . $this->lastName;
    }
    
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

}
