<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){


        return view('login');
    }

    public function login_form(){
        
        if(empty(request('email')) || empty(request('password'))){

            toastr()->warning('Giriş işleminiz için bütün alanlar zorunludur!','Uyarı',['progressBar'=>false]);
            return redirect()->back();

        }else{

            $this->validate(request(),[
                'email'=>'required',
                'password'=>'required'
            ]);
            $notificationSuccess=array(
                'message'=>'Hoş Geldiniz  Sisteme Giriş Başarılı',
                'alert-type'=>'success'
            );

        $cretantials=[
            'email'=>request('email'),
            'password'=>request('password')
        ];

        if(auth()->attempt($cretantials))
        {
            request()->session()->regenerate();
            toastr()->success(auth()->user()->name,'Hoşgeldiniz Sn,' ,['progressBar'=>false]);
            return redirect()->route('index')->with($notificationSuccess);
        }
        else{
            toastr()->error('Kullanıcı Adınız veya Şifreniz hatalı!!!','Hatalı Şifre',['progressBar'=>false]);
            return back();
        }
    }
    }

    public function signup(){


        return view('signup');
    }

    public function signup_form(){

        $this->validate(request(),[
            'email'=>'required|min:5',
            'password'=>'required|min:5'
        ]);

        $user=User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password'))

        ]);

        auth()->login($user);

        return redirect()->route('login');

        return back();

    }

    public function logout(){
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
       
        toastr()->success('Sistem başarılı bir şekilde sonlanmıştır!','',['progressBar'=>false]);
        return redirect()->route('login');

    }
}
