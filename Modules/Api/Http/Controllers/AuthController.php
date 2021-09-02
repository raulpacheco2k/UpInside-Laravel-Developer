<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Api\Http\Requests\LoginRequest;
use Modules\Api\UseCase\UserCreateToken;
use Modules\Customer\Repositories\CustomerRepository;

class AuthController extends Controller
{
    /** @var CustomerRepository */
    private CustomerRepository $customerRepository;
    /** @var UserCreateToken */
    private UserCreateToken $userCreateToken;

    /**
     * @param  CustomerRepository  $customerRepository
     * @param  UserCreateToken  $userCreateToken
     */
    public function __construct(CustomerRepository $customerRepository, UserCreateToken $userCreateToken)
    {
        $this->customerRepository = $customerRepository;
        $this->userCreateToken = $userCreateToken;
    }

    /**
     * @param  LoginRequest  $request
     * @return JsonResponse
     */
    final public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->customerRepository->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $this->userCreateToken->execute($user);

            return $this->responseJson($this->responseToken($token));
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    final public function refreshToken(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        $token = $this->userCreateToken->execute($user);

        return $this->responseJson($this->responseToken($token));
    }

    /**
     * @param  array  $data
     * @param  int  $status
     * @return JsonResponse
     */
    private function responseJson(array $data, int $status = 200): JsonResponse
    {
        return response()->json($data, $status);
    }

    /**
     * @param  string  $token
     * @return array
     */
    private function responseToken(string $token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
        ];
    }
}
