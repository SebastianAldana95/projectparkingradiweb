<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate',
        'brand',
        'type_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function setPlateAttribute($value)
    {
        $this->attributes['plate'] = Str::upper($value);
    }

    public function setBrandAttribute($value)
    {
        $this->attributes['brand'] = Str::ucfirst(Str::lower($value));
    }
}
