<?php  /* registrer-klasse */
/*
/*    Programmet lager et html-skjema for å registrere en klasse */
/*   Programmet skriver data (klassekode og klassenavn) til filen "klasse.txt" */
    include("oblig2_start.html");
?> 

<h3>Registrer klasse </h3>

<script type="text/javascript" src="oblig2_hendelser.js"></script>
<script type="text/javascript" src="oblig2_validering.js"> </script> 

<form method="post" action="" onSubmit="return validerRegistrerklasse()"              id="registrerKlasseSkjema" name="registrerKlasseSkjema">

Klassekode: <input type="varchar" id="klassekode" name="klassekode" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"/> <br />
    
Klassenavn: <input type="varchar" id="klassenavn" name="klassenavn" required onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"/> <br />
		
<input type="submit" value="Registrer klasse" id="registrerKlasseKnapp" name="registrerKlasseKnapp" />
        
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" onChange="fjernMelding()"/> <br />
        
</form>
<div id="melding"> </div>

<?php 
    @$registrerKlasseKnapp=$_POST ["registrerKlasseKnapp"];
    if ($registrerKlasseKnapp)     /* knappen for å skrive til fil er trykket */
        {
            $klassekode=$_POST ["klassekode"];
            $klassenavn=$_POST ["klassenavn"]; /* variable gitt verdier fra feltene i HTML-skjemaet */


    if (!$klassekode ||!$klassenavn)
{
	print ("Begge feltene må fylles ut");    /* melding skrevet */

                }
            else
                {
                    $filnavn="D:\\sites\\home.hbv.no\\phptemp\\111091/klasse.txt";
	$filoperasjon="a"; /* filoperasjon ("a" - for tilføying) angitt */

           $linje=$klassekode . ";" . $klassenavn . "\n"; /* linjen som skal skrives til fil opprettet */ 
$fil = fopen($filnavn,$filoperasjon); /* filen åpnet */
fwrite ($fil,$linje); /* en linje skrevet til fil */
fclose ($fil); /* filen lukket */
                
  print ("Klassekoden ($klassekode) og Klassenavn ($klassenavn) er nå registrert på fil"); /* meldingen vist på skjermen når operasjonen er ferdig*/
        }
    }
    
    include("oblig2_slutt.html");
?> 
  