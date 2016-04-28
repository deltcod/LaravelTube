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
 *
 */
class OAuthIdentity extends Eloquent
{
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
