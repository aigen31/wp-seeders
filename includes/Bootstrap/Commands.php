<?php

namespace WPSeeders\Bootstrap;

use WPSeeders\Controllers\CLIController;
use WPSeeders\Seeder;

class Commands
{
  /**
   * Run the seeders from file
   * 
   * @return void
   */
  public static function seeders_run(): void
  {
    require_once WP_CONTENT_DIR . '/wp-seeders/seeders.php';
    $seeders = Seeder::init();
    try {
      CLIController::run($seeders);
      CLIController::sendCLIMessage('success', 'Seeding completed successfully');
    } catch (\Exception $e) {
      CLIController::sendCLIMessage('error', 'Seeding failed: ' . $e->getMessage());
    }
  }

  public static function create_seeder_file()
  {
    $templateFile = WP_SEEDERS_PATH . '/templates/seeders.php';
    $seederPath = WP_CONTENT_DIR . '/wp-seeders';
    $seederFile = $seederPath . '/seeders.php';

    if (!file_exists($seederFile)) {
      if (file_exists($templateFile)) {
        mkdir($seederPath, 0775, true);
        copy($templateFile, $seederFile);
        CLIController::sendCLIMessage('success', 'Seeder file created successfully from template');
      } else {
        CLIController::sendCLIMessage('error', 'Template file does not exist');
      }
    } else {
      CLIController::sendCLIMessage('error', 'Seeder file already exists');
    }
  }
}
