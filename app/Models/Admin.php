<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;
    protected $guard = "admin";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'status',
        'admin_group_id',
        'province_id',
        'district_id',
        'ward_id',
        'address',
        'birthday',
        'phone',
        'avatar',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groupAdmin(): BelongsTo
    {
        return $this->belongsTo(GroupAdmin::class);
    }

}
