<?php

class controll2 {

public static function createOptions($rezult,$val,$name,$active) {

  $i = -1;
while( $f =  $rezult->fetch(PDO::FETCH_ASSOC))
{
  if($i == -1) {print("<option value=\"0\" selected='selected'>Выберите из списка...</option>");}
  // else
  {



  print("<option value=\"".$f[$val]."\" style='width:400px;'");
    if($active==$f[$val]) echo "selected";
      echo (">". $f[$name]."</option>");
  }
  $i++;
  }
  }

 public function jj($rezult,$name,$active) {
for($i = -1; $i<count($rezult->fetchAll()); $i++)
{
  if($i == -1) {print("<option value=\"0\" selected='selected'>Выберите из списка...</option>");}
  else
  {
  $f =  $rs->fetch(PDO::FETCH_ASSOC)($rezult);


  print("<option value=\"".$f[$val]."\" style='width:400px;'");
    if($active==$f[$val]) echo "selected";
      echo (">". $f[$name]."</option>");
  }
  }
  }



}


 ?>
