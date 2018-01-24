<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * SlugAnnounces shell command.
 */
class SlugAnnouncesShell extends Shell
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
      $this->loadModel('Announces');
      $announces = $this->Announces->find('all', [

      ]);
      foreach ($announces as $announce) {
         $announce->modified = time();
         $this->Announces->save($announce);
         $this->out($announce->slug);
      }

    }
}
