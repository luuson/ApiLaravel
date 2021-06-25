<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected  $fillable =
    [
        'name','detail','price','stock','discount'
    ];

    public function reviews()

    {
        return $this->hasMany(Review::class,'product_id');
    }
}
