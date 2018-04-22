<?php     /* (vis studenter) */
/*
/*    Programmet demonstrerer ajax
*/

  

  @$sokeord=$_GET ["klassekode"];
   
  print ("<table border=0>");  /* starten på tabellen definert */

  $filnavn="D:\\Sites\\home.hbv.no\\phptemp\\111091/student.txt";    /* filnavn angitt */
  $filoperasjon="r";    /* filoperasjon ("r" - for lesing) angitt  */

  $fil = fopen($filnavn,$filoperasjon);    /* filen åpnet */

  while ($linje = fgets ($fil))    /* en linje lest fra fil */
    {
      if ($linje != "")     /* linjen lest fra fil er ikke tom */
        {
          $del = explode (";" , $linje);     /* innholdet av linjen delt opp */
          $brukernavn=trim($del[0]);     /* brukernavn hentet ut */
          $fornavn=trim($del[1]);   /* fornavn hentet ut */
          $etternavn=trim($del[2]);     /* etternavn hentet ut */
          $klassekode=trim($del[3]);     /* klassekode hentet ut */
          
         
          
          $startpos1=stripos($brukernavn,$sokeord);  /* sjekker om sokeord er en del av brukernavn  */
          $startpos2=stripos($fornavn,$sokeord);  /* sjekker om sokeord er en del av fornavn  */
          $startpos3=stripos($etternavn,$sokeord);  /* sjekker om sokeord er en del av etternavn  */
          $startpos4=stripos($klassekode,$sokeord);  /* sjekker om sokeord er en del av klassekode  */

          if ($startpos1!==false || $startpos2!==false || $startpos3!==false|| $startpos4!==false)  
          
        
            {
               print ("<tr> <td> $brukernavn $fornavn $etternavn </td> </tr>");  /* ny rad skrevet */
            }
        }
    }

  fclose ($fil);    /* filen lukket */

  print ("</table>");  /* slutten på tabellen definert */


?>
  