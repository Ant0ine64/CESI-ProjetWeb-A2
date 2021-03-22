<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /*protected $attributes = [
        'id',
        'name',
        'address',
        'activity_sector',
        'interns_number'
    ];*/

    protected $table = 'company';
}
