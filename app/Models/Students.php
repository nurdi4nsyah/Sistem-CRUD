<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'student';
    // protected $primarykey = 'id';
    // protected $fillable = [
    //     'id', 'nama', 'npm', 'email', 'jurusan'
    // ];
    protected $guarded = ['id'];
}
