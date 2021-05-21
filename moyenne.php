<?php

$nbrenotes = (isset($_POST['nbrenotes'])) ? $_POST['nbrenotes'] : 0;
?>
<html>
<h2>Saissisez vos notes et leur coefficient</h2>
</html>

<?php

if($nbrenotes!=0)
 {
   $nbredenotes = 1;
   echo "<form action='moyenne.php' method='post'><br />";
   while ($nbredenotes <= $_POST['nbrenotes'])
       {
          echo "Note : <input type='number' id='form_calculateur_obligatoire_ep_1_u_1' name='note[]' 
                    pattern='\d*' step='0.01' min='1' max='100' aria-describedby='form_calculateur_obligatoire_ep_1_u_1_help' />
          Coeff : <input type='number' id='form_calculateur_obligatoire_ep_1_u_1' name='coeff[]' 
          pattern='\d*' step='0.01' min='0.01' max='100' aria-describedby='form_calculateur_obligatoire_ep_1_u_1_help' /><br />"
          
        ;
          $nbredenotes++;
       }
   echo "<input type='submit' value='Calculer' />";
}

 
$note = (isset($_POST['note'])) ? $_POST['note'] : '';
$coeff = (isset($_POST['coeff'])) ? $_POST['coeff'] : '';
$notetot=0;
$coefftot=0;
$Nbr=sizeof($note);
if($Nbr==1 && $note=="") $Nbr=0;
if($Nbr!=0 && $note!="")
  {
   for ($a=0;$a<$Nbr;$a++)
    {
      $coefftot=$coefftot+$coeff[$a];
      $notetot=$notetot+($note[$a] * $coeff[$a]);
    }

    if($coefftot==0){
        {
            echo "Vous devez correctement saisir les champs ! ";
        }
        
    }
     $moyenne = $notetot / $coefftot;
     echo "Vous avez une moyenne de ".$moyenne;
 
  }

?>
<html>
<br>
    <input type="button" value="Calculer une nouvelle moyenne" onclick="document.location.href='index.php';">
</html>