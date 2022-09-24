<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = [
        'user_id',
        'project_id',
        'user_name',
        'notification_type',
        'address',
        'profile_picture',
        'seen',
    ];

    public function  scopeSelection($query)
    {

        return $query->select('id', 'user_id', 'project_id', 'user_name','notification_type','address','profile_picture','seen');
    }
}
