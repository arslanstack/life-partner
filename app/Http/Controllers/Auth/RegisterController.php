<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'interestedin' => ['required'],
            'financial_support' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    protected function create(array $data)
    {
        $iam = '';
        if ($data['financial_support'] == '0' && $data['interestedin'] == '0') {
            $iam = 'Sugar Mommy';
            $interestedin = 'Sugar Baby (Hombre/Man)';
        } else if ($data['financial_support'] == '0' && $data['interestedin'] == '1') {
            $iam = 'Sugar Daddy';
            $interestedin = 'Sugar Baby (Mujer/Women)';
        } else if ($data['financial_support'] == '0' && $data['interestedin'] == '2') {
            $iam = 'Sugar Daddy Mommy';
            $interestedin = 'Sugar Baby (Trans)';
        } else if ($data['financial_support'] == '1' && $data['interestedin'] == '0') {
            $iam = 'Sugar Baby (Mujer / Woman)';
            $interestedin = 'Sugar Daddy';
        } else if ($data['financial_support'] == '1' && $data['interestedin'] == '1') {
            $iam = 'Sugar Baby (Hombre / Man)';
            $interestedin = 'Sugar Mommy';
        } else if ($data['financial_support'] == '1' && $data['interestedin'] == '2') {
            $iam = 'Sugar Baby (Trans)';
            $interestedin = 'Sugar Daddy Mommy';
        } else {
            $iam = 'Sugar Daddy';
            $interestedin = 'Sugar Baby';
        }


        $unique = '';
        $unique = time() . '$' . $data['email'];
        return User::create([
            'unique_id' => $unique,
            'username' => strtok($data['email'], '@'),
            'email' => $data['email'],
            'password' => Hash::make(strtok($unique, '$')),
            'iam' => $iam,
            'interestedin' => $interestedin,
            'financial_support' => $data['financial_support'],
            'verify_status' => 0,
            'status' => 0,
        ]);
    }
}
