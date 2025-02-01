<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'address',
        'contact_no',
        'password',
        'position',
        'email',
        'office',
        'religion',
        'sex',
        'status',
        'marital_status',
        'annual_income',
        'beneficiaries',
        'birthdate',
        'photo',
        'education',
        'employee_ID',
        'username',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_approved' => 'datetime',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        // Automatically set the default status when creating a new user
        static::creating(function ($user) {
            if (is_null($user->status)) {
                $user->status = 'Awaiting Approval';
            }
        });
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    protected $casts = [
        'date_approved' => 'datetime',
        'date_inactive' => 'datetime',
        'date_reactive' => 'datetime',
    ];

}
