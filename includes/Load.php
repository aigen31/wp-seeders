<?php

namespace WPSeeders;

use WPSeeders\Bootstrap\CLI;
use WPSeeders\Controllers\SettingsController;

class Load
{
  static public function init()
  {
    if (SettingsController::getActiveStatus()) {
      CLI::init();
    }
  }
}
