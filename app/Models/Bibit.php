<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    use HasFactory;
    protected $table = 'bibit';
    protected $guarded = ['id'];
    public $timestamps = false;
}
