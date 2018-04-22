/* hendelser */


function fokus(element)
{
  element.style.background ="yellow";
}  

function mistetFokus(element)
{
  element.style.background="white";
}  


function musInn(element)
{
  document.getElementById("melding").style.color="blue";	if (element==document.getElementById("klassekode"))
    {
      document.getElementById("melding").innerHTML="Klassekode skal bestå av 3 tegn (2 store bokstaver og 1 siffer)";
    }
     if (element==document.getElementById("klassenavn"))
    {
      document.getElementById("melding").innerHTML="Klassenavn må fylles ut";
    }
     if (element==document.getElementById("brukernavn"))
    {
      document.getElementById("melding").innerHTML="Brukernavn må fylles ut";
    }
    if (element==document.getElementById("fornavn"))
    {
      document.getElementById("melding").innerHTML="Du må fylle ut fornavnet ditt";
    }
    if (element==document.getElementById("etternavn"))
    {
      document.getElementById("melding").innerHTML="Du må fylle ut etternavnet ditt";
    }
}

function musUt()
{
  document.getElementById("melding").innerHTML="";
}  


function fjernMelding()
{
  document.getElementById("melding").innerHTML="";   
}  
    
    

    
    