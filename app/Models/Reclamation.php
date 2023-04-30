<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable = ['phone', 'name', 'lastname','phone', 'state','email','la','ln','type','created_at','updated_at','message','tech_name'];
}
