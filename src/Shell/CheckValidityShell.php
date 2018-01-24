<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Mailer\MailerAwareTrait;
use Cake\I18n\Time;


/**
* CheckValidity shell command.
*/
class CheckValidityShell extends Shell
{
   use MailerAwareTrait;

   /**
   * Manage the available sub-commands along with their arguments and help
   *
   * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
   *
   * @return \Cake\Console\ConsoleOptionParser
   */
   public function getOptionParser()
   {
      $parser = parent::getOptionParser();

      return $parser;
   }

   /**
   * main() method.
   *
   * @return bool|int|null Success or error code.
   */
   public function main()
   {
      $this->loadModel('Contracts');
      $this->loadModel('Announces');
      $this->loadModel('Notifications');
      $this->loadModel('Ads');
      $ads_offline = 0;
      $announces_offline = 0;
      $soon_expired = 0;
      $point = ".";
      $contracts = $this->Contracts->find('all', [
         'contain'=>[
            'Users'
         ],
         'conditions'=>[
            'Contracts.active' => true
         ]
      ]);
      $this->out("Start");
      $notification = $this->Notifications->findById(5)->first();
      //check expired

      $now = new Time();

      foreach ($contracts as $contract) {
         //$this->out($contract->label);
         if($contract->end < $now){
            $announces = $this->Announces->find('all')->where(['Announces.contract_id'=>$contract->id]);
            foreach ($announces as $announce) {
               if($announce->status == 'ONLINE'){
                  $announce->status = 'EXPIRED';
                  $this->Announces->save($announce);
                  $announces_offline++;
                  $this->out($announce->title." IS EXPIRED");
                  try {
                     $this->getMailer('User')->send('notification', [filter_var($contract->user->email, FILTER_SANITIZE_EMAIL), $notification->subject, $notification->message]);
                     //$this->getMailer('User')->send('notification', ['cyril@3xw.ch', $notification->subject, $notification->message]);
                  } catch (Exception $exc) {
                     $this->out($exc->getTraceAsString());
                  }
               }
            }
            $ads = $this->Ads->find('all')->where(['Ads.contract_id'=>$contract->id]);
            foreach ($ads as $ad) {
               if($ad->active){
                  $ad->active = false;
                  $this->Ads->save($ad);
                  $ads_offline++;
                  $this->out("AD n°".$ad->id." IS EXPIRED");
               }
            }

            //disactive contract
            if ($contract->active) {
              $contract->active = false;
              $this->Contracts->save($contract);
              $this->out("Contract n°".$contract->id." IS EXPIRED");
            }
         }
         $this->out("Check: ".$contract->label);
      }
      $this->hr();
      $this->out("Rapport");
      $this->out("ADS EXPIRED : ".$ads_offline);
      $this->out("ANNOUNCES EXPIRED : ".$announces_offline);
      $this->hr();

      //warning, soon expired

      $notification = $this->Notifications->findById(4)->first();
      $contracts = $this->Contracts->find('all', [
         'contain'=>[
            'Users'
         ],
         'conditions' => [
            'Contracts.end' => new Time("+ 3 days")
         ]
      ]);
      foreach ($contracts as $contract) {
         $this->out($contract->label." EXPIRE IN 3 DAYS");
         try {
            $this->getMailer('User')->send('notification', [filter_var($contract->user->email, FILTER_SANITIZE_EMAIL), $notification->subject, $notification->message]);
            //$this->getMailer('User')->send('notification', ['cyril@3xw.ch', $notification->subject, $notification->message]);

         } catch (Exception $exc) {
             $this->out($exc->getTraceAsString());
         }
         $this->out("Check: ".$contract->label);
      }

      $this->out("Contracts expire in 3 days : ".$contracts->count());
      $this->hr();

   }
}
