<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commant extends Model
{
    use HasFactory;
    protected $table = 'commants';
    protected $fillable = [
        'comment',
        'user_id',
        'project_id',
    ];

    public function  scopeSelection($query)
    {

        return $query->select('id', 'comment', 'project_id', 'user_id');
    }
}
