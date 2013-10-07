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
?>
