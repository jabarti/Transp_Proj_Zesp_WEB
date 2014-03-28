/***************************************************
 *  Filename:   Valid_MakeLoginPanel.js.js
 * 
 *  Created:    2014-01-14
 * 
 *  @author     Bartosz M. Lewiński <jabarti@wp.pl>
 *  commit       e6f329a919e0bf91cd35513d51722adfedeb18c0  fixing1
 *  Date:        Fri Mar 28 23:42:59 2014 +0100
 ***************************************************/
window.onload = 											/*		REJESTRACJA FIRMA	 	*/
function (){
    document.getElementById("MakeLogin").onsubmit = function(){
//        alert("Valid_MakeLogin.js");
        if(     czyWypelnione(this.uzytkownik)
            &&  isMinLength (this.uzytkownik, 4)                                // should be more then 8 
            &&  czyWypelnione(this.haslo1)
//            &&  isMinLength (this.haslo1, 5)
//            &&  czyWypelnione(this.haslo2)
            &&  isMinLength (this.haslo2, 5)
            &&  isValidPassword(this.haslo2)
            &&  isMinLength(this.haslo3, 5)
            &&  isValidPassword (this.haslo3)  
            &&  arePasswordEqual (this.haslo1, this.haslo2, this.haslo3)	
          ) 
            {
//                alert ('error = true');
                return true;
            }
            else
            {
//                alert ('error = false - złe wertości textbox');
                return false;
            }
    }
}


