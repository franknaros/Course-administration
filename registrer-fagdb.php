<?php /*registrer fag
Programmet lager et html skjema for å registrer et fag. Programmet registrerer fagkode, fagnavn og faglærer i databasen
*/

    include("start.html");

?>

<h3> Registrer fag</h3>

<form method="post" action="" id= "registrerFagSkjema" name="registrerFagSkjema">
    Fagkode: <input type="text" id="fagkode" name="fagkode" required/>
    Fagnavn: <input type="text" id="fagnavn" name="fagnavn" required/>
    Fagl&aelig;rer: <input type="text" id="faglaerer" name="faglaerer" required/>
    <input type="submit" value="Registrer fag" id="registrerFagKnapp" name="registrerFagKnapp"/>
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br/>
</form>

<?php
@$registrerFagKnapp=$_POST ["registrerFagKnapp"];
if ($registrerFagKnapp) /*knappen for å skrive til fil er trykket*/
    {
        $fagkode = $_POST["fagkode"];
        $fagnavn = $_POST["fagnavn"];
        $faglaerer = $_POST["faglaerer"];/*variable gitt verdier fra html skjemaet*/
    if (!$fagkode || !$fagnavn || !$faglaerer)
    {
        print ("Alle felt m&aring; fylles ut");
    }
    else
    {
        include("validering.php");
        $lovligFagkode=validerFagkode($fagkode);
        
        if (!$lovligFagkode) /* Fagkode er ikke korrekt fylt ut */
        {
            print("Fagkode er ikke korrekt fylt ut <br/>");
        }
        else
        {
            
        include ("db-tilkobling.php"); /*tilkobling til database serveren utført og valg av databasen foretatt */
        
        $sqlSetning="SELECT * FROM fag WHERE fagkode='$fagkode';";
        $sqlResultat=mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);
        
    if ($antallRader !=0) /*faget er regisrert fra før*/
        {
            print("Faget er registrert fra f&oslashr");
        }
        else
        {
            $sqlSetning="INSERT INTO fag (fagkode, fagnavn, faglaerer) VALUES('$fagkode', '$fagnavn','$faglaerer');";
            mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
            /*SQL setning sendt til database serveren*/
            
            print("F&oslash;lgende fag er n&aring; registrert: $fagkode $fagnavn $faglaerer");/*melding skrevet */
          }
        }
    }
}
    include("slutt.html");

?>