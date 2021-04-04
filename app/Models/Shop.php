<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'shops';
    protected $fillable = ['name', 'website', 'email','logo'];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'shop_id')->withDefault();
    }
}
