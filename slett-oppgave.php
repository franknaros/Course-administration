<?php  /* slett-oppgave*/

/*  programmet lager et skjema for å velge en oppgave som skal slettes og sletter den*/

    include ("start.html");

?>

<script src="funksjoner.js"></script>

<h3>Slett oppgave</h3>

<form method="post" action="" id="slettOppgaveSkjema" name="slettOppgaveSkjema" onSubmit="return bekreft()">
    Oppgave: <select name='fagkodeoppgavenr' id='fagkodeoppgavenr'>
    <?php include ("listeboks-fagkode-oppgavenr.php"); ?>  
    </select> <br/>
    
    <input type="submit" value="Slett oppgave" name="slettOppgaveKnapp" id="slettOppgaveKnapp" />

</form>

<?php

    @$slettOppgaveKnapp=$_POST["slettOppgaveKnapp"];
    if ($slettOppgaveKnapp)
        {
            $fagkodeoppgavenr=$_POST["fagkodeoppgavenr"];
            $del=explode(" ", $fagkodeoppgavenr);
            $fagkode= $del[0];
            $oppgavenr=$del[1];
            
            $sqlSetning="DELETE FROM oppgave WHERE fagkode='$fagkode' AND oppgavenr='$oppgavenr';";
            mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; slette data i databasen");
        
            print ("F&oslash;lgende oppgave er n&aring; slettet: $fagkode $oppgavenr <br/>");
        }
    include("slutt.html");

?>