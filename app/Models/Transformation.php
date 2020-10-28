<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    use HasFactory;

    public function money($money)
    {
        return number_format(str_replace(",",".",str_replace(".","",$money)), 2, '.', '');
    }

    public function negative($money)
    {
        $a = -abs(5.6);
        return -abs($money);
    }
}
