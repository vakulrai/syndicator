<?php

namespace Drupal\api_contributors_om\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\user\UserInterface;

/**
 * Defines the Contributors entity.
 *
 * @ContentEntityType(
 *   id = "contributors",
 *   label = @Translation("Contributors"),
 *   base_table = "contributors",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *   },
 * )
 */
class Contributors extends ContentEntityBase implements ContributorsInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public function getDrupalId() {
    return $this->get('drupal_id')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setDrupalId($drupal_id) {
    $this->set('drupal_id', $drupal_id);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDrupalOrgUsername() {
    return $this->get('drupal_org_username')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setDrupalOrgUsername($username) {
    $this->set('drupal_org_username', $username);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['drupal_id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Drupal ID'))
      ->setDescription(t('The numeric Drupal ID.'))
      ->setRequired(TRUE)
      ->setReadOnly(TRUE);

    $fields['drupal_org_username'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Drupal.org user name'))
      ->setDescription(t('The Drupal.org user name.'))
      ->setRequired(TRUE);

    return $fields;
  }

}
