<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository as User;
use App\Transformers\UserTransformer;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Support\Facades\Storage;

/**
 * Class UserController.
 */
class UserController extends ApiGuardController
{
    /**
     * @var UserTransformer
     */
    protected $userTransformer;

    /**
     * @var array
     */
    protected $apiMethods = [
        'getAllUsers' => [
            'keyAuthentication' => false,
        ],
        'show' => [
            'keyAuthentication' => false,
        ],
    ];

    /**
     * UserController constructor.
     *
     * @param User            $user
     * @param UserTransformer $userTransformer
     */
    public function __construct(User $user, UserTransformer $userTransformer)
    {
        parent::__construct();

        $this->userTransformer = $userTransformer;
        $this->user = $user;
    }

    /**
     * Get all users.
     *
     * @return mixed
     */
    public function getAllUsers()
    {
        $user = $this->user->all();

        return $this->response->withCollection($user, $this->userTransformer);
    }

    /**
     * Get user find id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return $this->response->withItem($user, $this->userTransformer);
    }

    /**
     * Update user.
     *
     * @param UserUpdateRequest $request
     * @param $id
     *
     * @return mixed
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = $this->user->findOrFail($id);

        if ($request->avatar != '') {
            $path = $this->storeImage($request->avatar, $user);
        } else {
            $path = $user->avatar;
        }

        $data = [
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'avatar'   => $path,
        ];

        $this->user->update($data, $id);

        return $this->response->withItem($user, $this->userTransformer);
    }

    /**
     * Delete user.
     *
     * @param $id
     */
    public function delete($id)
    {
        $this->user->delete($id);
    }

    /**
     * Store image avatar.
     *
     * @param $image
     * @param $user
     *
     * @return mixed
     */
    private function storeImage($image, $user)
    {
        $path = Storage::url('images/avatars/'.$user->id.'.'.$image->getClientOriginalExtension());

        Storage::disk('public')->put(
            'images/avatars/'.$user->id.'.'.$image->getClientOriginalExtension(),
            file_get_contents($image->getRealPath())
        );

        return $path;
    }
}
