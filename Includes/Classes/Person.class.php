<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author Bartosz Lewiński
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
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
