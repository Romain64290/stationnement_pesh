<?php
 //https://openclassrooms.com/forum/sujet/inserer-une-plaque-d-immatriculation-66638
function verifImmatriculation($immatriculation, &$propre = null)
{
    $p = '#^([0-9]+|[a-z]+)(?:\s|-)?([a-z]+|[0-9]+)(?:\s|-)?([a-z]+|[0-9]+)$#i';
    if (preg_match('#^(?(?!ss|ww)[a-hj-np-tv-z]{2})(?:\s|-)?[0-9]{3}(?:\s|-)?(?(?!ss)[a-hj-np-tv-z]{2})$#i', $immatriculation))
    {
        $propre = strtoupper(preg_replace($p, '$1-$2-$3', $immatriculation));
        return true;
    }
    elseif (preg_match('#^[0-9]{1,4}(?:\s|-)?[a-hj-np-tv-z]{2,3}(?:\s|-)?(?:97[1-6]|0[1-9]|[1-8][0-9]|9[1-5]|2[ab])$#i', $immatriculation))
    {
        $propre = strtoupper(preg_replace($p, '$1 $2 $3', $immatriculation));  
        return true;
    }
    else
    {
        return false;
    }
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Immatriculation</title>
  </head>
  <body>
    <form method="post" action="">
      <p>
        <input type="text" name="imm" <?php if (isset($_POST['imm'])) echo 'value="'.htmlentities($_POST['imm']).'"'; ?>/>
        <input type="submit" />
      </p>
    </form>
<?php
if (isset($_POST['imm']))
{
?>
    <p>
      <?php var_dump(verifImmatriculation($_POST['imm'], $propre));
      echo '<br />' . $propre; ?>
    </p>
<?php
}
?>
  </body>
</html> 

