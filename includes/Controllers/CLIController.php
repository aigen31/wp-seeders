<?php

namespace WPSeeders\Controllers;

use WP_CLI;

class CLIController
{
  static public function run(array $seeders)
  {
    if (empty($seeders)) {
      throw new \InvalidArgumentException('No seeders found.');
    }
    foreach ($seeders['terms'] as $seeder) {
      TermsController::create([
        'taxonomy' => $seeder['taxonomy'],
        'parent' => $seeder['parent'],
        'terms' => $seeder['term_list'],
      ]);
    }
  }

  static public function sendCLIMessage(string $type, string $message)
  {
    if (defined('WP_CLI')) {
      WP_CLI::$type($message);
    }
  }

  static public function addCommand(string $command, array $callback, array $args = [])
  {
    if (defined('WP_CLI')) {
      try {
        WP_CLI::add_command($command, $callback, $args);
      } catch (\Exception $e) {
        WP_CLI::error('Error adding command: ' . $e->getMessage());
      }
    }
  }

  static public function debug(string $message, string $group)
  {
    if (defined('WP_CLI')) {
      WP_CLI::debug($message, $group);
    }
  }
}
