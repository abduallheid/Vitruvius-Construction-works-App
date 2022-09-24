<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'Transactions';
    protected $fillable = [
        'invoice_id',
        'user_id',
        'salary',
        'project_id',
    ];

    public function  scopeSelection($query)
    {

        return $query->select('id', 'invoice_id','user_id','salary','project_id');
    }



}
