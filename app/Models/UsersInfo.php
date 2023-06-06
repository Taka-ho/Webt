<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInfo extends Model
{
    use HasFactory;
    protected $table = 'users_info';
    protected $primaryKey = 'id';
    protected $personal_github_id = 'personal_github_id';
    
    protected $personal_discord_id = 'personal_discord_id';
    protected $users_code = 'users_code';
    protected $fillable = [
        'id',
        'personal_github_info',
        'personal_discord_info',
        'users_code'
    ];

}
