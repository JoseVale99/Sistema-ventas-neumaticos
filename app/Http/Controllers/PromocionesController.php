<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NotificationChannels\Telegram\TelegramChannel;

class PromocionesController extends Controller
{
    public function index(){
        return view('Promociones');
    }

    public function mensaje(){
        return Notification::route('tele','1930209205') //'-503615330')
            ->notify(new App\Http\Controllers\TelegramController());
    }
}
