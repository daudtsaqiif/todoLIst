<?php

namespace App\Models;

use App\Models\User;
use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class todoList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'status',
        'dateline',
        'description'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
