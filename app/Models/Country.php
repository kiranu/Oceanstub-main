<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function country_code(){
        $countrycode=Country::select('id','name','nicename','iso3','phonecode')->get();
        return $countrycode;
    }


}
