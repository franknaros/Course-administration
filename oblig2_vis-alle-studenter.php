<?php     /* vis-alle-studenter */
/*
/*    Programmet leser data fra filen "student.txt"
/*    Programmet skriver ut alle registrerte studenter*/
    
include("oblig2_start.html");

    $filnavn="D:\\sites\\home.hbv.no\\phptemp\\111091/student.txt";    /* filnavn angitt */
    $filoperasjon="r";    /* filoperasjon ("r" - for lesing) angitt  */
     print ("<br/> Følgende er studenter som er registrert: <br> <br>");    /* overskrift skrevet ut */

    $fil = fopen($filnavn,$filoperasjon);    /* filen åpnet */

    while ($linje = fgets ($fil))    /* en linje lest fra fil */
        {
            if ($linje != "")     /* linjen lest fra fil er ikke tom */
                {
                    $del = explode (";" , $linje);     /* innholdet av linjen delt opp i fornavn og etternavn */
                $brukernavn=trim($del[0]);     /* brukernavn hentet ut */
                $fornavn=trim($del[1]);     /* fornavn hentet ut */
                $etternavn=trim($del[2]);     /* etternavn hentet ut */
                $klassekode=trim($del[3]);     /* klassekode hentet ut */

      print ("$brukernavn $fornavn $etternavn $klassekode <br />");     /* fagkode, fagnavn og faglærer skrevet ut  */
                }
        }

    fclose ($fil);    /* filen lukket */
    include("oblig2_slutt.html");
?>
  