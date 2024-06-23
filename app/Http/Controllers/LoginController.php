<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Laravel\Jetstream\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
      /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function redirectToGithub()
    {        
        return Socialite::driver('github')->redirect();
    }
    
    public function redirectToTwitter()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function handleGoogleCallback()
    {
        try {
            //create a user using socialite driver google
            $user = Socialite::driver('google')->user();
            // if the user exits, use that user and login
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                return redirect('/dashboard');
            }
            elseif(auth()->user() != null)
            {
                $uptUser = User::find(Auth::user()->id);
                $uptUser = $user->email;
                $uptUser->google_id = $user->id;
                $uptUser->google_token = $user->token;
                $uptUser->save();
                return redirect('/dashboard');
            }
            else{
                //user is not yet created, so create first
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->google_id = $user->id;
                $newUser->google_token = $user->token;
                $newUser->save();
                //every user needs a team for dashboard/jetstream to work.

                //login as the new user
                Auth::login($newUser);
                // go to the dashboard
                return redirect('/dashboard');
            }
            //catch exceptions
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    public function handleFacebookCallback()
    {
        try {
            //create a user using socialite driver google
            $user = Socialite::driver('facebook')->user();
            // if the user exits, use that user and login
            $finduser = User::where('facebook_id', $user->id)->first();
            if($finduser){
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                return redirect('/dashboard');
            }
            elseif(auth()->user() != null)
            {
                $uptUser = User::find(Auth::user()->id);
                $uptUser = $user->email;
                $uptUser->facebook_id = $user->id;
                $uptUser->facebook_token = $user->token;
                $uptUser->save();
                return redirect('/dashboard');
            }
            else{
                //user is not yet created, so create first
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->facebook_id = $user->id;
                $newUser->facebook_token = $user->token;
                $newUser->save();
                //every user needs a team for dashboard/jetstream to work.

                //login as the new user
                Auth::login($newUser);
                // go to the dashboard
                return redirect('/dashboard');
            }
            //catch exceptions
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    public function handleGithubCallback()
    {
        try {
            //create a user using socialite driver google
            $user = Socialite::driver('github')->user();
            if(auth()->user() != null)
            {
                $uptUser = User::find(Auth::user()->id);
                $uptUser = $user->email;
                $uptUser->github_id = $user->id;
                $uptUser->github_token = $user->token;
                $uptUser->save();
                dd('df');
                return redirect('/dashboard');
            }
            // if the user exits, use that user and login
            $finduser = User::where('github_id', $user->id)->first();
            if($finduser){                
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                return redirect('/dashboard');
            }
            else{                
                //user is not yet created, so create first
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->github_id = $user->id;
                $newUser->github_token = $user->token;
                $newUser->save();
                //every user needs a team for dashboard/jetstream to work.
                //login as the new user
                Auth::login($newUser);
                // go to the dashboard
                return redirect('/dashboard');
            }
            //catch exceptions
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function handleTwitterCallback()
    {
        try {
            //create a user using socialite driver google
            $user = Socialite::driver('twitter')->user();
            // if the user exits, use that user and login
            $finduser = User::where('twitter_id', $user->id)->first();
            if($finduser){
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                return redirect('/dashboard');
            }else{
                //user is not yet created, so create first
                $newUser = User::updateOrCreate([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id'=> $user->id,
                    'password' => encrypt('')
                ]);
                //every user needs a team for dashboard/jetstream to work.
                $newUser->save();
                //login as the new user
                Auth::login($newUser);
                // go to the dashboard
                return redirect('/dashboard');
            }
            //catch exceptions
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
