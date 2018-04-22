<?php
/* listeboks-fagkode-oppgavenr */

/* Programmet lager en dynamisk listeboks med fagkode og oppgavenr der kombinasjonen av fagkode og oppgave er verdien */

    include ("db-tilkobling.php"); /* tilkobling til databae-serveren og valg av database utført*/
    $sqlSetning="SELECT * FROM oppgave ORDER BY fagkode,oppgavenr;";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("ikkke mulig &aring; hente data fra databasen"); /* SQL setning sendt til database-serveren*/
        
    $antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */

    for ($r=1; $r <=$antallRader; $r++)
    {
        $rad = mysqli_fetch_array($sqlResultat); /* Ny rad hentet fra spørringsresultatet */
        $fagkode=$rad["fagkode"]; /*ELLER $fagkode=$rad[0];*/
        $oppgavenr=$rad["oppgavenr"]; /*ELLER $oppgavenr=$rad[1];*/
        
        print ("<option value='$fagkode $oppgavenr'>$fagkode $oppgavenr</option>" ); /* Ny verdi i listeboksen laget */
    }

?>