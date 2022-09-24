<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;
use App\Models\Reply;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'content',
        'user_id',
        'project_id',
    ];

    public function  scopeSelection($query)
    {

        return $query->select('id', 'content', 'project_id', 'user_id');
    }

    
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function project(){
        return $this->belongsTo(Project::class, 'user_id');
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class, 'comment_id', 'id');
    }

}
