<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
   public function welcome($to, $subject, $message, $user, $pass)
   {
      $this
      ->to($to)
      ->subject($subject)
      ->emailFormat('html')
      ->template('welcome', 'lovesita')
      ->viewVars(['user' => $user, 'pass'=>$pass, 'message'=>$message]);
   }


   public function resetPassword($user, $password)
   {
      $this
      ->to($user->email)
      ->subject(__('Your new password'))
      ->emailFormat('html')
      ->template('recover', 'lovesita')
      ->viewVars(['password'=>$password, 'user'=>$user]);
   }

   public function notification($to_emails, $subject, $content)
   {
      $this
      ->to($to_emails)
      ->subject($subject)
      ->emailFormat('html')
      ->template('notification', 'lovesita')
      ->viewVars(['content'=>$content]);
   }

   public function admin_notif($subject, $annouce)
   {
      $this
      ->to('blueyceven@gmail.com')
      ->subject($subject)
      ->emailFormat('html')
      ->template('admin_notification', 'lovesita')
      ->viewVars(['announce'=>$annouce]);
   }

   public function message($subject, $message)
   {
      $this
      ->to('blueyceven@gmail.com')
      ->subject($subject)
      ->replyTo($message->email)
      ->emailFormat('html')
      ->template('message', 'lovesita')
      ->viewVars(['message'=>$message]);
   }
}
