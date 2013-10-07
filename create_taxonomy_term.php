<?php
/**
* Create taxonomy term programmatically
*
* @param   int @vid Vocabulary id of the term you want to create
* @param   string @name The taxonomy term name
* @param   string @description Optional description of the taxonomy term
* @return  int @term_tid Returns the id of the taxonomy term you just created
* @author  Elinore Tenorio
* @email   elinore.tenorio@gmail.com
*/

// root directory of drupal installation 
define('DRUPAL_ROOT', getcwd()); 
  
// call bootstrap 
include_once DRUPAL_ROOT . '/includes/bootstrap.inc'; 
  
// bootstrap all of drupal 
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL); 

function createTaxonomyTerm($vid, $name, $description)  
{ 
  $term = new stdClass(); 
  $term->vid = $vid; 
  $term->name = $name; 
  $term->description = $description; 
  $term->format = 'plain_text'; 
  taxonomy_term_save($term); 
  return $term->tid; 
}

$tid = createTaxonomyTerm(1, 'Sample term', 'optional description');

// clear all cache 
cache_clear_all(); 
  
die(); 
?>
