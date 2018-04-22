<?php /* slett-flere-oppgaver */

/* Programmet lager et skjema for å velge flere oppgaver 
som skal slettes og slette de valgte oppgavene*/

include ("start.html");

?>

<script src="funksjoner.js"></script>

<h3>Slett flere oppgaver</h3>

<form method="post" action="" id="slettFlereOppgaverSkjema" name="slettFlereOppgaverSkjema" onSubmit="return bekreft()">

Oppgaver:<br/>
    
    <?php   include("sjekkbokser-fagkode-oppgavenr.php"); ?><br/>
    <input type="submit" value="Slett oppgaver" name="slettFlereOppgaverKnapp" id="slettFlereOppgaverKnapp"/>
</form>

<?php
    @$slettFlereOppgaverKnapp=$_POST["slettFlereOppgaverKnapp"];
    if ($slettFlereOppgaverKnapp)
        {
            @$fagkodeoppgavenr=$_POST["fagkodeoppgavenr"];
            $antall=count($fagkodeoppgavenr);
        
            if ($antall==0)
                {
                    print ("Ingen oppgaver ble valgt<br/>");
            }
            else
            {
                for($r=0; $r<$antall; $r++)
                {
                    $del=explode(" ", $fagkodeoppgavenr[$r]);
                    $fagkode=$del[0];
                    $oppgavenr=$del[1];
                    
                    $sqlSetning="DELETE FROM oppgave WHERE fagkode='$fagkode' AND oppgavenr='$oppgavenr';";
                    mysqli_query($db,$sqlSetning) or die("ikke mulig &aring; slette data i databasen");
                }
                print("De valgte oppgavene er n&aring; slettet <br/>");
            }
    }
include("slutt.html");

?>