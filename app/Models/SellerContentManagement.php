<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerContentManagement extends Model
{
    use HasFactory;
     protected $table = 'seller_content_management';
    protected $fillable =['return_policy'];
}
