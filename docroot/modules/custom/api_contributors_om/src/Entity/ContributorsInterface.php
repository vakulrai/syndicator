<?php

namespace Drupal\api_contributors_om\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\UserInterface;

/**
 * Provides an interface defining a Contributors entity.
 */
interface ContributorsInterface extends ContentEntityInterface {

  /**
   * Gets the Drupal ID.
   *
   * @return int
   *   The Drupal ID.
   */
  public function getDrupalId();

  /**
   * Sets the Drupal ID.
   *
   * @param int $drupal_id
   *   The Drupal ID.
   *
   * @return $this
   */
  public function setDrupalId($drupal_id);

  /**
   * Gets the Drupal.org user name.
   *
   * @return string
   *   The Drupal.org user name.
   */
  public function getDrupalOrgUsername();

  /**
   * Sets the Drupal.org user name.
   *
   * @param string $username
   *   The Drupal.org user name.
   *
   * @return $this
   */
  public function setDrupalOrgUsername($username);

}
