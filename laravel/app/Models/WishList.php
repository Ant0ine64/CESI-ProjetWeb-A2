<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory; //getting a new factory instance for the model.

    protected $table = 'wishlist'; //table name
    protected $guarded = []; //guards
    public $timestamps = false; //is using timestamps ?
}
