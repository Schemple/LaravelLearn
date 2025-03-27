<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookNotification extends Notification
{
    use Queueable;
    protected $book;
    /**
     * Create a new notification instance.
     */
    public function __construct($book)
    {
        $this->book = $book;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
        return (new MailMessage)
            ->subject('Xác nhận thuê sách')
            ->greeting("Xin chào, {$notifiable->name}!")
            ->line("Bạn vừa thuê sách: " . $this->rental->book->title)
            ->line("Ngày thuê: " . $this->rental->rented_at)
            ->line("Ngày hết hạn: " . $this->rental->due_at)
            ->action('Xem chi tiết', url('/rentals/' . $this->rental->id))
            ->line('Cảm ơn bạn đã sử dụng dịch vụ!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
