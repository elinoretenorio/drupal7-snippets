<?php
/**
* Delete all nodes of a specific content type
*
* @param   string @content_type The content type of the nodes you want to delete
* @author  Elinore Tenorio
* @email   elinore.tenorio@gmail.com
*/

// root directory of drupal installation 
define('DRUPAL_ROOT', getcwd()); 
  
// call bootstrap 
include_once DRUPAL_ROOT . '/includes/bootstrap.inc'; 
  
// bootstrap all of drupal 
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL); 

function deleteNodesByContentType($content_type) {
  $result = db_query("SELECT nid FROM {node} WHERE type = $content_type"); 
  foreach ($result as $record) { 
    $node = node_load($record->nid); 
    node_delete($record->nid); 
    echo 'Deleted node '. $record->nid .' successfully. <br />'; 
  } 
}

// delete all article nodes
deleteNodesByContentType('article');

// clear all cache 
cache_clear_all(); 
  
die(); 
?>
