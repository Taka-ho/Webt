<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_codes extends Model
{
    use HasFactory;
    protected $table = 'caches';
    protected $primaryKey = 'key';
    
    protected $fillable = [
        'key',
        'value'
    ];

    public function relational()
    {
        return $this->hasOne(orth_users_info::class);
    }

    
}
