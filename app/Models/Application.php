<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public static function getlogo(){
        $logo=Application::select('logo')->first();
        return url('uploads/Admin/Application/'.$logo->logo);
    }
}
