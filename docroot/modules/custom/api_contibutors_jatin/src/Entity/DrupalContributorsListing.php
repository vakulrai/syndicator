<?php

// namespace Drupal\api_contributors_jatin\Entity;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a class to build a listing of Contributors entities.
 *
 * @ingroup contributors
 */
// class DrupalContributorsListing extends EntityListBuilder {

  /**
   * Constructs a new ContributorsListBuilder object.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   * @param \Drupal\Core\Entity\EntityStorageInterface $storage
   *   The storage.
   */
  // public function __construct(
  //   EntityTypeInterface $entity_type,
  //   EntityStorageInterface $storage,
  // ) {
  //   parent::__construct(
  //     $entity_type,
  //     $storage,
  //   );
  // }

  /**
   * {@inheritdoc}
   */
  // public static function createInstance(ContainerInterface $container, EntityTypeInterface $entity_type) {
  //   return new static(
  //     $entity_type,
  //     $container->get('entity_type.manager')->getStorage($entity_type->id()),
  //     // $container->get('language_manager'),
  //     // $container->get('current_user'),
  //     // $container->get('theme.registry'),
  //     // $container->get('entity_display.repository'),
  //     // $container->get('entity_type.manager')
  //   );
  // }

  /**
   * {@inheritdoc}
   */
  // public function buildHeader() {
  //   $header['id'] = $this->t('ID');
  //   $header['drupal_id'] = $this->t('Drupal.org ID');
  //   $header['drupal_org_username'] = $this->t('Drupal.org Username');
  //   return $header;
  // }

  /**
   * {@inheritdoc}
   */
  // public function buildRow(EntityInterface $entity) {
  //   /** @var \Drupal\api_contributors_om\Entity\ContributorsInterface $entity */
  //   $row['id'] = $entity->id();
  //   $row['drupal_id'] = $entity->getDrupalId();
  //   $row['drupal_org_username'] = $entity->getDrupalOrgUsername();
  //   return $row;
  // }

// }
