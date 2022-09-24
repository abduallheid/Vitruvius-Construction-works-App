<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'replies';
    protected $fillable = [
        'content',
        'user_id',
        'project_id',
        'comment_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function  scopeSelection($query)
    {
        return $query->select('id', 'content', 'user_id', 'project_id','comment_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
