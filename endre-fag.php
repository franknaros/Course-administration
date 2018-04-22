<?php    /* endre fag */

/* programmet lager et skjema for å velge et fag som skal endres */
/* programmet viser faget som er valgt og gir mulighet for endring */
/* programmet endrer det valgte faget */

include("start.html");

?>
<h3>Endre fag</h3>


<form method="Post" action="" id="finnFagSkjema" name="finnFagSkjema" >
    Fagkode:
    <select name='fagkode' id='fagkode'>
        <?php include("listeboks-fagkode.php"); ?>
    </select><br/>
    <input type="submit" value="Finn fag" name="finnFagKnapp" id="finnFagKnapp">
    
</form>

<?php
    @$finnFagKnapp=$_POST["finnFagKnapp"];
    if ($finnFagKnapp)
    {
        $fagkode=$_POST["fagkode"]; /* variable gitt verdier fra feltene i html skjemaet */
        
        $sqlSetning="SELECT * FROM fag WHERE  fagkode='$fagkode';";
        $sqlResultat=mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; hente data fra databasen");
        
        $antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
        
        if ($antallRader==0){
            print ("Angitt fag er ikke registrert<br/>");
        }
        else
        {
            $rad=mysqli_fetch_array($sqlResultat); /* Ny rad hentet fra spørringsresultatet */
            $fagkode=$rad["fagkode"];  /* Eller $fagkode=$rad[0]; */
            $fagnavn=$rad["fagnavn"];   /* Eller $fagnavn=$rad[1]; */
            $faglaerer=$rad["faglaerer"]; /* Eller $faglaerer=$rad[2]; */
            
            print ("<form method='post' action='' id='endreFagSkjema' name='endreFagSkjema'> ");
            print ("Fagkode <input type='text' value='$fagkode' name='fagkode' id='fagkode' readonly /><br/>");
            print ("Fagnavn <input type='text' value='$fagnavn' name='fagnavn' id='fagnavn' required /><br/>");
            print ("Fagl&aelig;rer <input type='text' value='$faglaerer' name='faglaerer' id='faglaerer' required /><br/>");
            print ("<input type='submit' value='Endre fag' name='endreFagKnapp' id='endreFagKnapp' >");
            print ("</form>");
        }
    }
    
    @$endreFagKnapp=$_POST["endreFagKnapp"];
    if ($endreFagKnapp)
    {
       $fagkode=$_POST["fagkode"];
       $fagnavn=$_POST["fagnavn"];
       $faglaerer=$_POST["faglaerer"]; /* Variable gitt verdier fra feltene i html skjemaet */
        
        if (!$fagkode || !$fagnavn || !$faglaerer)
        {
            print ("Alle felt m&aring; fylles ut");
        }
        else
        {
            $sqlSetning="UPDATE fag SET fagnavn='$fagnavn', faglaerer='$faglaerer' WHERE fagkode='$fagkode';";
            mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; endre data i databasen ");
            
            print ("Faget med fagkode $fagkode er n&aring; endret <br/>");
        }
    }
include("slutt.html");

?>