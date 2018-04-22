<?php  /* vis klasseliste */
/*
/*    Programmet lager et html-skjema for å motta en klassekode */
/*   Programmet skriver ut alle registrerte personer som har klassekode som er lik den klassekoden som er mottatt
*/
    include("oblig2_start.html");
?> 

<h3>Klasseliste </h3>

<script src="oblig2_hendelser.js"> </script>
<script src="oblig2_validering.js"> </script> 
        
<form method="post" action=""  id="visKlasselisteSkjema" name="visKlasselisteSkjema">
        
Klassekode: <input type="varchar" id="klassekode" name="klassekode"  required onKeyUp="visStudenter(this.value)" onFocus="fokus(this)"  onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"/> <br />
        
<input type="submit" value="Vis klasseliste" id="visKlasselisteKnapp" name="visKlasselisteKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" onChange="fjernmelding()"/> <br />
        
</form>
<div id="melding"></div>

<?php 
    @$visKlasselisteKnapp=$_POST ["visKlasselisteKnapp"];
    if ($visKlasselisteKnapp)     /* knappen trykket */
        {
            $klassekode=$_POST ["klassekode"];
            $klassekode=trim($klassekode);    /* mellomrom i starten og slutten "trimmet" vekk */


    if (!$klassekode)
{
	print (" Feltet må fylles ut");    /* melding skrevet */

                }
            else
                {
                    $filnavn="D:\\Sites\\home.hbv.no\\phptemp\\111091/student.txt";    /* filnavn angitt */
    $filoperasjon="r";    /* filoperasjon ("r" - for lesing) angitt  */
                
print ("Følgende personer passer til angitt klassekoden <br> <br>");    /* overskrift skrevet ut */

    $fil = fopen($filnavn,$filoperasjon);    /* filen åpnet */

    while ($linje = fgets ($fil))    /* en linje lest fra fil */
        {
            if ($linje != "")     /* linjen lest fra fil er ikke tom */
                {
                    $del = explode (";" , $linje);     /* innholdet av linjen delt opp */
                    $registrertkode=trim($del[3]);     /* koden hentet ut */
                
                    if ($registrertkode==$klassekode)     /* registrert navn er lik mottatt navn */
                       {
                            $brukernavn=trim($del[0]);    /* brukernavn hentet ut */
                            $fornavn=trim($del[1]);    /* fornavn hentet ut */
                            $etternavn=trim($del[2]);    /* etternavn hentet ut */
                            $klassekode=trim($del[3]);    /* klassekode hentet ut  */

print ("$fornavn $etternavn $brukernavn  <br/>");    /* data skrevet ut */						
                        }
            
    }
        
    }

    fclose ($fil);    /* filen lukket */
            }
        
    }
   
    include("oblig2_slutt.html");
?> 
  