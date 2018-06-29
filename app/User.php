<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Edit($edited)
    {

        if (!array_key_exists('password', $edited))
        {
            return $this::where('id', $edited['id'])
            ->update([
                    'name' => $edited['name'],
                    'email' => $edited['email'],
                    'address' => $edited['address'],
                    'card_type' => $edited['card_type'],
                    'card_number' => $edited['card_number'],
                    'info' => $edited['info']
            ]);
        }

        return $this::where('id', $edited['id'])
            ->update([
                    'name' => $edited['name'],
                    'email' => $edited['email'],
                    'address' => $edited['address'],
                    'card_type' => $edited['card_type'],
                    'card_number' => $edited['card_number'],
                    'info' => $edited['info'],
                    'password' => bcrypt($edited['password'])
            ]);

    }

    public static function deleteUser()
    {
        self::destroy(request()->id);
    }
}
