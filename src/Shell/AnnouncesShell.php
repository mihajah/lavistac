<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * Announces shell command.
 */
class AnnouncesShell extends Shell
{

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
        $this->out($this->OptionParser->help());
    }


    public function getOnline($nb = 8){
      $this->loadModel('Announces');
      $announces = $this->Announces->find('all',[
         'contain'=>[
            'Contracts'
         ],
         'conditions'=>[
            'Announces.status'=>'ONLINE',
            'Contracts.contract_type_id'=>8
         ],
         'limit'=>$nb
      ]);
      foreach ($announces as $announce) {
          $this->out($announce->title);
          $announce->connected = date('Y-m-d H:i:s');
          $this->Announces->save($announce);
      }
   }
}
