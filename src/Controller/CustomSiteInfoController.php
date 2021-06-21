<?php

namespace Drupal\custom_siteinfo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse as JsonResponseAlias;

/**
 * Class CustomSiteInfoController
 *
 * @package Drupal\custom_siteinfo\Controller
 */

class CustomSiteInfoController extends ControllerBase {

  /**
   * Get Node data in json format.
   *
   * @param string $site_key
   *   Site key parameters.
   *
   * @param null $node
   *   Node parameters.
   *
   * @return JsonResponseAlias
   *   Returns node data in json format.
   */
  public function getNodeData($site_key = '', $node = NULL) {
    $node_data = [];

    $node_data['code'] = '200';
    $node_data['message'] = 'Node is found';
    $node_data['success'] = TRUE;
    $node_data['entity_title'] = $node->label();
    $node_data['entity_body'] = $node->get('body')->getValue()[0]['value'];

    return JsonResponseAlias::create($node_data);
  }


}
