<?php

namespace Modules\Api\UseCase;

class UserCreateToken
{
    public function execute($user)
    {
        return $user->createToken("token")->plainTextToken;
    }
}