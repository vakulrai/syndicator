<?php

namespace Drupal\api_contributors_om\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form for adding a new Contributor entity.
 */
class ContributorsForm extends FormBase {


  /**
   * The messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * Constructs a new ContributorsForm instance.
   *
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger service.
   */
  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'contributors_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Add form elements here for the fields you want users to enter.
    $form['drupal_id'] = [
      '#type' => 'number',
      '#title' => $this->t('Drupal ID'),
      '#required' => TRUE,
    ];

    $form['drupal_org_username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Drupal.org Username'),
      '#required' => TRUE,
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Create a new entity and set its values from the form submission.
    $entity = \Drupal::entityTypeManager()
      ->getStorage('contributors')
      ->create([
        'drupal_id' => $form_state->getValue('drupal_id'),
        'drupal_org_username' => $form_state->getValue('drupal_org_username'),
      ]);

    // Save the entity to the database.
    $entity->save();

    // Optionally, display a message to the user upon successful submission.
    $this->messenger->addMessage($this->t('Contributor added successfully.'));
  }

}
