<?php /*via-alle-fag*/

/*Programmet skriver ut alle registrerte fag*/

    include("start.html");

    include("db-tilkobling.php");  /*tilkobling til database-serveren utført og valg av databasen foretatt */

    $sqlSetning="SELECT * FROM fag ORDER BY fagkode;";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
    $antallRader=mysqli_num_rows($sqlResultat); /*antall radar i resultatet beregnet*/

    print ("<h3>Registrerte fag</h3>");//Overskift
    print ("<table border=1>"); /*starten på tabellen definert*/
    print ("<tr><th align=left>fagkode</th><th align=left>fagnavn</th><th align=left>fagl&aelig;rer</th></tr>");/*overskriftsrad skrevet ut*/

    for($r=1; $r<=$antallRader; $r++){
        $rad=mysqli_fetch_array($sqlResultat); /*ny rad hentet fra spøringsresultatet*/
        $fagkode=$rad["fagkode"]; /*Eller $fagkode=$rad[0];*/
        $fagnavn=$rad["fagnavn"]; /*Eller $fagkode=$rad[1];*/
        $faglaerer=$rad["faglaerer"]; /*Eller $faglaerer=$rad[2];*/
        
        print ("<tr><td> $fagkode</td><td>$fagnavn</td><td>$faglaerer</td></tr>"); /*ny rad skrevet*/
    }
    print ("</table>"); /*slutten på tabellen definiert*/

    include("slutt.html");

?>