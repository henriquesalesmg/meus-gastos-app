<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug', 'reference', 'price'];

    public function getAmountAttribute(){
        return $this->attributes['price']/100;
    }

    public function setAmountAttribute($prop){
        return $this->attributes['price'] = $prop * 100;

    }



    public function features(){
        return $this->belongsTo(Feature::class);
    }
}
