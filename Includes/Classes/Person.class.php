<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author Bartosz Lewiński
 */
class Person
{
   public $name;
   public $surname;
 
   public function setFullName($name, $surname)
   {
      $this->name = $name;
      $this->surname = $surname;
   } // end setFullName();
 
   public function getFullName()
   {
      return $this->name.' '.$this->surname;               
   } // end getFullName();  
}

?>
