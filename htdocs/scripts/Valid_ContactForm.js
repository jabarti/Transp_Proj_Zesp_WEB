/*******************************************************
 *  Filename:       Valid_ContactForm.js
 * 
 *  Create time:    2014-01-10
 * 
 *  @author         Bartosz M. Lewiński <jabarti@wp.pl>
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 ******************************************************/
window.onload = 											/*		REJESTRACJA FIRMA	 	*/
function (){
    document.getElementById("Contact").onsubmit = function(){
//        alert("Valid_ContactForm.js");
        if( czyWypelnione(this.imie)        &&
            isMinLength (this.imie, 3)      &&
            czyWypelnione(this.nazwisko)    &&
            isMinLength (this.nazwisko, 3)  &&
            czyWypelnione(this.email)       &&
            isValidEmail(this.email)        &&
            czyWypelnione(this.phone)       &&
            isMinLength (this.phone, 9)	
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


