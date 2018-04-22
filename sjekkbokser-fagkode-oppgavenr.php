<?php /* sjekkboks-fagkode-oppgavenr */

/* Programmet lager sjekkbokser for alle registrerte oppgaver */

    include("db-tilkobling.php"); /* tilkobling til serveren og valg av databasen utført*/
    
    $sqlSetning="SELECT * FROM oppgave ORDER BY fagkode, oppgavenr;";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; hente data fra databasen");

    $antallRader=mysqli_num_rows($sqlResultat);
    
    for($r=1; $r<=$antallRader; $r++)
    {
        $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultat */
        $fagkode=$rad["fagkode"];  // Eller $fagkode=$rad[0];
        $oppgavenr=$rad["oppgavenr"]; //Eller $oppgavenr=$rad[1];
        $frist=$rad["frist"]; //Eller $frist=$rad[1];

        print("<input type='checkbox' id='fagkodeoppgavenr' name='fagkodeoppgavenr[]' value='$fagkode $oppgavenr' /> $fagkode - oppgave $oppgavenr <br/> "); //ny sjekkboks laget
    }

?>