<?php

/* Require the Class */
require '../src/Mongo.php';

/* Get Class instance */
$mongo = MongoAPI::getInstance();

/* Reset collection */
$mongo->collection( 'pirates' )->drop();

/* Select the 'pirates' collection */
$mongo->collection( 'pirates' );

/* Set up datasets as an array of array values */
$datasets = array(
        array( 'name' => 'Black Beard', 'age' => 45, 'bounty' => '$4,000,000' ),
        array( 'name' => 'Long John Silver', 'age' => 51, 'bounty' => '$300,000' ),
        array( 'name' => 'Dread Pirate Roberts', 'age' => 100, 'bounty' => '$20,000,000' )
    );

/* Batch Insert the data into the DB */
$mongo->batchInsert( $datasets );

/* Get the items back */
/* Since the collection resets after every query, we need to define it again */
$mongo->collection( 'pirates' );

/* By calling getRow(), we get back only the first matching row */
$pirates = $mongo->getRow();

/* Print it to page */
echo '<pre>'; 
print_r( $pirates );
echo '</pre>';