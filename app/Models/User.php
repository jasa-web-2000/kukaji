<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];


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
        'password' => 'hashed',
    ];


    public function getPhotoAttribute($value = '')
    {
        $fullPath = $value;
        if (file_exists($fullPath)) {
            return [
                'path' => $fullPath,
                'exists' => true,
                'url' => asset($fullPath)
            ];
        }

        return [
            'path' => $fullPath,
            'exists' => false,
            'url' => asset('img/profil.png')
        ];
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!empty($user->username)) {
                $username = trim($user->username);

                if (substr($username, 0, 1) !== '@') {
                    $username = '@' . $username;
                }

                $user->username = $username;
            }
        });

        static::deleting(function ($user) {
            if ($user->photo['path'] && File::exists(public_path($user->photo['path']))) {
                File::delete($user->photo['path']);
            }
        });
    }
}
