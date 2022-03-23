
<?php 
  
    
         $froma = $_GET['from'];
        $toa = $_GET['to'];
        $amounta = $_GET['tran_num'];
        $privateKeya= $_GET['privateKey'];
       // echo $froma; 
       // echo "\n";
       // echo "\n";
       // echo "\n";
       // echo $toa; 
       // echo "\n";
       // echo "\n";
      //  echo "\n";
       // echo $amounta; 
       // echo "\n";
       // echo "\n";
       // echo "\n"; 
     //  echo $privateKeya;
     //$urla = '?from='.$froma.'&to='.$toa.'&privateKey='.$privateKeya;
     //$urlt = '&tran_num='.$amounta;
$ura = '?from='.$froma.'&to='.$toa.'&privateKey='.$privateKeya.'&tran_num='.$amounta;

   header("Location: /api.html".$ura); /* Redirect browser */

?>