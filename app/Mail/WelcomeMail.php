<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class WelcomeMail extends Mailable
{
    public $user;
    
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.welcome')
                    ->with([
                        'name' => $this->user->name,
                    ])
                    ->subject('Chào mừng từ Ứng dụng Quản lý Sản phẩm');
    }
}
