<?php

namespace Drupal\api_contributors_om\Entity;

use Drupal\api_contributors_om\ContributorsInterface;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the contributors entity class.
 *
 * @ContentEntityType(
 *   id = "contributors",
 *   label = @Translation("Contributors"),
 *   label_collection = @Translation("Contributorss"),
 *   label_singular = @Translation("contributors"),
 *   label_plural = @Translation("contributorss"),
 *   label_count = @PluralTranslation(
 *     singular = "@count contributorss",
 *     plural = "@count contributorss",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\api_contributors_om\ContributorsListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "form" = {
 *       "add" = "Drupal\api_contributors_om\Form\ContributorsForm",
 *       "edit" = "Drupal\api_contributors_om\Form\ContributorsForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "contributors",
 *   admin_permission = "administer contributors",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "id",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "collection" = "/admin/content/contributors",
 *     "add-form" = "/contributors/add",
 *     "canonical" = "/contributors/{contributors}",
 *     "edit-form" = "/contributors/{contributors}/edit",
 *     "delete-form" = "/contributors/{contributors}/delete",
 *   },
 *   field_ui_base_route = "entity.contributors.settings",
 * )
 */
class Contributors extends ContentEntityBase implements ContributorsInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Authored on'))
      ->setDescription(t('The time that the contributors was created.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'timestamp',
        'weight' => 20,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('form', [
        'type' => 'datetime_timestamp',
        'weight' => 20,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the contributors was last edited.'));

    $fields['drupal_org_id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Drupal Org ID'))
      ->setDescription(t('The ID of the Drupal.org organization.'))
      ->setRequired(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'number',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'number_integer',
        'weight' => 0,
      ])
      ->setDisplayConfigurable('view', TRUE);

    // Add Drupal Org Username field.
    $fields['drupal_org_username'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Drupal Org Username'))
      ->setDescription(t('The username of the Drupal.org organization.'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => 1,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => 1,
      ])
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
