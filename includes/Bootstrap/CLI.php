<?php

namespace WPSeeders\Bootstrap;

use WPSeeders\Controllers\CLIController;

class CLI
{
  public static function init()
  {
    CLIController::addCommand('seeders', [Commands::class, 'seeders_run']);
  }
}
