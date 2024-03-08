<?php

namespace Drupal\api_contributors_jatin\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
// use Drupal\Core\Entity\EntityTypeManagerInterface;
// Drupal\Core\Entity\EntityTypeManagerInterface
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Database\Schema\Schema;

/**
 * Form for adding a new Contributor entity.
 */
class ContributorsDetailsForm extends FormBase {

  /**
   * The messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * The Entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  // protected $entityTypeManager;

  /**
   * Constructs a new ContributorsForm instance.
   *
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger service.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   */
  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
    // $this->entityTypeManager = $entityTypeManager;
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
    // dump($form_state);
    // Form for getting Drupal Org Username and ID from users.
    $form['drupal_org_id'] = [
      '#type' => 'number',
      '#title' => $this->t('Drupal.org ID'),
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
    $schema['contributors'] = [
      'description' => 'Store user case study details',
      'fields' => [
        'id' => [
          'type' => 'serial',
          'not null' => TRUE,
          'description' => 'Primary Key: Unique row ID.',
        ],
        'uid' => [
          'type' => 'int',
          'not null' => TRUE,
          'description' => "User id",
        ],
        'c_end_date' => [
          'description' => 'Case Study end date',
          'type' => 'int',
          'size' => 'normal',
        ],
      ],
      'primary key' => ['id'],
    ];

    if (!Database::getConnection()->schema()->findTables('contributors')) {
      dump('yes');
      // Database::getConnection()->schema()->createTable('contributors', $schema);
      exit;
    }
    else {
      dump('nnooooooo');
      exit;
    }
// dump($this->entityTypeManager->get('contributors'));
    // exit;
    // Create a new entity and set its values from the form submission.

    // $entity = \Drupal::entityTypeManager()
    //   ->getStorage('contributors')
    //   ->create([
    //     'drupal_org_id' => $form_state->getValue('drupal_org_id'),
    //     'drupal_org_username' => $form_state->getValue('drupal_org_username'),
    //   ]);

    // Save the entity to the database.
    // $entity->save();

    // Optionally, display a message to the user upon successful submission.
    // $this->messenger->addMessage($this->t('Contributor added successfully.'));
  }

}
