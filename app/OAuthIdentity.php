<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * @property $id
 * @property $provider_user_id
 * @property $provider
 * @property $access_token
 * @property $user_id
 * @property $avatar
 * @property $name
 * @property $nickname
 */
class OAuthIdentity extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'provider_user_id', 'provider', 'access_token', 'user_id', 'avatar', 'name', 'nickname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'oauth_identities';
    protected static $configuredTable = 'oauth_identities';

    public static function configureTable($table)
    {
        static::$configuredTable = $table;
    }

    public function getTable()
    {
        return static::$configuredTable;
    }

    /**
     * Get the user that owns the oauth identity.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
