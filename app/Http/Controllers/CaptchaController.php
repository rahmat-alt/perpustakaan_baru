<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;

class CaptchaController extends Controller
{

    public function getCaptcha($config = 'default')
    {
        return response()->json(['captcha' => captcha_img($config)]);
    }
}
