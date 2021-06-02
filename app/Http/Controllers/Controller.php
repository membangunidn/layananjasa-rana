<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function date() {
        return date('Y-m-d H:i:s');
    }

    public function debug($var, $die = true){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if ($die) die;
    }
}
