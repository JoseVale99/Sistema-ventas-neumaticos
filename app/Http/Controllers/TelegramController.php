<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramController extends Notification
{
    public function via($notifiable){
        return [TelegramChannel::class];
    }
    
    public function toTelegram(){
        return TelegramMessage::create()
        ->content("Aproveche 10% de descuento en las llantas con rin 20°");
    }
}
