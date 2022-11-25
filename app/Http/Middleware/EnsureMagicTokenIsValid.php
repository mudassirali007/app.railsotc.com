<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Magic;

class EnsureMagicTokenIsValid
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
        $did_token = $request->didt ? $request->didt : $request->magic_credential; 
        $decoded_did_token = \json_decode(\utf8_decode(\base64_decode($did_token, true)));
       
        if ($did_token === null || $decoded_did_token === null) {
            \Storage::append('request.txt', $request);
            return redirect()->route('home');
        }
       
        try {
            // Validate the did token
            Magic::token()->validate($did_token);
        } catch (\Exception $error) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
