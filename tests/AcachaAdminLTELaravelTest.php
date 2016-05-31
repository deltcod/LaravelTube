<?php

use App\User;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;

/**
 * Class AcachaAdminLTELaravelTest.
 */
class AcachaAdminLTELaravelTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @param User $user
     *
     * @return mixed
     */
    private function createUserApiKey(User $user)
    {
        $apiKey = ApiKey::make($user->id);
        $apiKey->save();
    }

    /**
     * Test Landing Page.
     *
     * @return void
     */
    public function testLandingPage()
    {
        //        $this->visit('/')
//             ->see('Acacha')
//             ->see('adminlte-laravel')
//             ->see('Pratt');
    }

    /**
     * Test Landing Page.
     *
     * @return void
     */
    public function testLandingPageWithUserLogged()
    {
        //        $user = factory(App\User::class)->create();
//
//        $this->actingAs($user)
//            ->visit('/')
//            ->see('Acacha')
//            ->see('adminlte-laravel')
//            ->see('Pratt')
//            ->see($user->name);
    }

    /**
     * Test Login Page.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->visit('/login')
            ->see('Sign in to start your session');
    }

    /**
     * Test Login.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(App\User::class)->create(['password' => Hash::make('passw0RD')]);
        $this->createUserApiKey($user);

        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('passw0RD', 'password')
            ->press('Sign In')
            ->seePageIs('/upload')
            ->see($user->name);
    }

    /**
     * Test Login.
     *
     * @return void
     */
    public function testLoginRequiredFields()
    {
        $this->visit('/login')
            ->press('Sign In')
            ->see('The email field is required')
            ->see('The password field is required');
    }

    /**
     * Test Register Page.
     *
     * @return void
     */
    public function testRegisterPage()
    {
        $this->visit('/register')
            ->see('Register a new membership');
    }

    /**
     * Test Password reset Page.
     *
     * @return void
     */
    public function testPasswordResetPage()
    {
        $this->visit('/password/reset')
            ->see('Reset Password');
    }

    /**
     * Test home page is only for authorized Users.
     *
     * @return void
     */
    public function testHomePageForUnauthenticatedUsers()
    {
        $this->visit('/upload')
            ->seePageIs('/login');
    }

    /**
     * Test home page works with Authenticated Users.
     *
     * @return void
     */
    public function testHomePageForAuthenticatedUsers()
    {
        $user = factory(App\User::class)->create();
        $this->createUserApiKey($user);

        $this->actingAs($user)
            ->visit('/upload')
            ->see($user->name);
    }

    /**
     * Test log out.
     *
     * @return void
     */
    public function testLogout()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/logout')
            ->seePageIs('/');
    }

    /**
     * Test 404 Error page.
     *
     * @return void
     */
    public function test404Page()
    {
        $this->get('asdasdjlapmnnk')
            ->seeStatusCode(404)
            ->see('404');
    }

    /**
     * Test user registration.
     *
     * @return void
     */
    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('Sergi Tur Badenas', 'name')
            ->type('sergiturbadenas@gmail.com', 'email')
//            ->check('terms') TODO
            ->type('passw0RD', 'password')
            ->type('passw0RD', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/upload')
            ->seeInDatabase('users', ['email' => 'sergiturbadenas@gmail.com',
                                      'name'  => 'Sergi Tur Badenas', ]);
    }

    /**
     * Test required fields on registration page.
     *
     * @return void
     */
    public function testRequiredFieldsOnRegistrationPage()
    {
        $this->visit('/register')
            ->press('Register')
            ->see('The name field is required')
            ->see('The email field is required')
            ->see('The password field is required');
    }

    /**
     * Test send password reset.
     *
     * @return void
     */
    public function testSendPasswordReset()
    {
        $user = factory(App\User::class)->create(['email' => 'laraveltube.adam@gmail.com']);

        $this->visit('password/reset')
            ->type($user->email, 'email')
            ->press('Send Password Reset Link')
            ->see('We have e-mailed your password reset link!');
    }

    /**
     * Test send password reset user not exists.
     *
     * @return void
     */
    public function testSendPasswordResetUserNotExists()
    {
        $this->visit('password/reset')
            ->type('notexistingemail@gmail.com', 'email')
            ->press('Send Password Reset Link')
            ->see('There were some problems with your input');
    }
}
