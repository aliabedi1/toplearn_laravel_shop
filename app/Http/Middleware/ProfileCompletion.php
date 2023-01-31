<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCompletion
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
        $user = Auth::user();
        
        // signed up with email but didnt verify it and dont have mobile number
        if(!empty($user->email) && empty($user->mobile) && empty($user->email_verified_at))
        {
            return redirect()->route('customer.sales-process.profile-completion');
        }

        // dont have first name and last name and dont have national code
        if(empty($user->first_name) || empty($user->last_name) || empty($user->national_code))
        {
            return redirect()->route('customer.sales-process.profile-completion');
        }

        // signed up with mobile number but didnt verify it and dont have email
        if(!empty($user->mobile) && empty($user->email) && empty($user->mobile_verified_at))
        {
            return redirect()->route('customer.sales-process.profile-completion');
        }


        return $next($request);
    }
}
