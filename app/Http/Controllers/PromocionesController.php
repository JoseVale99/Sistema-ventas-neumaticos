<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Str;



class PromocionesController extends Controller
{
    public function index(){

        return view('promociones.index');
    }

   
    public function toTelegram(Request $request)
    {
        $request->validate([
            'message' => 'required',
             'image' => 'required|image',
        ]);
 
        $text ="Michelin\n\n"
        .$request->input('message')
        ."\n\ntamaño de rines:"
        .$request->input('rin')
        ."º"
        ."\nDescuento del: ".$request->input('descuento')
        ."%";
        $photo = $request->file('image');
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID','-1001592159287'),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
        Telegram::sendPhoto([
            'chat_id' => env('TELEGRAM_CHANNEL_ID','-1001592159287'),
            'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), Str::random(40) . '.' . $photo->getClientOriginalExtension())
        ]);

        Session::flash('message_save', '¡Promoción enviada con éxito!');

        return redirect()->back();
    }
}
