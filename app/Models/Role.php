<?php

namespace App\Models;
use App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
    public function userGroups()
    {
        return $this->hasMany(UserGroup::class);
    }
}
