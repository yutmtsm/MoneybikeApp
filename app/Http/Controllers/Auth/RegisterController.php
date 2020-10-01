<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = '/mypage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            // 追加
            'screen_name' => ['required', 'string', 'max:15', 'unique:users'],
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
            'gender'      => ['required'],
            'age'         => ['required',  'max:120'],
            'address'     => ['required']
        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request)));
        
        $this->guard()->login($user);
        
        return $this->registered($request, $user)
                    ?: redirect($this->redirectPath());
    }
    
    protected function create(Request $request)
    {
        $data = $request->all();
        
        // dd($money);
        if(isset($data['image'])){
            $path = Storage::disk('s3')->putFile('/users', $data['image'], 'public');
        } else {
            $path = "https://yutmtsm.s3.ap-northeast-1.amazonaws.com/z6L5P9QTOHolCDoQUx9s0bRY6LoeQfZgSho7StYu.png";
        }
        
        // dd($data);
        unset($data['_token']);
        
        $user =  User::create([
            // 追加
            'screen_name' => $data['screen_name'],
            'name'        => $data['name'],
            'email'       => $data['email'],
            'password'    => Hash::make($data['password']),
            'gender'      => $data['gender'],
            'age'         => $data['age'],
            'address'     => $data['address'],
            'profile_image' => Storage::disk('s3')->url($path),
        ]);
        
        return $user;
    }
}