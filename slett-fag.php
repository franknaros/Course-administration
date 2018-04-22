<?php  /* slett-fag*/

/*  programmet lager et skjema for å velge et fag som skal slettes og sletter det*/

    include ("start.html");

?>

<script src="funksjoner.js"></script>

<h3>Slett fag</h3>

<form method="post" action="" id="slettFagSkjema"  name="slettFagskjema" onSubmit="return bekreft()">
    Fagkode: 
    <select name='fagkode' id='fagkode'>
    <?php include ("listeboks-fagkode.php"); ?>  
    </select> <br/>
    
    <input type="submit" value="Slett fag" name="slettFagKnapp" id="slettFagKnapp" />

</form>

<?php

    @$slettFagKnapp=$_POST["slettFagKnapp"];
    if ($slettFagKnapp)
        {
            $fagkode=$_POST["fagkode"];
            
            $sqlSetning="DELETE FROM fag WHERE fagkode='$fagkode';";
            mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; slette data i databasen");
        
            print ("F&oslash;lgende fag er n&aring; slettet: $fagkode <br/>");
    }
    include("slutt.html");

?>