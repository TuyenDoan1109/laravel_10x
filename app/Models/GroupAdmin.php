<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupAdmin extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'group_admins';

    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class);
    }
}
