<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';
    protected $guarded = [];
    public $timestamps = false;
}
