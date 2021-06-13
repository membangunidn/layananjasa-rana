<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\User;
use Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

class SendEmail {

    CONST username = 'cyberfrog6661@gmail.com';
    CONST host = 'smtp.gmail.com';
    CONST password = 'agennsx123';
    CONST port = 465;
    CONST encryption = 'ssl';
    CONST from = 'membangun.id';

    public static function connect(){

        Config::set('mail.mailers.smtp.transport', 'smtp');
        Config::set('mail.mailers.smtp.port', self::port);
        Config::set('mail.mailers.smtp.encryption', self::encryption);
        Config::set('mail.mailers.smtp.host', self::host);
        Config::set('mail.mailers.smtp.username', self::username);
        Config::set('mail.mailers.smtp.password', self::password);

        Config::set('mail.from.address', self::username);
        Config::set('mail.from.name', self::from);
    }

    public static function doVerifikasiRegister($emailtujuan, $token){
        self::connect();

        $details = [
            'register' => url('sign_up'),
            'link' => url('sign_in/konfirm/email/'.$token)
        ];

        try {
            Mail::to($emailtujuan)->send(new RegisterMail($details));
            $response = true;
        } catch (\Throwable $th) {
            $response = false;
        }
        return $response;
    }
}