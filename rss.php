<?php 
require_once("./admin/core/actionsSite.php");
if ($initSetup == True) { 

   header('Location: ./admin');
   exit; 

} else {

   $blogPost = BloGoFront\Front::RSS();

   function clrAll($str) {
      $str=str_replace("&","&",$str);
      $str=str_replace('"','"',$str);
      $str=str_replace("'","'",$str);
      $str=str_replace(">",">",$str);
      $str=str_replace("<","<",$str);
      return $str;
   }
      //creo cabeceras desde PHP para decir que devuelvo un XML
      header("Content-type: text/xml");
      echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
      echo '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd">';
      echo "<channel>\n";
      echo "<title>".$blogPost['data'][0]['sitio']."</title>";
      echo "<link>".$blogPost['data'][0]['url']."</link>";
      echo "<description>".$blogPost['data'][0]['desc']."</description>";
      echo "<language>es-es</language>";
      echo "<copyright>".$blogPost['data'][0]['sitio']."</copyright>\n";


      //tengo que crear la entrada RSS en un item
      for ($i=0; $i < count($blogPost['post']) ; $i++) { 
         $titulo=clrAll($blogPost['post'][$i]['title']);         
         $desc=clrAll($blogPost['post'][$i]['prologo']);
         echo "<item>\n";
         echo "<title>$titulo</title>\n";
         echo "<description>$desc</description>\n";
         echo "<link>".$blogPost['data'][0]['url']."/publicacion?id=".$blogPost['post'][$i]['_id']."</link>\n";
         echo "<pubDate>". date ( "r" ,strtotime($blogPost['post'][0]['date'])  )."</pubDate>\n";
         echo "</item>\n";
      }
      echo "</channel>";
   echo "</rss>";

} ?>