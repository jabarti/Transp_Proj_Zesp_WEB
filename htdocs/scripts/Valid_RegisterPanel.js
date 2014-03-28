/***************************************************
 *  Filename:   Valid_RegisterPanel.js
 * 
 *  Created:    2014-01-11
 * 
 *  @author     Bartosz M. Lewiński <jabarti@wp.pl>
 ***************************************************/
/*
$arrFormContERR = array('PESEL' => '', 
                        'Imie' => '', 
                        'Nazwisko' => '', 
                        'Adres_Ulica' => '',
                        'Adres_Kod' => '',
                        'Adres_Miasto' => '', 
                        'telefon_kom' => '', 
                        'email' => '', 
                        'Plec' => '');
 *
 */


window.onload = 											/*		REJESTRACJA FIRMA	 	*/
function (){
    document.getElementById("Register").onsubmit = function(){
//        alert("Valid_RegisterPanel.js")
        if( czyWypelnione(this.PESEL)    &&
            isValidPESEL(this.PESEL)  &&
            czyWypelnione(this.Imie)    &&
            isMinLength (this.Imie, 3)  &&
            czyWypelnione(this.Nazwisko) &&
            isMinLength (this.Nazwisko, 3) &&
            czyWypelnione(this.Adres_Ulica) &&
            isMinLength (this.Adres_Ulica, 5) &&
            czyWypelnione(this.Adres_Kod) &&
            isValidKod (this.Adres_Kod, 5) &&
            czyWypelnione(this.Adres_Miasto) &&
            isMinLength (this.Adres_Miasto, 3) &&     
            czyWypelnione(this.telefon_kom) &&
            isMinLength (this.telefon_kom, 9)&&
            czyWypelnione(this.email)    &&
            isValidEmail(this.email)

//            czyWypelnione(this.imie)
//            czyWypelnione(this.NIP)	&&
//            hasLength (this.NIP, 10)	&&
//            isValidNIP (this.NIP)	&&
//            isValidREGON (this.REGON)	&&
//            isValidKRS (this.KRS)				
          )
            {
                return true;
            }
            else
            {
//                alert ('error = false - złe wertości textbox');
                return false;
            }
    }
}





