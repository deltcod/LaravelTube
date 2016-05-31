<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OAuthIdentity;
use App\User;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class SocialAuthController.
 */
class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return Response
     */
    public function redirectToAuthenticationServiceProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from authentication service provider.
     *
     * @return Response
     */
    public function handleAuthenticationServiceProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/'.$provider);
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);

        return Redirect::to('upload');
    }

    /**
     * @param $providerUser
     * @param $provider
     *
     * @return bool|mixed
     */
    private function findOrCreateUser($providerUser, $provider)
    {
        if ($authUser = $this->userExistsByProviderUserId($providerUser)) {
            return $authUser;
        }

        return $this->createUser($providerUser, $provider);
    }

    /**
     * @param $providerUser
     * @param $provider
     *
     * @return User
     */
    private function createUser($providerUser, $provider)
    {
        $user = $providerUser;
        $userExsists = $this->userExistsByEmail($providerUser);

        if (!$userExsists) {
            $user = $this->newUser();
            foreach (['name', 'email', 'avatar'] as $item) {
                $user->$item = $providerUser->$item;
            }

            $user->save();
        }

        $oAuthIdentity = new OAuthIdentity();
        $oAuthIdentity->provider_user_id = $providerUser->getId();
        $oAuthIdentity->provider = $provider;
        $oAuthIdentity->access_token = $providerUser->token;
        $oAuthIdentity->user_id = $user->id;
        $oAuthIdentity->avatar = $providerUser->getAvatar();
        $oAuthIdentity->name = $providerUser->getName();
        $oAuthIdentity->nickname = $providerUser->getNickname();
        $this->createUserApiKey($user);
        $oAuthIdentity->save();

        return $user;
    }

    /**
     * @return mixed
     */
    private function newUser()
    {
        $user_model = Config::get('laraveltube-socialite.model');

        return new $user_model();
    }

    /**
     * @param $providerUser
     *
     * @return bool|mixed
     */
    private function userExistsByProviderUserId($providerUser)
    {
        /** @var OAuthIdentity $provUser */
        if ($provUser = OAuthIdentity::where('provider_user_id', $providerUser->id)->first()) {
            return $provUser->user;
        }

        return false;
    }

    /**
     * @param $providerUser
     *
     * @return bool
     */
    private function userExistsByEmail($providerUser)
    {
        if ($user = User::where('email', $providerUser->email)->first()) {
            return $user;
        }

        return false;
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    private function createUserApiKey(User $user)
    {
        $apiKey = ApiKey::make($user->id);
        $user->apiKey()->save($apiKey);
    }
}
