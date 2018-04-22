<?php     /* vis-alle-klasse */
/*
/*    Programmet leser data (klassekode, klassenavn) fra filen "klasse.txt"
/*    Programmet skriver ut alle registrerte klasser 
*/
    include("oblig2_start.html");

    $filnavn="D:\\sites\\home.hbv.no\\phptemp\\111091/klasse.txt";    /* filnavn angitt */
    $filoperasjon="r";    /* filoperasjon ("r" - for lesing) angitt  */
	
    print ("<br/> Følgende er alle klassene som er registrert: <br> <br>");    /* overskrift skrevet ut */

    $fil = fopen($filnavn,$filoperasjon);    /* filen åpnet */

    while ($linje = fgets ($fil))    /* en linje lest fra fil */
        {
            if ($linje != "")     /* linjen lest fra fil er ikke tom */
                {
                    $del = explode (";" , $linje);     /* innholdet av linjen delt opp i klassekode og klassenavn */
                $klassekode=trim($del[0]);     /* klassekode hentet ut */
                $klassenavn=trim($del[1]);     /* klassenavn hentet ut */
                
      print ("$klassekode $klassenavn <br />");     /* klassekode, klassenavn skrevet ut  */
                }
        }

    fclose ($fil);    /* filen lukket */
    include("oblig2_slutt.html");
?>
  