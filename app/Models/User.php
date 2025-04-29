<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Startup;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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
        'email',
        'password',
        'role',
        'bio',
        'profile_picture_url',
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
        ];
    }

    /**
     * Get the profile picture URL
     * 
     * @return string
     */
    public function getProfilePictureUrlAttribute($value)
    {
        if (!$value) {
            return 'https://i.pinimg.com/474x/07/c4/72/07c4720d19a9e9edad9d0e939eca304a.jpg';
        }

        // If the value starts with http or https, it's a URL (legacy data)
        if (filter_var($value, FILTER_VALIDATE_URL) || strpos($value, 'http') === 0) {
            return $value;
        }

        // Otherwise, it's a path to a file in storage, construct URL properly
        return asset('storage/' . $value);
    }

    public function startup()
    {
        return $this->hasOne(Startup::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
