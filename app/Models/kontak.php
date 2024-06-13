<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $fillable = ['nohp','nama','alamat'];
    protected $table = 'kontak';
    public $timestamps = false;
}
