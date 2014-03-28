<?php

/*
 * osoba.class.php
 */

/*
 * Description of osoba
 * @author Bartek Lewiński
 //*/
class Osoba { //extends Obiekt{

    /*
     * unikalne ID w bazie danych
     * @var varchar
    //*/

    
    /*
     * Imię w bazie danych
     * @var varchar
    //*/  
    protected $_ID_Osoba;   
    protected $_PESEL;
    protected $_Imie;
    protected $_Imie2;
    protected $_Nazwisko;
    protected $_Adres_Ulica;
    protected $_Adres_Kod;
    protected $_Adres_Miasto;
    protected $_Adres_Kraj;
    protected $_telefon_kom;
    protected $_telefon_kom2;
    protected $_telefon_stacjonarny;
    protected $_FAX;
    protected $_email;
    protected $_Plec;
    protected $_Data_urodzenia;
    protected $_RegDate;
    /**//*
    public $ID_Osoba;   
    public $PESEL;
    public $Imie;
    public $Imie2;
    public $Nazwisko;
    public $Adres_Ulica;
    public $Adres_Kod;
    public $Adres_Miasto;
    public $Adres_Kraj;
    public $telefon_kom;
    public $telefon_kom2;
    public $telefon_stacjonarny;
    public $FAX;
    public $email;
    public $Plec;
    public $Data_urodzenia;
            
    /**
    * Returns the database table of the Cuser object
    * @return string Allways returns "user".
    */
    public function table() {
	return "osoba";
    }
    
   // public $Osoba_pola = array();
   // public $fields = array('PESEL', 'Imie', 'Imie2', 'Nazwisko', 'Adres_Ulica','Adres_Kod','Adres_Miasto', 'Adres_Kraj', 'telefon_kom', 'telefon_kom2', 'telefon_stacjonarny','FAX', 'email', 'Plec', 'Data_urodzenia');
    /**/
    		/*$this->PESEL,$this->Imie,$this->Imie2,$this->Nazwisko,$this->Adres_Ulica,$this->Adres_Kod,$this->Adres_Miasto,$this->Adres_Kraj,
		$this->telefon_kom,$this->telefon_kom2,$this->telefon stacjonarny,$this->FAX,$this->email,$this->Plec,$this->Data_urodzenia, $this->RegDate*/
    /*
     * konstruktor klasy osoba
     * @param	Integer	id			
    //*/
//    public function __construct(){
//   protected $_OsForm = array($_PESEL, $_Imie, $_Imie2,$_Nazwisko,$_Adres_Ulica,$_Adres_Kod,$_Adres_Miasto,$_Adres_Kraj,$_telefon_kom,$_telefon_kom2,$_telefon stacjonarny,$_FAX,$_email,$_Plec,$_Data_urodzenia, $_RegDate);
     
   public $OsForm = array('ID_Osoba', 'PESEL', 'Imie', 'Imie2', 'Nazwisko', 'Adres_Ulica','Adres_Kod','Adres_Miasto', 
      'Adres_Kraj', 'telefon_kom', 'telefon_kom2', 'telefon_stacjonarny','FAX', 'email', 
      'Plec', 'Data_urodzenia','RegDate');
    
//   public function __construct($ID_Osoba=NULL, $PESEL=NULL, $Imie=NULL, $Imie2=NULL, $Nazwisko=NULL, $Adres_Ulica=NULL,$Adres_Kod=NULL,$Adres_Miasto=NULL, 
//                                 $Adres_Kraj=NULL, $telefon_kom=NULL, $telefon_kom2=NULL, $telefon_stacjonarny=NULL,$FAX=NULL, $email=NULL, 
//                                 $Plec=NULL, $Data_urodzenia=NULL, $RegDate=NULL){
       
   public function __construct($OsForm){
//       var_dump($OsForm);
//       echo '<br>$OsForm[\'PESEL\']: '.$OsForm['RegDate'];
       
 
        $this->_ID_Osoba=               $OsForm['ID_Osoba'];   
        $this->_PESEL=                  $OsForm['PESEL'];		//PESEL; 
        $this->_Imie=                   $OsForm['Imie'];		//Imie; 				
        $this->_Imie2=                  $OsForm['Imie2'];		//Imie2; 				
        $this->_Nazwisko=               $OsForm['Nazwisko'];		//Nazwisko; 		
        $this->_Adres_Ulica=            $OsForm['Adres_Ulica'];		//Adres_Ulica; 	
        $this->_Adres_Kod=              $OsForm['Adres_Kod'];		//Adres_Kod; 		
        $this->_Adres_Miasto=           $OsForm['Adres_Miasto'];		//Adres_Miasto; 
        $this->_Adres_Kraj=             $OsForm['Adres_Kraj'];		//Adres_Kraj; 	
        $this->_telefon_kom=            $OsForm['telefon_kom'];		//telefon_kom; 	
        $this->_telefon_kom2=           $OsForm['telefon_kom2'];		//telefon_kom2; 
        $this->_telefon_stacjonarny=    $OsForm['telefon_stacjonarny'];		//telefon_stacjonarny; 	
        $this->_FAX=                    $OsForm['FAX'];                 //FAX; 		
        $this->_email=                  $OsForm['email'];		//email; 			
        $this->_Plec=                   $OsForm['Plec'];		//Plec; 				
        $this->_Data_urodzenia=         $OsForm['Data_urodzenia'];		//Data_urodzenia; 
        $this->_RegDate=                $OsForm['RegDate'];		//RegDate;
           
       if ($this->_ID_Osoba == null){
           echo '<br>ID_Osoba == null';
            $sql = 'SELECT `ID_Osoba`, `Nazwisko` FROM '.$this->table().' WHERE PESEL='.$this->_PESEL.';';
            echo '<br>linia: '.__LINE__.' '.$sql;
            $res = mysql_fetch_array(mysql_query($sql));
            $ID_Osoba = $res[0];
            echo '<br>This->Id = '.$ID_Osoba;
      
            if($ID_Osoba){
                echo '<br>linia: '.__LINE__.' '.'<br>Jest już w bazie!!!';
                
                $this->UpdateData($ID_Osoba); // TODO
            }else{
                echo '<br>linia: '.__LINE__.' '.'<br>NIE Jest';
                $this->SaveData();
            }
       }else{           // if id_osoba  != null
                echo '<br>==========================<br><b>ID_Osoba != null</b>';
                $sql = 'SELECT * FROM '.$this->table().' WHERE `ID_Osoba`='.$this->_ID_Osoba.';';
                echo '<br>linia: '.__LINE__.' '.$sql;
                $res = mysql_fetch_array(mysql_query($sql));
                
                var_dump($res);
                
                foreach ($res as $key => $value){
                    echo "<br>$key to: $value";
                }/**/
                
                echo '<br>linia: '.__LINE__.' '.$res['Imie'];
                
                return $res;
           }
      
   } // end __construct();
   
   function SaveData(){
       echo '<br>linia: '.__LINE__.' '.'Wywołana funkcja SaveData()!!';
       
       $sql = 'INSERT INTO `'.$this->table().'`(`PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, 
                                      `Adres_Kraj`, `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, 
                                      `Plec`, `Data_urodzenia`, `RegDate`) 
                                      VALUES (  
                                        "'.$this->_PESEL.'", 
                                        "'.$this->_Imie.'",  				
                                        "'.$this->_Imie2.'", 				
                                        "'.$this->_Nazwisko.'", 		
                                        "'.$this->_Adres_Ulica.'", 	
                                        "'.$this->_Adres_Kod.'", 		
                                        "'.$this->_Adres_Miasto.'", 
                                        "'.$this->_Adres_Kraj.'", 	
                                        "'.$this->_telefon_kom.'", 	
                                        "'.$this->_telefon_kom2.'",  
                                        "'.$this->_telefon_stacjonarny.'", 	
                                        "'.$this->_FAX.'", 		
                                        "'.$this->_email.'", 			
                                        "'.$this->_Plec.'", 				
                                        "'.$this->_Data_urodzenia.'",
                                        "'.$this->_RegDate.'"
                                        )'.';';
                echo '<br>linia: '.__LINE__.' '.$sql;
                mysql_query($sql) or die('<br>linia: '.__LINE__.' '.'NIe wykonany sql!!!');
       
   }

   function UpdateData($ID_Osoba){ 
       echo '<br>linia: '.__LINE__.' '.'Wywołana funkcja UpdateData()';
       $sql = 'UPDATE '.$this->table().' SET 
                `Imie`=                 "'.$this->_Imie.'",  				
                `Imie2`=                "'.$this->_Imie2.'", 				
                `Nazwisko`=             "'.$this->_Nazwisko.'", 		
                `Adres_Ulica`=          "'.$this->_Adres_Ulica.'", 	
                `Adres_Kod`=            "'.$this->_Adres_Kod.'", 		
                `Adres_Miasto`=         "'.$this->_Adres_Miasto.'", 
                `Adres_Kraj`=           "'.$this->_Adres_Kraj.'", 	
                `telefon_kom`=          "'.$this->_telefon_kom.'", 	
                `telefon_kom2`=         "'.$this->_telefon_kom2.'",  
                `telefon stacjonarny`=  "'.$this->_telefon_stacjonarny.'", 	
                `FAX`=                  "'.$this->_FAX.'", 		
                `email`=                "'.$this->_email.'", 			
                `Plec`=                 "'.$this->_Plec.'", 				
                `Data_urodzenia`=       "'.$this->_Data_urodzenia.'"
              WHERE `ID_Osoba` = '.$ID_Osoba.';';
       
                echo '<br>linia: '.__LINE__.' '.$sql;/**/
                mysql_query($sql) or die('<br>linia: '.__LINE__.' '.'NIe wykonany sql!!!');
   }

   public function GetOsobaById($ID_Osoba){
        $this->_ID_Osoba = $ID_Osoba;
		if ($ID_Osoba) {
                        $sql = 'SELECT * FROM '.$this->table().' WHERE `ID_Osoba`='.$id_osoba;
                        echo 'linia: '.__LINE__.' '.$sql;
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
                        
                        mysql_free_result($result);
                        if ($row) {
                                $this->_ustawArtybut($row);
                        } else {
                                $this->id = 0;
                        }
                        
                        return $row;
		}
    }
    
    public function _save() {           // to właściwie szablon do stworzenia save na podst 
    	//global $db;
        foreach ($this->fields as $field) {
          $set[] = $field . "='" . str_replace("?","&#63;",$this->$field) . "'";
        }
        $query = "INSERT INTO ";
        if ($this->id) {
            $query = "UPDATE ";
        }
        $query .= $this->table() . " SET " . join(',', $set);
        if ($this->id) {
            $query .= " WHERE id=$this->id";
        }
        //print("$query<br>"); exit;
        try {
        	$sth = $db->prepare($query);
        	if (!$sth) {
        		print_r($db->errorInfo());
        		return false;
        	}
        	$sth->execute();
	        if (!$this->id) {
	            $this->id = $db->lastInsertId();
	        }
        }
        catch (PDOException $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
        return true;
    }
    
    public function getImie(){
        return $this->imie = $row[3];
    }
    
    
    //public function setData( $this->PESEL, $this->Imie, $this->Imie2, $this->Nazwisko, $this->Adres_Ulica, $this->Adres_Kod, $this->Adres_Miasto, $this->Adres_Kraj, $this->telefon_kom, $this->telefon_kom2, $this->telefon_stacjonarny, $this->FAX, $this->email, $this->Plec, $this->Data_urodzenia)
    public function setData( $PESEL ,$Imie=null, $Imie2=null, $Nazwisko=null, $Adres_Ulica=null,$Adres_Kod=null,$Adres_Miasto=null, $Adres_Kraj=null, $telefon_kom=null, $telefon_kom2=null, $telefon_stacjonarny=null,$FAX=null, $email=null, $Plec=null, $Data_urodzenia=null)
                {
                /*$ID_Osoba = $this->ID_Osoba;*/
                $PESEL = $this->PESEL;
                $Imie = $this->Imie;
                $Imie2 = $this->Imie2;
                $Nazwisko = $this->Nazwisko;
                $Adres_Ulica = $this->Adres_Ulica;
                $Adres_Kod = $this->Adres_Kod;
                $Adres_Miasto = $this->Adres_Miasto;
                $Adres_Kraj = $this->Adres_Kraj;
                $telefon_kom = $this->telefon_kom;
                $telefon_kom2 = $this->telefon_kom2;
                $telefon_stacjonarny = $this->telefon_stacjonarny;
                $FAX = $this->FAX;
                $email = $this->email;
                $Plec = $this->Plec;
                $Data_urodzenia = $this->Data_urodzenia;   
                $RegDate = $this-RegDate;   
                
                
                $sql1 = mysql_real_escape_string('SELECT * FROM '.$this->table().' WHERE PESEL='.$PESEL.'');
                echo '<br>Oto ten SQL1 z osoba.class: '.$sql1.'<br>';
                $res =  mysql_fetch_array(mysql_query($sql1));
                var_dump($res);
                
                if( !$res[0]){
                    //`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`, `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, `Plec`, `Data_urodzenia`)
                    
                    $sql2 = 'INSERT INTO `osoba`(`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`,
                    `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`, `telefon_kom`, `telefon_kom2`, `telefon_stacjonarny`,
                    `FAX`, `email`, `Plec`, `Data_urodzenia`, `RegDate`) 
                            VALUES ("",
                                    "'.$this->PESEL.'",
                                    "'.$this->Imie.'",
                                    "'.$this->Imie2.'",
                                    "'.$this->Nazwisko.'",
                                    "'.$this->Adres_Ulica.'",
                                    "'.$this->Adres_Kod.'",
                                    "'.$this->Adres_Miasto.'",
                                    "'.$this->Adres_Kraj.'",
                                    "'.$this->telefon_kom.'",
                                    "'.$this->telefon_kom2.'",
                                    "'.$this->telefon_stacjonarny.'",
                                    "'.$this->FAX.'", 
                                    "'.$this->email.'",
                                    "'.$this->Plec.'",
                                    "'.$this->Data_urodzenia.'",
                                    "'.$this->RegDate.'"
                                        
                                    )';
                    echo '<br>Oto ten SQL2 z osoba.class: '.$sql2.'<br>';
                    $mres = mysql_real_escape_string($sql2);
                    mysql_query($mres) or die ('zapytanie nie wykonane');
                } else {
                    echo 'Jest już w BD taka osoba';
                }
	}
        
        
        public function getId() {
                echo '$this->PESEL:'.$this->_PESEL;
//		$query = mysql_real_escape_string('SELECT * FROM '.$this->table().' WHERE PESEL='.$this->_PESEL.';');
		$query = mysql_real_escape_string('SELECT `ID_Osoba` FROM '.$this->table().' WHERE PESEL='.$this->_PESEL.';');
                echo '<br>'.$query.'<br>';
//                $res =  mysql_fetch_array(mysql_query($query));
                $res =  mysql_result(mysql_query($query),0);
//                var_dump($res);
                return $this->ID_Osoba = $res;
	}
    
    
    function _ustawArtybut(&$row)
    {
	foreach ($row as $key => $value)
		$this->$key = $value;
    }
    
}

?>
