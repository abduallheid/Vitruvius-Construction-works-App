<?php

namespace App\Http\Middleware\Contractor;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckContractorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if($guard != null){
        //     auth()->shouldUse($guard); //shoud you user guard / table
        //     $token = Auth::user()->_token;
        //     $request->headers->set('auth_token', (string) $token, true);
        //     $request->headers->set('Authorization', 'Bearer '.$token, true);
        //     try {
        //     //    $user = $this->auth->authenticate($request);  //check authenticted user
        //         $user = JWTAuth::parseToken()->authenticate();
        //     } catch (TokenExpiredException $e) {
        //         return  $this -> returnError('401','Unauthenticated user');
        //     } catch (JWTException $e) {

        //         return  $this -> returnError('', 'token_invalid'.$e->getMessage());
        //     }

        // }
        //  return $next($request);

        if (Auth::user() &&  Auth::user()->kind === 'contractor') {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
