<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacevent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = ['date', 'startTime', 'endTime', 'maxVac', 'vaclocation_id'];


    public function vaclocation() : BelongsTo {
        return $this->belongsTo(Vaclocation::class);
    }

    public function users() : HasMany {
        return $this->hasMany(User::class);
    }
}
