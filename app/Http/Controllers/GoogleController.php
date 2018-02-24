<?php
/**
 * Created by IntelliJ IDEA.
 * User: ASUS ROG
 * Date: 2/17/2018
 * Time: 11:49 AM
 */



namespace App\Http\Controllers;

use App\BarangTukars;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
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
    }
}