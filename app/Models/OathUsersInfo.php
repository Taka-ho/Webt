<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrthUsersInfo extends Model
{
    use HasFactory;
    protected $table = 'orth_users_info';
    protected $primaryKey = 'key';
    protected $personal_github_info = 'personal_github_info';

    protected $personal_discord_info = 'personal_discord_info';
    
    protected $fillable = [
        'key',
        'personal_github_info',
        'personal_discord_info',
        'expiration'
    ];

    public function relational()
    {
        return $this->hasOne(UsersCodes::class);
    }
}
