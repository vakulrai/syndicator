<?php

namespace Drupal\api_contibutors_jatin\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * List of all the Contributors.
 */
// class DatabaseTable extends ControllerBase {

//   /**
//    * The database connection.
//    *
//    * @var \Drupal\Core\Database\Connection
//    */
//   protected $database;

//   /**
//    * Constructs a new YourTableController object.
//    *
//    * @param \Drupal\Core\Database\Connection $database
//    *   The database connection.
//    * @param \Drupal\Core\Messenger\MessengerInterface $messenger
//    *   The messenger service.
//    */
//   // public function __construct(Connection $database, MessengerInterface $messenger) {
//   //   // $this->database = $database;
//   //   // $this->messenger = $messenger;
//   // }

//   /**
//    * {@inheritdoc}
//    */
//   // public static function create(ContainerInterface $container) {
//   //   // return new static(
//   //   //   $container->get('database'),
//   //   //   $container->get('messenger')
//   //   // );
//   // }

//   /**
//    * Returns the table content.
//    */
//   // public function contributors() {
//     // Fetch data from the database.
//     // $query = $this->database->select('contributors', 't')
//     //   ->fields('t', ['id', 'drupal_id', 'drupal_username'])
//     //   ->orderBy('id');
//     // $result = $query->execute();

//     // Prepare table rows.
//     // $rows = [];
//     // foreach ($result as $row) {
//     //   $rows[] = [
//     //     'id' => $row->id,
//     //     'drupal_id' => $row->drupal_id,
//     //     'drupal_username' => $row->drupal_username,
//     //   ];
//     // }

//     // Build the table.
//   //   $build = [
//   //     '#theme' => 'contributors',
//   //     '#header' => [
//   //       'ID',
//   //       'Drupal ID',
//   //       'Drupal Username',
//   //     ],
//   //     '#rows' => $rows,
//   //   ];

//   //   return $build;
//   // }

// }
