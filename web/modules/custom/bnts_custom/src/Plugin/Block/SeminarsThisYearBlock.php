<?php

namespace Drupal\bnts_custom\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Seminars This Year Block.
 *
 * @Block(
 *   id = "seminars_this_year_block",
 *   admin_label = @Translation("Custom: Seminars This Year block"),
 * )
 */
class SeminarsThisYearBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    /** @var \Drupal\node\NodeInterface $node */
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      $conference_nid = $node->get('field_conference')->getString();
//      dpm($conference_nid);
      $view_arguments = [$conference_nid];
      $build['seminars_this_year'] = [
        '#type' => 'view',
        '#name' => 'seminars_this_year',
        '#display_id' => 'block_1',
        '#arguments' => $view_arguments,
      ];
    }
    return $build;
  }

}
