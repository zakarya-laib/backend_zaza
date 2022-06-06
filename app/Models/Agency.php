<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Offer;
class Agency extends Model
{

    protected $primaryKey ='agency_email';
    public $incrementing = false ;
    protected $keyType='string';
    public $timestamps=false;
    public $table="agency";
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agency_email',
        'agency_name',
        'agency_logo',
        'commercial_register',
        'agency_phone_number'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

}
