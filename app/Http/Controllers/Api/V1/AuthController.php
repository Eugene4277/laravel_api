<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreAuthRequest;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthRequest $request)
    {
        $name = $request->post('name');
        $password = $request->post('password');

        $credentials = [
            'email' => str_replace(' ', '', $name)."@email.com",
            'password' => $password
        ];

        if (!Auth::attempt($credentials)) {
            $name = $request->post('name');
            $user = new User();
            
            $user->name = $name;
            $user->email = $credentials['email'];
            $user->password = Hash::make($credentials['password']);
            
            $user->save();

            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            $updateToken = $user->createToken('update-token', ['create', 'update']);
            $basicToken = $user->createToken('basic-token', ['none']);

            return [
                'admin' => explode("|", $adminToken->plainTextToken)[1],
                'update' => explode("|", $updateToken->plainTextToken)[1],
                'basic' => explode("|", $basicToken->plainTextToken)[1],
            ];
        }

        $response = new Response();
        $response->setStatusCode(422);
        $response->setContent(['message' => 'This name already exists, try another one', 'errors' => ['name' => 'This name already exists, try another one']]);
        
        return $response;    
    }

    public function getToken(Request $request) {
        
        $name = $request->post('name');
        $password = $request->post('password');

        $credentials = [
            'email' => str_replace(' ', '', $name)."@email.com",
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            $user_id = $request->user()->id;
            $user = User::find($user_id);



            return $user->tokens()->where('personal_access_tokens.tokenable_id', $user_id);
        }

        $response = new Response();
        $response->setStatusCode(422);
        $response->setContent(['message' => 'Wrong name or password']);
        
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }
}
