<?php
namespace App\Shell\Task;

use Cake\Console\Shell;

/**
 * CheckContracts shell task.
 */
class CheckContractsTask extends Shell
{

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
      $this->loadModel('Contracts');
      $contracts = $this->Contracts->find('all');
      foreach ($contracts as $contract) {
          $this->out($contract->label);
      }

    }
}
