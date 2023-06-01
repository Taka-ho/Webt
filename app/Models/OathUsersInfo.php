<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class orthUsersInfo extends Model
{
    use HasFactory;
    protected $table = 'orth_users_info';
    protected $primaryKey = 'key';
    protected $personal_github_info = 'personal_github_info';

    protected $personal_discord_info = 'personal_discord_info';
    
    protected $fillable = [
        'key',
        'personal_github_info',
        'personal_discord_info'
    ];

    public function relational()
    {
        return $this->hasOne(users_codes::class);
    }
}
