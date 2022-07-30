<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Graduate extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usertype',
        'firstname',
        'middlename',
        'lastname',
        'sex',
        'civil_status',
        'phone',
        'email',
        'password',
    ];

    protected $attributes = [
        'usertype' => '',
        'firstname' => '',
        'middlename' => '',
        'lastname' => '',
        'sex' => 'male',
        'civil_status' => '',
        'phone' => '',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    # attributes -------------------------------------------------------

    public function getFmlnameAttribute()
    {
        return trim("{$this->firstname} {$this->middlename} {$this->lastname}");
    }

    public function getFlnameAttribute()
    {
        return trim("{$this->firstname} {$this->lastname}");
    }

    public function getIsAdminAttribute()
      {
        return $this->usertype === 'adm';
      }

    public function getIsPersonnelAttribute()
    {
        return $this->usertype === 'prsnl';
    }

    public function getIsAlumniAttribute()
    {
        return $this->usertype === 'alum';
    }

    # relationships ----------------------------------------------------

    public function user_designations()
    {
        return $this->hasMany(UserDesignation::class, 'user_id', 'id');
    }

    public function alumni_tracers()
    {
        return $this->hasMany(AlumniTracer::class, 'user_id', 'id');
    }

    # scopes -----------------------------------------------------------

    public function scopeSearch($query, $search)
    {
        $search = trim($search);
        $query->where(function ($query) use ($search) {
            $query->where(DB::raw('CONCAT(firstname, " ", lastname)'), 'like', "%{$search}%")
            ->orWhere(DB::raw('CONCAT(firstname, " ", middlename, " ", lastname)'), 'like', "%{$search}%")
            ->orWhere('email', 'like', "%$search%");
        });
    }

    public function scopeNotAdmin($query)
    {
        $query->where('usertype', '!=', 'alum');
    }
    
    # custom functions --------------------------------------------------


}
