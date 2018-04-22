<?php  /*registrer oppgave*/
/*Programmet lager et html skjema for å registrere en oppgave. Programmet registrerer data(fagkode, oppgavenr og frist) i databasen*/


    include ("start.html");

?>

<h3>Registrer oppgave</h3>

<form method="post" action="" id="registrerOppgaveSkjema" name="registrerOppgaveSkjema">
    Fagkode: 
    <select id="fagkode" name="fagkode">
        <?php include("listeboks-fagkode.php"); ?>
    </select> 
    
    Oppgavenr: <input type="text" id="oppgavenr" name="oppgavenr" required/>
    Frist: <input type="text" id="frist" name="frist" required/>
    <input type="submit" value="Registrer oppgave" id="registrerOppgaveKnapp" name="registrerOppgaveKnapp"/>
    <input type="reset" value="Nullstill" name="nullstill" /><br/>
           
</form>

<?php
        @$registrerOppgaveKnapp=$_POST["registrerOppgaveKnapp"];
        if ($registrerOppgaveKnapp)  /*knappen til å skrive til fil er trykket*/
        {
            $fagkode=$_POST["fagkode"];
            $oppgavenr=$_POST["oppgavenr"];
            $frist=$_POST["frist"];   /*Variable gitt vaerdier fra feltene i HTML skjemaet*/
            
            if (!$fagkode || !$oppgavenr || !$frist)
            {
                print("Alle felt m&aring; fylles ut"); /*melding skrevet*/
            }
        else
            {
              include("db-tilkobling.php"); /*tilkobling til database serveren  utført og valg av database foretatt*/
                
                $sqlSetning="SELECT * FROM oppgave WHERE fagkode= '$fagkode' AND oppgavenr='$oppgavenr';";
                $sqlResultat=mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
                $antallRader=mysqli_num_rows($sqlResultat);
                
                if ($antallRader !=0)  /*oppgaven er registrert fra før*/
                    {
                        print ("oppgaven er registrert fra f&oslash;r");
                    
                    }
                else
                    {
                        $sqlSetning="SELECT * FROM fag WHERE fagkode='$fagkode';";
                        $sqlResultat=mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; hente data fra databasen");
                        $antallRader=mysqli_num_rows($sqlResultat);
                    
                    if ($antallRader==0) /*faget er ikke registrert i fag-tabellen */
                    {
                        print ("Faget er ikke registrer i fag-tabellen");
                    }
                    else
                    {
                    
                    
                    $sqlSetning="INSERT INTO oppgave (fagkode, oppgavenr, frist) VALUES('$fagkode', '$oppgavenr', '$frist');";
                    mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; registrere data i databasen"); /*SQL-setning sendt til database serveren*/
                    
                    print ("F&oslash;lgende oppgave er n&aring; registrert: $fagkode $oppgavenr $frist");
                    }
                }
                
            }
        }
        
    include("slutt.html");
?>