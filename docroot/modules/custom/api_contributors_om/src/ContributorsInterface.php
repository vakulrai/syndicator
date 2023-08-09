<?php

namespace Drupal\api_contributors_om;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a contributors entity type.
 */
interface ContributorsInterface extends ContentEntityInterface, EntityChangedInterface {

}
