<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',
        'email',
        'password',
        'type',
        'role',
        'image'
    ];

    function image($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->image && file_exists(public_path('images/akunimage/' . $thumbnail . $this->image)))
            return asset('images/akunimage/' . $thumbnail  . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('images/akunimage/' . $this->image)))
            unlink(public_path('images/akunimage/' . $this->image));
        if ($this->image && file_exists(public_path('images/akunimage/small_' . $this->image)))
            unlink(public_path('images/akunimage/small_' . $this->image));
    }

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
    protected function type(): Attribute

    {

        return new Attribute(

            get: fn ($value) =>  ["superadmin", "admin", "operator", "readonly"][$value],

        );
    }
}
