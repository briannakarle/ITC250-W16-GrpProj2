<?php
//index_test1.php
/*
*
*Tests to see if the index page exists
*
*/
include_once 'includes/settings.php';
require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';

class SimpleFormTests extends WebTestCase {

  function testDoesIndexPageExist() {
    $this->get(VIRTUAL_PATH . '../index.php');
    $this->assertResponse(200); 
  }

}

?>