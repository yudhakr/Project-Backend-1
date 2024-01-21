<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
	protected $collection = 'siswa';
    protected $guarded = ['id'];
    protected $fillable = ['nama','kelas_id'];
    public $timestamps = false;
}
