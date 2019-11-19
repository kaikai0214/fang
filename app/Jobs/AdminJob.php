<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Message;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class AdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($admin)
    {
        $this->data = $admin;
        $this->handle();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $admin = $this->data;
        $ip = $_SERVER["REMOTE_ADDR"];
        $time = date("Y-m-d H:i:s");
        Mail::send("admin.mail.blade",compact('admin','ip','time'),function (Message $message) use ($admin){
            $message->subject("添加用户成功通知");
            $message->to($admin->email,$admin->truename);
        });
    }
}
