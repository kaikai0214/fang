<?php

namespace App\Observers;

use App\Models\Login;
use Illuminate\Mail\Message;
use Mail;
class LoginObserver
{
    /**
     * Handle the login "created" event.
     *
     * @param  \App\Models\Login  $login
     * @return void
     */
    public function login(Login $login){
        dd(123);
        $email = $login->email;
        $name = $login->name;

        $ip = $_SERVER["REMOTE_ADDR"];
        $time = date("Y-m-d H:i:s");
        Mail::send("admin.mail.blade",compact('login','ip','time'),function (Message $message) use ($email,$name){
            $message->subject("登陆成功通知");
            $message->to($email,$name);
        });
    }

    /**
     * Handle the login "updated" event.
     *
     * @param  \App\Models\Login  $login
     * @return void
     */
    public function updated(Login $login)
    {
        //
    }

    /**
     * Handle the login "deleted" event.
     *
     * @param  \App\Models\Login  $login
     * @return void
     */
    public function deleted(Login $login)
    {
        //
    }

    /**
     * Handle the login "restored" event.
     *
     * @param  \App\Models\Login  $login
     * @return void
     */
    public function restored(Login $login)
    {
        //
    }

    /**
     * Handle the login "force deleted" event.
     *
     * @param  \App\Models\Login  $login
     * @return void
     */
    public function forceDeleted(Login $login)
    {
        //
    }
}
