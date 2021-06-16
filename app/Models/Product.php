<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price',
        'type',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'type');
    }
    public function properties()
    {
//        dd($this->productType->id);
//        dd($this->hasMany(ProductProperties::class)->where('property_id', $this->productType->id)->get());
//        dd($this->productType->properties);
//        $queries = $this->hasMany(ProductProperties::class);

        return $this->hasMany(ProductProperties::class);

    }
}
