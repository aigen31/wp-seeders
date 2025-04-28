<?php

namespace WPSeeders\Controllers;

use Webmozart\Assert\Assert;

class TermsController
{
  /**
   * Create terms in a given taxonomy.
   *
   * @param array $args {
   *     Arguments for creating terms.
   *
   *     @type string $taxonomy The taxonomy to create terms in. Default is 'category'.
   *     @type string $parent The parent term ID. Default is null.
   *     @type array $terms An array of term names to create.
   * }
   */
  static public function create(array $args): void
  {
    Assert::notEmpty($args, 'Arguments array cannot be empty.');
    Assert::keyExists($args, 'terms', 'Terms key is required in arguments array.');

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
