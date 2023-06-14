<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [

        'title', 'price', 'description', 'qty', 'slug'

    ];

    /**
     * Get all of the comments for the Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(ProductsGallery::class, 'product_id', 'id');
    }

   /**
    * Get the user associated with the Products
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function carts(): HasOne
   {
       return $this->hasOne(User::class, 'foreign_key', 'local_key');
   }

   /**
    * Get the user that owns the Products
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function transaction_items(): BelongsTo
   {
       return $this->belongsTo(transaction_items::class, 'id', 'product_id');
   }


    // protected $guarded = [];

}
