<?php

use App\User;
use Chrisbjr\ApiGuard\Models\ApiKey;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserAPITest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Create fake user.
     *
     * @return mixed
     */
    public function createUser()
    {
        $user = factory(User::class)->create();
        $this->createUserApiKey($user);

        return $user;
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

    /**
     * Test user in database are listed by API.
     *
     * @return void
     */
    public function testUserInDatabaseAreListedByAPI()
    {
        $user = $this->createUser();
        $this->get('/api/users/')
            ->seeJsonStructure([
                '*' => [
                    '*' => [
                        'id', 'name', 'email', 'avatar',
                    ],
                ],
            ])->seeStatusCode(200);
    }

    /**
     * Test user is an api then returns JSON.
     *
     * @return void
     */
    public function testCreateUserAndShowUseJson()
    {
        $user = $this->createUser();
        $this->get('/api/users/'.$user->id)->seeJson()->seeStatusCode(200);
    }

    /**
     * Test upate user and see in DB.
     *
     * @return void
     */
    public function testCanBeUpdateAndSeeInDB()
    {
        $user = $this->createUser();
        $file = storage_path('app/public/images/avatars/demo.jpg');
        $image = new Symfony\Component\HttpFoundation\File\UploadedFile(
            $file,
            'demo.jpg',
            'image/jpg',
            null,
            null,
            true
        );

        $data = ['id' => $user->id, 'name' => 'Test User', 'email' => 'user@email.com', 'password' => '123456', 'avatar' => $image];
        $this->post('/api/users/'.$user->id, $data, ['X-Authorization' => $user->apiKey->key]);
        $user = User::find($user->id);
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('user@email.com', $user->email);
        $this->assertEquals('/storage/images/avatars/'.$user->id.'.jpg', $user->avatar);
        $this->get('/api/users')->seeJsonContains(['id' => $user->id, 'name' => 'Test User', 'email' => 'user@email.com', 'avatar' => '/storage/images/avatars/'.$user->id.'.jpg'])->seeStatusCode(200);
    }

    /**
     * Test upate user without avatar and see in DB.
     *
     * @return void
     */
    public function testCanBeUpdateWithoutAvatarAndSeeInDB()
    {
        $user = $this->createUser();

        $data = ['id' => $user->id, 'name' => 'Test User', 'email' => 'user@email.com', 'password' => '123456'];
        $this->post('/api/users/'.$user->id, $data, ['X-Authorization' => $user->apiKey->key]);
        $user = User::find($user->id);
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('user@email.com', $user->email);
        $this->assertEquals('/img/user2-160x160.png', $user->avatar);
        $this->get('/api/users')->seeJsonContains(['id' => $user->id, 'name' => 'Test User', 'email' => 'user@email.com', 'avatar' => '/img/user2-160x160.png'])->seeStatusCode(200);
    }

    /**
     * Test delete user and  not see in DB.
     *
     * @return void
     */
    public function testCanBeDeleteAndNotSeeInDB()
    {
        $user = $this->createUser();
        $data = ['name' => $user->name, 'email' => $user->email, 'avatar' => $user->avatar];

        $this->delete('/api/users/'.$user->id, ['X-Authorization' => $user->apiKey->key])->notSeeInDatabase('users', $data);
        $this->get('/api/users')->dontSeeJson($data)->seeStatusCode(200);
    }
}
