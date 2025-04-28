<?php

namespace WPSeeders\Controllers;

use Webmozart\Assert\Assert;
use WPSeeders\Abstracts\AbstractCLIController;

class CLIController extends AbstractCLIController
{
  /**
   * Run the seeders and create the terms
   *
   * @param array $seeders
   * @return void
   */
  static public function run(array $seeders): void
  {
    Assert::notEmpty($seeders, 'Seeders array cannot be empty.');
    foreach ($seeders['terms'] as $seeder) {
      TermsController::create([
        'taxonomy' => $seeder['taxonomy'],
        'parent' => $seeder['parent'],
        'terms' => $seeder['term_list'],
      ]);
    }
  }
}
