<?php
/* listeboks-fagkode */

/* Programmet lager en dynamisk listeboks med fagkode og fagnavn  der fagkode er verdien */

    include ("db-tilkobling.php"); /* tilkobling til databae-serveren og valg av database utført*/

    $sqlSetning="SELECT * FROM fag ORDER BY fagkode;";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("ikkke mulig &aring; hente data fra databasen"); /* SQL setning sendt til database-serveren*/
        
    $antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */

    for ($r=1; $r <=$antallRader; $r++)
    {
        $rad = mysqli_fetch_array($sqlResultat); /* Ny rad hentet fra spørringsresultatet */
        $fagkode=$rad["fagkode"]; /*ELLER $fagkode=$rad[0];*/
        $fagnavn=$rad["fagnavn"]; /*ELLER $fagnavn=$rad[1];*/
        
        print ("<option value='$fagkode'>$fagkode $fagnavn</option>" );
    }

?>