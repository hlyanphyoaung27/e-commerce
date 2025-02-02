<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Money\Currency;
use Money\Money;

class Product extends Model
{
    use HasFactory;

    protected function price(): Attribute
    {
        return Attribute::make(
            get: function(int $value){
                return new Money($value, new Currency('USD'));
            }
        );
    }

    public function Variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function Image(): HasOne
    {
        return $this->hasOne(Image::class)->ofMany('featured', 'min');
    }

    public function Images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
