<?php
/**
* Delete all comments of a specific node
*
* @param   int @nid The node id of the comments you want to delete
* @author  Elinore Tenorio
* @email   elinore.tenorio@gmail.com
*/

// root directory of drupal installation
define('DRUPAL_ROOT', getcwd());
 
// call bootstrap
include_once DRUPAL_ROOT . '/includes/bootstrap.inc';
 
// bootstrap all of drupal
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
 
function comment_node_delete($node_id) {
  $node = node_load($node_id);
  $cids = db_query('SELECT cid FROM {comment} WHERE nid = :nid', array(':nid' => $node->nid));
  comment_delete_multiple($cids);
  db_delete('node_comment_statistics')
    ->condition('nid', $node->nid)
    ->execute();
}

// delete all comments of node 1 
comment_node_delete(1);
 
// clear all cache
cache_clear_all();

die();
?>
