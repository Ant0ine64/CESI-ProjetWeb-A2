<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPromotion extends Model
{
    use HasFactory;

    protected $table = 'promo_user';
    protected $guarded = [];
    public $timestamps = false;
}
