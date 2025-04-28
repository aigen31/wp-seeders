<?php

namespace WPSeeders\Bootstrap;

use WPSeeders\Controllers\CLIController;
use WPSeeders\Seeder;

class Commands
{
  public static function seeders_run()
  {
    require_once ABSPATH . 'wp-seeders/seeders.php';
    $seeders = Seeder::init();
    try {
      CLIController::run($seeders);
      CLIController::sendCLIMessage('success', 'Seeding completed successfully');
    } catch (\Exception $e) {
      CLIController::sendCLIMessage('error', 'Seeding failed: ' . $e->getMessage());
    }
  }
}