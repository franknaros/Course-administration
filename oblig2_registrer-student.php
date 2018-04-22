<?php  /* registrer-student */
/*
/*    Programmet lager et html-skjema for å registrere en student
/*    Programmet skriver data (brukernavn, fornavn, etternavn og klassekode) til filen "student.txt"
*/
    include("oblig2_start.html");
?> 

<h3>Registrer student </h3>

<script type="text/javascript" src="oblig2_hendelser.js"> </script>
<script type="text/javascript" src="oblig2_validering.js"> </script> 
    
    <form method="post" action="" onSubmit="return validerRegistrerStudent()"  id="registrerStudentSkjema" name="registrerStudentSkjema">
        
Brukernavn: <input type="varchar" id="brukernavn" name="brukernavn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" onChange="fjernMelding()" /> <br />
        
Fornavn: <input type="varchar" id="fornavn" name="fornavn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"/> <br />
        
Etternavn: <input type="varchar" id="etternavn" name="etternavn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"/> <br />
        
Klassekode: <input type="varchar" id="klassekode" name="klassekode" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" onChange="visStudenter(this.value)"/> <br />
		
<input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" />
        
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" onChange="fjernMelding()"/> <br />
        
</form>
<div id="melding"></div>


<?php 
    @$registrerStudentKnapp=$_POST ["registrerStudentKnapp"];
    if ($registrerStudentKnapp)     /* knappen for å skrive til fil er trykket */
        {
        $brukernavn=$_POST ["brukernavn"];
        $fornavn=$_POST ["fornavn"];
        $etternavn=$_POST ["etternavn"]; /* variable gitt verdier fra feltene i HTML-skjemaet */
        $klassekode=$_POST ["klassekode"];
       

       if (!$brukernavn||!$fornavn ||!$etternavn ||!$klassekode)
                {
                    print ("Alle felt må fylles ut");    /* melding skrevet */

                }
            else
                {
                    $filnavn="D:\\sites\\home.hbv.no\\phptemp\\111091/student.txt";    /* filnavn angitt */
        $filoperasjon="a";    /* filoperasjon ("a" - for tilføying) angitt  */

 $linje=$brukernavn . ";".$fornavn . ";" . $etternavn . ";" . $klassekode ."\n"; /* linjen som skal skrives til fil opprettet */ 
$fil = fopen($filnavn,$filoperasjon); /* filen åpnet */
fwrite ($fil,$linje); /* en linje skrevet til fil */
fclose ($fil); /* filen lukket */

    print ("Følgende oppgave er nå registrert: $brukernavn $fornavn $etternavn $klassekode");    /* melding skrevet */
                }
        }
    include("oblig2_slutt.html");
?> 
  