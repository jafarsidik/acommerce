<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;

class SocialiteAuth extends Controller
{
     /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function facebookRedirectToProvider()
    {
        return Socialite::driver('facebook')->scopes(['public_profile', 'email','user_posts','publish_actions'])->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function facebookHandleProviderCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->user();

        $token = $request->session()->put('access_token',$user->token);
        $request->session()->flash('selesai','Anda sudah terhubung dengan Facebook');
        return redirect('facebook');
    }

    /**
     * Redirect the user to the twitter authentication page.
     *
     * @return Response
     */
    public function twitterRedirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from twitter.
     *
     * @return Response
     */
    public function twitterHandleProviderCallback(Request $request)
    {
        $user = Socialite::driver('twitter')->user();

        $token = $request->session()->put('access_token',$user->token);
        $request->session()->flash('selesai','Anda sudah terhubung dengan Facebook');
        return redirect('twitter');
    }

    /**
     * Redirect the user to the google authentication page.
     *
     * @return Response
     */
    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->scopes(['https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/plus.stream.write'])->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return Response
     */
    public function googleHandleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        $token = $request->session()->put('access_token',$user->token);
        $userId = $request->session()->put('userId',$user->id);
        $request->session()->flash('selesai','Anda sudah terhubung dengan Facebook');
        return redirect('googleplus');
    }

    /**
     * Logging out from facebook credential by flushing the session
     */
    public function facebookLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('facebook');
    }

    /**
     * Logging out from twitter credential by flushing the session
     */
    public function twitterLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('twitter');
    }

    /**
     * Logging out from google credential by flushing the session
     */
    public function googleLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('googleplus');
    }
}
