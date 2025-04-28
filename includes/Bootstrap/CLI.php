<?php

namespace WPSeeders\Bootstrap;

use WPSeeders\Controllers\CLIController;
use WPSeeders\Seeder as WPSeeder;

class CLI
{
  public static function init()
  {
    CLIController::addCommand('seeders', [__CLASS__, 'wp_seeders_run']);
  }

  public static function wp_seeders_run()
  {
    require_once ABSPATH . 'wp-seeders/seeders.php';
    $seeders = WPSeeder::init();
    try {
      CLIController::run($seeders);
      CLIController::sendCLIMessage('success', 'Seeding completed successfully');
    } catch (\Exception $e) {
      CLIController::sendCLIMessage('error', 'Seeding failed: ' . $e->getMessage());
    }
  }
}
