<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionsGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_group_permission');
    }
}
