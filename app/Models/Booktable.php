<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booktable extends Model
{
    use HasFactory;

    protected $table = 'booktables';

    protected $fillable = [
        'name',
        'nbPeople',
        'allergies',
        'date',
        'time',
        'tableId',
        'userId'
    ];

    public $timestamps = false;
}
