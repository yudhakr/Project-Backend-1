<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Pelajaran extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
	protected $collection = 'pelajaran';
    protected $guarded = ['id'];
    protected $fillable = ['pelajaran'];
    public $timestamps = false;
}
