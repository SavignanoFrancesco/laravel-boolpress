<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //gestione richiesta e conseguenza di essa(handling)
    //bisogna andare in kernel.php(routeMiddleware) a inserire il namespace per questo middleware
    public function handle($request, Closure $next)
    {
        //verifico se cè un token nella richiesta
        $token_to_verify = $request->header('authorization');
        if (empty($token_to_verify)) {
            // code...
            return response()->json([
                'success' => false,
                'error' => 'API Token non trovato'
            ]);
        }else{
            $api_token = substr($token_to_verify, 7);
            // dd('token trovato');
            //ora verifico se il token corrisponde a quello assegnato nella tabella user
            $valid_token_user = User::where('api_token', $api_token)->first();

            if (!$valid_token_user) {
                // code...
                return response()->json([
                    'success' => false,
                    'error' => 'API Token non valido'
                ]);
            }else{
                return $next($request);
            }
        }
    }
}
