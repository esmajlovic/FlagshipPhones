
<?php
include 'header.php';
?>
<div class="container2"><article><div id ="SadrzajStranice">


<?php
    /*$novosti = file_get_contents('xmls/News.xml');
    if(strlen($novosti) != 0)
    {
        $sveNovosti = simplexml_load_file('xmls/News.xml');*/
		$id = $_GET["id"];
		$veza = new PDO('mysql:host=localhost;dbname=flagshipphones', 'emina', 'emina123');
	    $veza->exec("set names utf8");
	    $news = $veza->query("select naslov, slika, tekst from news where id = ".$id);
	    if (!$news) {
	          $greska = $veza->errorInfo();
	          print "SQL greška: " . $greska[2];
	          exit();
	     }
	     foreach ($news as $new) {
	         $novost = $new;
	     }
				echo("<div class='velikinaslov'>".htmlspecialchars($novost["naslov"], ENT_QUOTES, 'UTF-8')."</div><div class='vijest'>");
				echo("<center><img src='{$novost["slika"]}' alt='Problem sa prikazivanjem slike'></center>");
				echo("<center><h3>".htmlspecialchars($novost["tekst"], ENT_QUOTES, 'UTF-8')."</h3></center></div>");

	if(isset($_SESSION["admin"])) {
	echo('<div class="mogucnosti"><a href="FPNewsForma.php"><img src="dodaj.png" class="ikoniceadmin" alt="Problem sa prikazivanjem slike"></a>  <a href="FPNewsFormaIzmijeni.php?id='.$id.'"><img src="promijeni.png" class="ikoniceadmin" alt="Problem sa prikazivanjem slike"></a>  <a href="obrisiNovost.php?id='.$id.'"><img src="obrisi.png" class="ikoniceadmin" alt="Problem sa prikazivanjem slike"></a>  </div>');
}
	?>
	
</div></article>
<?php
include 'desno.php';
?>
</div>


<?php
include 'footer.php';
?>