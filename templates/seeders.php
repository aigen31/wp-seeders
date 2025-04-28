<?php

namespace WPSeeders;

class Seeder
{
  /**
   * The list of terms to be created.
   *
   * @var array
   */
  static public function init()
  {
    return [
      'terms' => [
        [
          'taxonomy' => 'category',
          'term_list' => [
            
          ],
          'parent' => 0,
        ]
      ]
    ];
  }
}