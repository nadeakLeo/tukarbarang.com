<?php

namespace App\Http\Controllers;

use App\BarangTukars;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthFacebookController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->fields([
            'name', 'email', 'gender', 'birthday','location'
        ])->scopes([
            'email', 'user_birthday','user_location'
        ])->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {
//        try
//        {
//            $user = Socialite::driver('facebook')->user();
//            dd($user);
//        } catch (\Exception $e) {
//            return redirect('/');
//        }
        $user = Socialite::driver('facebook')->fields([
            'name', 'email', 'gender', 'birthday','location'
        ])->user();
//        dd($user);

        $findUser = User::where('email',$user->email)->first();
        if($findUser){
            Auth::login($findUser);
            $data['barangs'] = BarangTukars::where('id_user', '=', Auth::id())->get();
            return view('my_store', $data);
        } else {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->gender = "-";
            $newUser->address = "-";
            $newUser->phone = "-";
            $newUser->birthday = date('Y-m-d');
            $pass = $user->id;
            $newUser->password = bcrypt($pass);
            $newUser->save();

            Auth::login($newUser);
            $data['barangs'] = BarangTukars::where('id_user', '=', Auth::id())->get();
            return view('my_store', $data);

        }


//        return $user->gender;
    }
}
