<?php

namespace WPSeeders\Controllers;

class TermsController
{
  static public function create(array $args)
  {
    if (empty($args['terms'])) {
      throw new \InvalidArgumentException('No terms provided for seeding.');
      CLIController::sendCLIMessage('error', 'No terms provided for seeding.');
      return;
    }

    $defaults = [
      'taxonomy' => 'category',
    ];

    $args['taxonomy'] = $args['taxonomy'] ?? $defaults['taxonomy'];
    $args['terms'] = $args['terms'] ?? $defaults['terms'];

    foreach ($args['terms'] as $term) {
      CLIController::debug("Creating term: $term in taxonomy: {$args['taxonomy']}", 'commands');
      if (!term_exists($term, $args['taxonomy'])) {
        wp_insert_term($term, $args['taxonomy'], [
          'parent' => $args['parent'],
        ]);
      } else {
        CLIController::sendCLIMessage('warning', "Term: $term already exists in taxonomy: {$args['taxonomy']}");
      }
    }
  }
}
