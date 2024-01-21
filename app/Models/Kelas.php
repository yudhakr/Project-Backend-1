<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

use App\Models\Siswa;

class Kelas extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
	protected $collection = 'kelas';
    protected $guarded = ['_id'];
    protected $fillable = ['kelas'];
    public $timestamps = false;

    public function siswa()
    {
        // return $this->hasMany(Siswa::class, 'kelas_id','_id');
        return $this->hasMany(Siswa::class);
    }
}
