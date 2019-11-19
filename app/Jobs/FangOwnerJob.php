<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Message;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
class FangOwnerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $fangOwner;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fangOwner)
    {
        $this->fangOwner = $fangOwner;
        $this->handle();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $admin = $this->fangOwner;
        $ip = $_SERVER["REMOTE_ADDR"];
        $time = date("Y-m-d H:i:s");
        Mail::send("admin.mail.blade",compact('admin','ip','time'),function(Message $message) use ($admin){
            $message->subject("添加房东成功通知");
            $message->to($admin->email,$admin->truename);
        });
    }
}
