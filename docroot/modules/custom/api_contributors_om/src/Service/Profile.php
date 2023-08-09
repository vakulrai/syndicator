<?php

namespace Drupal\api_contributors_om\Service;

use Drupal\Component\Serialization\Json;
use GuzzleHttp\ClientInterface;

/**
 * Service to send API requests to drupal.org.
 */
class Profile {


  const DRUPAL_ORG_API_USER_BASE_URL = 'https://www.drupal.org/api-d7/user.json';
  const DRUPAL_ORG_API_NODE_BASE_URL = 'https://www.drupal.org/api-d7/node.json';
  const DRUPAL_ORG_API_COMMENT_BASE_URL = 'https://www.drupal.org/api-d7/comment.json';

  /**
   * DrupalOrgApiManager constructor.
   *
   * @param \GuzzleHttp\ClientInterface $client
   *   HTTP Client Interface.
   */

  protected $client;

  /**
   * Contruct to get http client.
   */
  public function __construct(ClientInterface $client) {
    $this->client = $client;
  }

  /**
   * Sends request to Drupal Org API.
   *
   * @param string $entity_type
   *   The entity type.
   * @param array $filters
   *   The Filters.
   *
   * @return mixed|null
   *   Drupal org API Response.
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function sendRequest(string $entity_type, array $filters): mixed {
    $base_url = $this->getBaseUrl($entity_type);
    $contents = NULL;
    try {
      $response = $this->client->request(
        'GET',
        $base_url,
        [
          'query' => $filters,
        ]
      );

      $contents = Json::decode($response->getBody()->getContents());

    }
    catch (\Exception $error) {
      $error->getMessage();
    }

    return $contents;

  }

  /**
   * Get Drupal Org API URL.
   *
   * @param string $entity_type
   *   The Entity Type.
   *
   * @return string
   *   Drupal Org API Link.
   */
  public function getBaseUrl(string $entity_type): string {
    switch ($entity_type) {
      case 'comment':
        return self::DRUPAL_ORG_API_COMMENT_BASE_URL;

      case 'user':
        return self::DRUPAL_ORG_API_USER_BASE_URL;

      case 'node':
      default:
        return self::DRUPAL_ORG_API_NODE_BASE_URL;
    }
  }

}
