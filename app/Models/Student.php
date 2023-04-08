<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = 'student';

    protected $fillable = [
        'title', 'description', 'date_time'
    ];

    protected $dates = ['deleted_at'];
}
