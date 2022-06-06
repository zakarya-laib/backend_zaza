<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Client extends Model
{
    protected $primaryKey ='user_name';
    public $incrementing = false ;
    protected $keyType='string';
    public $timestamps=false;
    public $table="clients";
    use HasFactory;
    protected $fillable = [
        'client_email',
        'user_name',
        'profile_pic',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
