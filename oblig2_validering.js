/* validering */

function validerKlassekode(klassekode)
{
/*
/*  Hensikt
/*    Funksjonen sjekker om klassekode er korrekt er fylt ut
/*  Parametre 
/*    klassekode = klassekode som skal sjekkes
/*  Funksjonsverdi/Returverdi
/*    Funksjonen returnerer true hvis feltet er korrekt fylt ut
/*    Funksjonen returnerer false ellers
*/
  
  var tegn = new Array(3);
  var lovligKlassekode=true;
  
  if (!klassekode)  /* klassekode er ikke fylt ut */
    {
      lovligKlassekode=false;
    }
  else if (klassekode.length!=3)  /* klassekode består ikke av 3 tegn */
    {
      lovligKlassekode=false;
    }
  else 
    {
      tegn1=klassekode.substr(0,1);  /* første tegn i klassekoden */
    tegn2=klassekode.substr(1,1);  /* andre tegn i klassekoden */
    tegn3=klassekode.substr(2,1);  /* tredje tegn i klassekoden */

    if (tegn1 < "A" || tegn1 > "Z" || tegn2 < "A" || tegn2 > "Z" || tegn3 < "1" || tegn3 > "9")  /* minst ett av tegnene er ulovlig */
      {
        lovligKlassekode=false;
      }
   }
      return lovligKlassekode;
}






  function validerRegistrerStudent()
{
/*
/*  Hensikt
/*    Funksjonen sjekker om feltene i skjemaet er korrekt fylt ut
/*  Funksjonsverdi/Returverdi
/*    Funksjonen returnerer true hvis feltene er korrekt er fylt ut
/*    Funksjonen returnerer false ellers
*/
    
    
 var brukernavn = document.getElementById("brukernavn").value;
 var fornavn = document.getElementById("fornavn").value;
 var etternavn = document.getElementById("etternavn").value; 
 var klassekode = document.getElementById("klassekode").value;

  var lovligKlassekode = validerKlassekode(klassekode);

  var feilmelding="";

  if (!lovligKlassekode)  /* klassekode er ikke korrekt fylt ut */
    {
        feilmelding="Klassekode er ikke korrekt fylt ut <br />";
    }
  if (!brukernavn)  /* brukernavn er ikke fylt ut */
    {
        feilmelding=feilmelding + "Brukernavn er ikke fylt ut <br />";
    }
  if (!fornavn)  /* fornavn er ikke fylt ut */
    {
        feilmelding=feilmelding + "Fornavn er ikke fylt ut <br />";
    }
    
  if (!etternavn)  /* etternavn er ikke fylt ut */
    {
        feilmelding=feilmelding + "Etternavn er ikke fylt ut <br />";
    }

  if (lovligKlassekode && fornavn && etternavn && brukernavn  )  /* alle felt er korrekt fylt ut */
    {
        return true;
    }
  else
    {
        document.getElementById("melding").style.color="red";	
        document.getElementById("melding").innerHTML=feilmelding;	
        return false;
    }	
} 


function validerRegistrerklasse()
{
/*
/*  Hensikt
/*    Funksjonen sjekker om feltene i skjemaet er korrekt fylt ut
/*  Funksjonsverdi/Returverdi
/*    Funksjonen returnerer true hvis feltene er korrekt er fylt ut
/*    Funksjonen returnerer false ellers
*/
  var klassekode=document.getElementById("klassekode").value;
  var klassenavn=document.getElementById("klassenavn").value;
  
  var lovligKlassekode=validerKlassekode(klassekode);
  
  var feilmelding="";

  if (!lovligKlassekode)  /* klassekode er ikke korrekt fylt ut */
    {
        feilmelding="Klassekode er ikke korrekt fylt ut <br />";
    }
  if (!klassenavn)  /* klassenavn er ikke korrekt fylt ut */
    {
        feilmelding=feilmelding + "Klassenavn er ikke korrekt fylt ut <br />";
    }
  
  if (lovligKlassekode && klassenavn )  /* alle felt er korrekt fylt ut */
    {
        return true;
    }
  else
    {
        document.getElementById("melding").style.color="red";	
        document.getElementById("melding").innerHTML=feilmelding;	
        return false;
    }	
} 



function validerVisklasseliste()
{
/*
/*  Hensikt
/*    Funksjonen sjekker om feltene i skjemaet er korrekt fylt ut
/*  Funksjonsverdi/Returverdi
/*    Funksjonen returnerer true hvis feltene er korrekt er fylt ut
/*    Funksjonen returnerer false ellers
*/
  var klassekode=document.getElementById("klassekode").value;
 
  
  var lovligKlassekode=validerKlassekode(klassekode);
  
  var feilmelding="";

  if (!lovligKlassekode)  /* klassekode er ikke korrekt fylt ut */
    {
        feilmelding="Klassekode er ikke korrekt fylt ut <br />";
    }
  
  if (lovligKlassekode)  /* feltet er korrekt fylt ut */
    {
        return true;
    }
  else
    {
        document.getElementById("melding").style.color="red";	
        document.getElementById("melding").innerHTML=feilmelding;	
        return false;
    }	
} 


function fjernMelding()
{
  document.getElementById("melding").innerHTML="";   
}  


function visStudenter(klassekode)
{
  var foresporsel=new XMLHttpRequest();  /* oppretter request-objekt */
  
  foresporsel.onreadystatechange=function() 
    {
      if (foresporsel.readyState==4 && foresporsel.status==200)  /* responsen er fullført og vellykket */
        {
          document.getElementById("melding").innerHTML=foresporsel.responseText;  /* responsteksten legges i meldingsfeltet */
        }
    }

  foresporsel.open("GET","oblig2_vis-studenter.php?klassekode="+klassekode);  /* angir metode og URL */
  foresporsel.send();  /* sender en request */
 }
