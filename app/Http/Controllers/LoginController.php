<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::query()->where('email', $request->email)->first();

        if (is_null($user)) {
            return back()->withErrors([
                'email' => 'Usuário não encontrado!',
            ]);
        } else {
            if (Hash::check($request->password, $user->password)) {
                $credenciais = $request->only(['email', 'password',]);

                if (!Auth::attempt($credenciais)) {
                    return back()->withErrors([
                        'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
                    ]);
                }

                // Redirecionar para a página inicial após o login bem-sucedido
                return redirect()->intended('/');
            } else {
                return back()->withErrors([
                    'password' => 'Senha incorreta!',
                ]);
            }
        }
    }



    function getUserByToken()
    {
        $user = Auth::guard('api')->user();
        if ($user) {
            return $user;
        } else {
            return response('Usuario não encontrado!', 404);
        }
    }

    public function tokenById(String $id)
    {

        $token =
            auth()->tokenById($id);
        return response()->json([
            'data' => [
                'Status' => 'Sucesso!',
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
            ]
        ]);
    }

    public function logout()
    {
        try {
            auth()->logout();
            auth()->logout(true);
            return response('deslogado com sucesso!', 200);
        } catch (\Throwable $th) {
            return response('$th ', 401);
        }
    }
}
