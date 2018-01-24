<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * SlugGeneration shell command.
 */
class SlugGenerationShell extends Shell
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
      $this->loadModel('Posts');
      $posts = $this->Posts->find('all', [

      ]);
      foreach ($posts as $post) {
         $post->modified = time();
         $this->Posts->save($post);
         $this->out($post->slug);
      }

    }
}
