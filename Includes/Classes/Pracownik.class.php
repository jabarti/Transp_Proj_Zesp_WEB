<?php
/**
 * Description of Pracownik
 *
 * @author Bartosz Lewiński
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 */
class Pracownik {
    //put your code here
    
    /*
     * unikalne ID w bazie danych
     * @var varchar
    //*/

    
    /*
     * Imię w bazie danych
     * @var varchar
    //*/  
//    INSERT INTO `pracownik`
//    (`ID_Pracownik`, `Stanowisko`, `Pensja`, `data_zatrudnienia`, `data_zwolnienia`, `tel_sluzb`, `mail_sluzb`, `osoba_ID_Osoba`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8]);
    
    protected $_ID_Pracownik;   
    protected $_Stanowisko;
    protected $_Pensja_brutto;
    protected $_data_zatrudnienia;
    protected $_data_zwolnienia;
    protected $_tel_sluzb;
    protected $_mail_sluzb;
    protected $_osoba_ID_Osoba;
    /**//*
   
            
    /**
    * Returns the database table of the Cuser object
    * @return string Allways returns "user".
    */
    public function table() {
	return "Pracownik";
    }
        
   public $PracForm = array('ID_Pracownik', 'Stanowisko', 'Pensja_brutto', 'data_zatrudnienia', 'data_zwolnienia', 'tel_sluzb', 'mail_sluzb', 'osoba_ID_Osoba');
    
//   public function __construct($ID_Osoba=NULL, $PESEL=NULL, $Imie=NULL, $Imie2=NULL, $Nazwisko=NULL, $Adres_Ulica=NULL,$Adres_Kod=NULL,$Adres_Miasto=NULL, 
//                                 $Adres_Kraj=NULL, $telefon_kom=NULL, $telefon_kom2=NULL, $telefon_stacjonarny=NULL,$FAX=NULL, $email=NULL, 
//                                 $Plec=NULL, $Data_urodzenia=NULL, $RegDate=NULL){
       
   public function __construct($PracForm){  
 
        $this->_ID_Pracownik=           $PracForm['ID_Pracownik'];
        $this->_Stanowisko=             $PracForm['Stanowisko'];      
        $this->_Pensja_brutto=          $PracForm['Pensja_brutto']; 			
        $this->_data_zatrudnienia=      $PracForm['data_zatrudnienia'];
        $this->_data_zwolnienia=        $PracForm['data_zwolnienia'];	
        $this->_tel_sluzb=            	$PracForm['tel_sluzb'];			
        $this->_mail_sluzb=             $PracForm['mail_sluzb'];      			
        $this->_osoba_ID_Osoba=         $PracForm['osoba_ID_Osoba'];
           
       if ($this->_ID_Pracownik == null){
           echo '<br>_ID_Pracownik == null';
            $sql = 'SELECT `ID_Pracownik` FROM '.$this->table().' WHERE osoba_ID_Osoba='.$this->_osoba_ID_Osoba.';';
            echo '<br>linia: '.__LINE__.' '.$sql;
            $res = mysql_fetch_array(mysql_query($sql));
            $ID_Pracownik = $res[0];
            echo '<br>This->Id = '.$ID_Pracownik;
      
            if($ID_Pracownik){
                echo '<br>linia: '.__LINE__.' '.'<br>Jest już w bazie!!!';
                
                $this->UpdateData($ID_Pracownik); // TODO
            }else{
                echo '<br>linia: '.__LINE__.' '.'<br>NIE Jest';
                $this->SaveData();
            }
       }else{           // if id_osoba  != null
                echo '<br>==========================<br><b>ID_Pracownik != null</b>';
                $sql = 'SELECT * FROM '.$this->table().' WHERE `ID_Pracownik`='.$this->_ID_Pracownik.';';
                echo '<br>linia: '.__LINE__.' '.$sql;
                $res = mysql_fetch_array(mysql_query($sql));
                
                var_dump($res);
                
                foreach ($res as $key => $value){
                    echo "<br>$key to: $value";
                }/**/
                
                echo '<br>linia: '.__LINE__.' '.$res['Pensja'];
                
                return $res;
           }
      
   } // end __construct();
   
   function SaveData(){
       echo '<br>linia: '.__LINE__.' '.'Wywołana funkcja SaveData()!!';
       
       $sql = 'INSERT INTO `'.$this->table().'`(`Stanowisko`, `Pensja_brutto`, `data_zatrudnienia`, `data_zwolnienia`, `tel_sluzb`, `mail_sluzb`, `osoba_ID_Osoba`) 
                                      VALUES (  

                                            "'.$this->_Stanowisko       .'",      
                                            "'.$this->_Pensja_brutto    .'",           
                                            "'.$this->_data_zatrudnienia.'",
                                            "'.$this->_data_zwolnienia  .'",  
                                            "'.$this->_tel_sluzb        .'",        
                                            "'.$this->_mail_sluzb       .'",       
                                            "'.$this->_osoba_ID_Osoba   .'"
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
