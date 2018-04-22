<?php  /*vis-alle-oppgave*/
/*progremmet skriver ut alle registrerte oppgave*/

    include ("start.html");
    include("db-tilkobling.php"); /*tilkobling til database serveren utført og valg av database foretatt*/

    $sqlSetning="SELECT * FROM oppgave ORDER BY fagkode, oppgavenr;";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); /*SQL setning sendt til database serveren*/
    $antallRader=mysqli_num_rows($sqlResultat); /*antall rader i resultatet beregnet*/

    print("<h3>Registrerte oppgaver</h3>"); /*overskrift skrevet ut*/
    print ("<table border=1>"); /*starten til tabellen definert*/
    print("<tr><th align=left>fagkode</th><th align=left>oppgavenr</th><th align=left>frist</th></tr>"); /*overskrift skrevet*/

    for ($r=1; $r<=$antallRader; $r++)
        {
        $rad=mysqli_fetch_array($sqlResultat);  /*ny rad hentet fra spørringsresultatet*/
        $fagkode=$rad["fagkode"];  /*ELLER $fagkode= $rad[0];*/
        $oppgavenr=$rad["oppgavenr"]; /*ELLER $oppgavenr= $rad[1];*/
        $frist=$rad["frist"];/*ELLER $frist= $rad[2];*/
        
        print ("<tr><td>$fagkode</td><td>$oppgavenr</td><td>$frist</td></tr>"); /*ny rad skrevet*/
    }
        print("</table>");  /*slutten på tabellen skrevet*/
    include ("slutt.html");    

?>