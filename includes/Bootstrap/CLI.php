<?php

namespace WPSeeders\Bootstrap;

use WPSeeders\Controllers\CLIController;

class CLI
{
  /**
   * Initialize the CLI commands
   *
   * @return void
   */
  public static function init(): void
  {
    CLIController::addCommand('seeders run', [Commands::class, 'seeders_run']);
    CLIController::addCommand('seeders init', [Commands::class, 'create_seeder_file']);
  }
}
