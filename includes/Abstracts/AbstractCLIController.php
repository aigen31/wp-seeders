<?php

namespace WPSeeders\Abstracts;

use WP_CLI;

abstract class AbstractCLIController
{
  /**
   * Send a message to the CLI
   *
   * @param string $type type of message (error, warning, success, info)
   * @param string $message message to be displayed
   * @return void
   */
  static public function sendCLIMessage(string $type, string $message): void
  {
    if (defined('WP_CLI')) {
      WP_CLI::$type($message);
    }
  }

  /**
   * Add a command to the WP-CLI
   *
   * @param string $command command name
   * @param array $callback callback function
   * @param array $args additional arguments
   * @return void
   */
  static public function addCommand(string $command, array $callback, array $args = []): void
  {
    if (defined('WP_CLI')) {
      try {
        WP_CLI::add_command($command, $callback, $args);
      } catch (\Exception $e) {
        WP_CLI::error('Error adding command: ' . $e->getMessage());
      }
    }
  }

  /**
   * Debug message to the CLI
   *
   * @param string $message message to be displayed
   * @param string $group group name
   * @return void
   */
  static public function debug(string $message, string $group): void
  {
    if (defined('WP_CLI')) {
      WP_CLI::debug($message, $group);
    }
  }
}
