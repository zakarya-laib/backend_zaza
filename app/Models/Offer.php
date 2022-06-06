<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agency;
use App\Models\Comment;
class Offer extends Model
{
   
    public $table="offers";
    use HasFactory;
    protected $fillable = [
        'offer_agency_name',
        'offer_type',
        'offer_price',
        'property_type',
        'x',
        'y',
        'address',
        'offer_description',
        'number_of_rooms',
        'surface',
        'image1',
        'image2',
        'image3',
        'image4',
    ];
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
