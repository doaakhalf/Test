<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = ['first_name', 'last_name', 'email','phone','shop_id'];
    public function shop()
    {
        return $this->hasOne(Shop::class,'id','shop_id');
    }
}
