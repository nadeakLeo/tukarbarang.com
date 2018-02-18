<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS ROG
 * Date: 2/17/2018
 * Time: 11:49 AM
 */



namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Routing\Controller;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

//        try
//        {
//            $user = Socialite::driver('google')->user();
//            dd($user);
//        } catch (\Exception $e) {
//            return redirect('/');
//        }

        $user = Socialite::driver('google')->stateless()->user();

//        $token = $user->token;
//        $user->getId();
//        $user->getNickname();
//        $user->getName();
//        $user->getEmail();
//        $user->getAvatar();
        dd($user);
        return $user->name;
        // $user->token;
    }
}