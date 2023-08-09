<?php

namespace Drupal\api_contributors_om\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the contributors entity edit forms.
 */
class ContributorsForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New contributors %label has been created.', $message_arguments));
        $this->logger('api_contributors_om')->notice('Created new contributors %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The contributors %label has been updated.', $message_arguments));
        $this->logger('api_contributors_om')->notice('Updated contributors %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.contributors.canonical', ['contributors' => $entity->id()]);

    return $result;
  }

}
