<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'role'];

//     public function users()
// {
//     return $this->hasMany(User::class);
// }
public function users()
    {
        return $this->belongsToMany(User::class, 'user_user_group', 'user_group_id', 'user_id');
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
