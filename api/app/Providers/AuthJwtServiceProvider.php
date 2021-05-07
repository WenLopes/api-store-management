<?php

namespace App\Modules\Auth\Providers;

use App\Models\Employee;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class JwtCustomServiceProvider implements UserProvider {
    use Authenticatable;

    public function __construct()
    {
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     *
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveById($identifier) {

        // $user = $this->userRepo->findByLogin($identifier);
        $user = Employee::where('email', $identifier)->first();

        if(isset($user)){
            return $user;
        }
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     *
     * @return \Illuminate\Auth\UserInterface|null
     */
    public function retrieveByCredentials(array $credentials) 
    {
        $conn = new Connection();
        if( $conn->createNewConnection($credentials) ) {
            return new GenericUser($credentials);
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param \Illuminate\Auth\UserInterface $user
     * @param  array  $credentials
     *
     * @return bool
     */
    public function validateCredentials(\Illuminate\Contracts\Auth\Authenticatable $user, array $credentials) {
        return true;
    }

    public function retrieveByToken($identifier, $token) {}

    public function updateRememberToken(\Illuminate\Contracts\Auth\Authenticatable $user, $token) {}

}
