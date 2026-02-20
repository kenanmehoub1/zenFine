<?php

namespace App\Listeners;

use App\Events\ContactEvent;
use Illuminate\Support\Facades\Mail;

class ContactListener
{
    public function handle(ContactEvent $event): void
    {
        $data = $event->x; // هذا هو array البيانات
        
        Mail::send('emails.contact', [
            'x' => $data,
        ], function ($message) use ($data) {
             
            $message->to('kasersaleh8@gmail.com')   
                    ->subject('Customer inquiry  ' )   
                     ->replyTo($data['business_email'])    
                      ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
    }
}