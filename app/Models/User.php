<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Agent;
use App\Models\Shop;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Return balance depending on connected user
    public function getBalanceAttribute()
    {
        $user = Auth::user();
        switch ($user->role) {
            case 2:
                $model = Admin::where('id',$user->owner_id)->first();
                $balance = $model->balance;
                break;
            case 3:
                $model = Agent::where('id',$user->owner_id)->first();
                $balance = $model->balance;
                break;
            case 4:
                $model = Shop::where('id',$user->owner_id)->first();
                $balance = $model->balance;
                break;
            default:
                $balance = 9000;
                break;
        }
        return $balance;
    }

    // Return current user equivalent model
    public function getEquivalentAttribute()
    {
        $user = Auth::user();
        switch ($user->role) {
            case 2:
                $model = Admin::where('id',$user->owner_id)->first();
                break;
            case 3:
                $model = Agent::where('id',$user->owner_id)->first();
                break;
            case 4:
                $model = Shop::where('id',$user->owner_id)->first();
                break;
        }
        return $model;
    }
}
