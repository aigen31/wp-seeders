<?php

namespace WPSeeders\Bootstrap;

use Webmozart\Assert\Assert;
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
    Assert::fileExists(WP_SEEDERS_RUN_FILE, 'Seeder file does not exist. Please create it first.');

    require_once WP_SEEDERS_RUN_FILE;

    // Get the seeders from the file
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
    try {
      if (!is_dir(WP_SEEDERS_RUN_PATH)) {
        mkdir(WP_SEEDERS_RUN_PATH, 0775, true);
        chmod(WP_SEEDERS_RUN_PATH, 0775);
      }

      if (file_exists(WP_SEEDERS_RUN_FILE)) {
        throw new \Exception('Seeder file already exists');
      }

      copy(WP_SEEDERS_TEMPLATE_FILE, WP_SEEDERS_RUN_FILE);
      chmod(WP_SEEDERS_RUN_FILE, 0775);
      CLIController::sendCLIMessage('success', 'Seeder file created successfully from template');
    } catch (\Exception $e) {
      CLIController::sendCLIMessage('error', $e->getMessage());
    }
  }
}
