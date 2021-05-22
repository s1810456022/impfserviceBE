<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaclocation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = ['name', 'street', 'houseNumber', 'postalCode', 'city', 'state'];

    public function vacevents() : HasMany {
        return $this->hasMany(Vacevent::class);
    }
}
