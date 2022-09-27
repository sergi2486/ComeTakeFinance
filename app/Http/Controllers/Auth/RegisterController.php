<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Notifications\RegisteredUser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $user->notify(new RegisteredUser());
       // $this->guard()->login($user);

        return redirect('/login')->with('success', 'Votre compte a été crée, vous avez reçut un mail d\'activation a cette adresse '.$request->email);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'city' => 'required|string|min:3',
            'quarter' => 'required|string|min:3',
            'phone_number' => 'required|string|min:9|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'city' => $data['city'],
            'phone_number' => $data['phone_number'],
            'quarter' => $data['quarter'],
            'validation_token' => str_replace('/', '', bcrypt(str_random(50))),
            'password' => bcrypt($data['password']),
        ]);

        
    }

    public function confirm($id, $token){
        $user = User::where('id', $id)->where('validation_token', $token)->first();

        if($user){
            $user->update(['validation_token' => null]);
            $this->guard()->login($user);
            
            return redirect($this->redirectPath())->with('success', 'Votre compte a bien été confirmé');
        } else {
            return redirect('/login')->with('error', 'Ce lien n\'est pas valide');
        }
    }

}
