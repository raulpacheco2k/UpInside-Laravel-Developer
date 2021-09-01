<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Api\Http\Requests\LoginRequest;
use Modules\Customer\Repositories\CustomerRepository;
use Nette\Schema\ValidationException;

class AuthController extends Controller
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    final public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->customerRepository->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token['token'] = $user->createToken($request->device_name)->plainTextToken;
            return response()->json($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
