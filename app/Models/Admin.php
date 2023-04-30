<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'balance',
        'password',
    ];

    public function agents()
    {
        return $this->hasMany(Agent::class,'parent_id');
    }

    // Return user status
    public function getstatusAttribute()
    {
        $user = User::where('username',$this->username)->first();
        return $user->status;
    }

    // Return user status
    public function getRoleAttribute()
    {
       return 2;
    }
}
