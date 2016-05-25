<?php

namespace App\Transformers;

/**
 * Class UserTransformer
 * @package App\Transformers
 */
class UserTransformer extends Transformer
{
    /**
     * @param $user
     * @return array
     */
    public function transform($user)
    {
        return [
            'id'     => (int) $user['id'],
            'name'     => $user['name'],
            'email' => $user['email'],
            'avatar'     => $user['avatar'],
        ];
    }
}
