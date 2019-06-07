<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Roles;
use App\Notifications\SignupActivate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public $successStatus = 200;
/**
* login api
*
* @return \Illuminate\Http\Response
*/
public function login(Request $request)
    {
        $request->validate([
            'username'       => 'required|string',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['username', 'password']);
        $credentials['active'] = 1;
        $credentials['deleted_at'] = null;

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Tus credenciales no son correctas.'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([

                'user_id' => $user->id,
                'name' => $user->name,
                'access_token' => $tokenResult->accessToken,
                'token_type'   => 'Bearer',
                'expires_at'   => Carbon::parse(
                    $tokenResult->token->expires_at)
                        ->toDateTimeString(),

        ]);
    }
/**
* Register api
*
* @return \Illuminate\Http\Response
*/
public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'username' => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = new User([
            'name'     => $request->name,
            'username'     => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'activation_token'  => str_random(60),
        ]);
        $user->save();
        $user->notify(new SignupActivate($user));

        $user
        ->roles()
        ->attach(Roles::where('nombre', 'user')->first());

        return response()->json(['message' => 'Usuario creado existosamente!'], 201);
    }

	/**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' =>
            'Te has deslogueado correctamente']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json(['message' => 'El token de activación es inválido'], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        return $user;
    }
}