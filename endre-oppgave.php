<?php    /* endre oppgave */

/* programmet lager et skjema for å velge en oppgave som skal endres */
/* programmet viser oppgaven som er valgt og gir mulighet for endring */
/* programmet endrer det valgte oppgaven */

include("start.html");

?>
<h3>Endre oppgave</h3>


<form method="post" action="" id="finnOppgaveSkjema" name="finnOppgaveSkjema" >
   Oppgave:
    <select name='fagkodeoppgavenr' id='fagkodeoppgavenr'>
        <?php include("listeboks-fagkode-oppgavenr.php"); ?>
    </select><br/>
    <input type="submit" value="Finn oppgave" name="finnOppgaveKnapp" id="finnOppgaveKnapp">
    
</form>

<?php
    @$finnOppgaveKnapp=$_POST["finnOppgaveKnapp"];
    if ($finnOppgaveKnapp)
    {
        $fagkodeoppgavenr=$_POST["fagkodeoppgavenr"]; /* variable gitt verdier fra feltene i html skjemaet */
        $del=explode(" ", $fagkodeoppgavenr);
        $fagkode=$del[0];
        $oppgavenr=$del[1];
        
        $sqlSetning="SELECT * FROM oppgave WHERE  fagkode='$fagkode' AND oppgavenr='$oppgavenr';";
        $sqlResultat=mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; hente data fra databasen");
        
        $antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
        
        if ($antallRader==0){
            print ("Angitt oppgave er ikke registrert<br/>");
        }
        else
        {
            $rad=mysqli_fetch_array($sqlResultat); /* Ny rad hentet fra spørringsresultatet */
            $fagkode=$rad["fagkode"];  /* Eller $fagkode=$rad[0]; */
            $oppgavenr=$rad["oppgavenr"];   /* Eller $fagnavn=$rad[1]; */
            $frist=$rad["frist"]; /* Eller $faglaerer=$rad[2]; */
            
            print ("<form method='post' action='' id='endreOppgaveSkjema' name='endreOppgaveSkjema'>");
            print ("Fagkode <input type='text' value='$fagkode' name='fagkode' id='fagkode' readonly /><br/>");
            print ("Oppgavenr <input type='text' value='$oppgavenr' name='oppgavenr' id='oppgavenr' readonly /><br/>");
            print ("Frist <input type='text' value='$frist' name='frist' id='frist' required /><br/>");
            print ("<input type='submit' value='Endre oppgave' name='endreOppgaveKnapp' id='endreOppgaveKnapp' >");
            print ("</form>");
        }
    }
    
    @$endreOppgaveKnapp=$_POST["endreOppgaveKnapp"];
    if ($endreOppgaveKnapp)
    {
       $fagkode=$_POST["fagkode"];
       $oppgavenr=$_POST["oppgavenr"];
       $frist=$_POST["frist"]; /* Variable gitt verdier fra feltene i html skjemaet */
        
        if (!$fagkode || !$oppgavenr || !$frist)
        {
            print ("Alle felt m&aring; fylles ut");
        }
        else
        {
            $sqlSetning="UPDATE oppgave SET frist='$frist'  WHERE fagkode='$fagkode' AND oppgavenr='$oppgavenr';";
            mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; endre data i databasen ");
            
            print ("Oppgaven med fagkode $fagkode og oppgavenr $oppgavenr er n&aring; endret <br/>");
        }
    }
include("slutt.html");

?>