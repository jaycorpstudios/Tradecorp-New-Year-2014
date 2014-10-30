<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Tradecorp wishes you a happy 2015</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 

<!--Facebook Metadata -->
<meta property="og:title" content="Tradecorp wishes you a happy 2015"/>
<meta property="og:url" content="<?= URL_BASE; ?>"/>
<meta property="og:image" content="<?= URL_BASE; ?>imagenes/covers/cover.jpg" />
<meta property="og:description" content="2014 is about to end, and the experiences of the year made us a bit wiser, because it was full of challenges that we overcame together..."/>

<link rel="icon" type="image/png" href="<?= URL_BASE; ?>favicon.png">
<link rel="apple-touch-icon-precomposed" href="<?= URL_BASE; ?>apple-touch-icon-precomposed.png">

<!--Meta Data -->
<meta name="Description" CONTENT="2014 is about to end, and the experiences of the year made us a bit wiser, because it was full of challenges that we overcame together...">
<meta name="Author" content="Jaycorp Studios, jaycorpstudios@me.com">

<link rel="stylesheet" href="<?= URL_BASE; ?>css/normalize.css">
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oswald' type='text/css'>
<link rel="stylesheet" href="<?= URL_BASE; ?>css/style.min.css">

<?
  $files = scandir(FILES_BASE.'imagenes/');
  $listadoDeImagenes = array();
  //obtener solo las imagenes
  function selectImageFiles($extension, $files, $baseDir = ''){
      $images = array();
      foreach ($files as $file) {
          if(strpos($file, $extension)!==false){
              array_push($images, $baseDir.$file);
          }
      }
      return $images;
  }
  $listadoDeImagenes = selectImageFiles('.png', $files);
  $files = scandir(FILES_BASE.'imagenes/personaje/');
  $listadoDeImagenes = array_merge($listadoDeImagenes, selectImageFiles('.png', $files,'personaje/'));
?>

<script type="text/javascript">
    var urlBase = "<?php Base::printUrl(); ?>";
    var listadoDeImagenes = <?php echo json_encode($listadoDeImagenes);?>;
    var lenguaje = "<?php echo $_GET['lenguaje']?>";
    var app = {};
</script>

<?
  echo $listadoDeImagenes;
?>

<!-- Liberias JS Generales -->
<?php
    Base::importarLibreriaPHP('Mobile_Detect');
    Base::importarLiberiaJS("PxLoader");
    Base::importarLiberiaJS("PxLoaderImage");
    Base::importarLiberiaJS("modernizr-2.6.2.min");
    Base::importarLiberiaJS("jquery");
    Base::importarLiberiaJS("skrollr.min");
    Base::importarFuncionesJS('general');
?>



<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-12087474-1', 'auto');
  ga('send', 'pageview');
</script>