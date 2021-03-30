<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferPromo extends Model
{
    use HasFactory;

    protected $table = 'offer_promo';
    protected $guarded = [];
    public $timestamps = false;
}
