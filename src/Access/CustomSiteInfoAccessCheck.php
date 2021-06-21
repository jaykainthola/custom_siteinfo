<?php

namespace Drupal\custom_siteinfo\Access;

use Drupal;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\node\NodeInterface;
use Symfony\Component\Routing\Route;

/**
 * Class CustomSiteInfoAccessCheck.
 *
 * @package Drupal\custom_siteinfo\Access
 * .
 */

class CustomSiteInfoAccessCheck implements AccessInterface {

  /**
   * Applies access check.
   *
   * @return string
   *   Return access_check name
   */
  public function appliesTo() {
    return '_siteinfo_access_check';
  }

  /**
   * Check if route has access or not.
   *
   * @param \Symfony\Component\Routing\Route $route
   *   Route parameters.
   * @param $site_key
   *   Site Key parameters.
   * @param \Drupal\node\NodeInterface $node
   *   Node Parameters.
   *
   * @return \Drupal\Core\Access\AccessResultAllowed|\Drupal\Core\Access\AccessResultForbidden
   *   Return Access Denied or allowed if coondition match
   */
  public function access(Route $route, $site_key, NodeInterface $node) {
    return (($site_key == Drupal::config('system.site')
          ->get('siteapikey')) && ($node->getType() == 'page')) ? AccessResult::allowed() : AccessResult::forbidden();

  }
}
