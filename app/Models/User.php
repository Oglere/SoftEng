<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'usn',
        'password_hash', // not used for login in your case
        'email',
        'phone_number',
        'role',
        'profile_picture',
        'last_login',
        'is_active',
    ];

    // Laravel should identify user by USN instead of email
    public function getAuthIdentifierName()
    {
        return 'usn';
    }

    // Override the password column (use last_name as password)
    public function getAuthPassword()
    {
        return $this->last_name;
    }
}
