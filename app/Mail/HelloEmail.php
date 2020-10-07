<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
 
class HelloEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    //  ContactController.phpのsendメソッドに設定したインスタンスの引数をコンストラクタに渡す。
    public function __construct($data)
    {
        $this->data = $data;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    //  メールの中身を別画面で表示
    public function build()
    {
        return $this->view('nologin.contact')
            ->subject('メッセージを受け付けました。ご意見・ご感想ありがとうごじました。')
            ->from($this->data['contact_email'], $this->data['contact_name'])
            ->with('data', $this->data);
    }
}