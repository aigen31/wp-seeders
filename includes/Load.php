<?php

namespace WPSeeders;

use WPSeeders\Bootstrap\CLI;
use WPSeeders\Controllers\SettingsController;

class Load
{
  /**
   * Load the plugin
   *
   * @return void
   */
  static public function init(): void
  {
    if (SettingsController::getActiveStatus()) {
      CLI::init();
    }
  }
}
