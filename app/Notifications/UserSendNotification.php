<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UserSendNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $userEmail;
    public $password;
    public $id;

    public function __construct($email,$user_id,$passwords)
    {   
        
        $this->userEmail = $email;
        $this->password = $passwords;
        $this->id = $user_id;
        // dd($this->password);
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {   
        // dd($this->password);
        $id = $this->id;
        
        return (new MailMessage)
            ->subject('Welcome to Our Platform')
            ->line('Thank you for using our application!')
            // ->action('Log in to your account', URL::to('/login'))
            ->action('Visit User', URL::to("/visit/{$id}"))
            ->markdown('emails.user_notification', [
                'username' => $this->userEmail,
                'password' => $this->password,
                'user_id'  => $this->id,
            ]);
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}

