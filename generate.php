<?php ob_start(); // cmu non-php fix ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="google-site-verification" content="fX_IfRLujy4NCu7SqvYfOiw6pw9xx1P3D9ZYvMyCR34" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-47047389-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-47047389-1');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Gunnar Atli Sigurdsson</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <link href="style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:50,100,300,400,500' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$_GET['library']=1;
require_once('bibtexbrowser.php');
global $db;
$db = new BibDataBase();
$db->load('gunnarsigurdsson.bib');

function dispRefAll($key) {
global $db;
$query = array('key'=>$key);
$entries=$db->multisearch($query);
uasort($entries, 'compare_bib_entries'); 
foreach ($entries as $bibentry) { 
  echo '<div class="bibitem bibresearch">';
  echo $bibentry->toHTML(); 
  echo '</div>';
}
}
function dispRef($key) {
global $db;
$bibentry = $db->getEntryByKey($key);
echo '<div class="bibitem bibresearch">';
echo $bibentry->toHTML(); 
echo '</div>';
}
?>
  </head> <body onload="loadme()">
  <body>
    <div class="jumbotron">
      <div class="container theheader">
        <div class="col-md-7">
          <h1 class="thinfont">Gunnar Atli Sigurdsson</h1>
          <p>5th year PhD Student, advised by Abhinav Gupta <br/>Robotics Institute, School of Computer Science <br/>Carnegie Mellon University</p>
{myfirstname}@cmu.edu &nbsp;
<a href="http://www.linkedin.com/in/gasigurdsson"> <img style="vertical-align: middle;" src="images/Logo-2C-89px-R.png" width="60" height="15" border="0" alt="LinkedIn Profile" title="LinkedIn Profile"/></a> 
<a href="https://github.com/gsig"> <img style="vertical-align: middle;" src="images/GitHub_Logo.png" width="46" height="20" border="0" alt="GitHub Page" title="GitHub Page"/></a>
<a href="https://scholar.google.com/citations?user=clTKG0QAAAAJ&hl=en"> <img style="vertical-align: middle;" src="images/googlescholar.png" width="20" height="20" border="0" alt="Google Scholar Profile"/ title="Google Scholar Profile"></a> &nbsp;
<a href="https://www.semanticscholar.org/author/Gunnar-A.-Sigurdsson/34280810"> <img style="vertical-align: middle;" src="images/semanticscholar.png" width="26" height="20" border="0" alt="Semantic Scholar Profile" title="Semantic Scholar Profile"/></a>
          <p id="bio">My research focuses on understanding time information in computer vision: human activities, events, and causal reasoning.
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block me" src="images/gunnar.jpg" alt="Gunnar Atli">
        </div>
      </div>
    </div>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="#news">News</a></li>
              <li><a href="#research">Research</a></li>
              <li><a href="#cv">CV</a></li>
              <li><a href="#publications">Publications</a></li>
              <li><a href="#code">Code</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div id="news" class="container">
      <h2>News</h2>
      <ul>
        <li>We are organizing the <a href="http://www.cs.cmu.edu/~gsigurds/cvpr2019tutorial/">Tutorial on Unifying Human Activity Understanding</a> at CVPR 2019.</li>
        <li>We have released <a href="https://github.com/gsig/PyVideoResearch">PyVideoResearch</a>, a repository of video analysis tools, datasets, and tasks.</li>
        <li>I am interning at <a href="https://deepmind.com/">DeepMind</a> summer 2019.</li>
        <li>Our CVPR'18 spotlight presentation is now available <a href="https://youtu.be/O92bGCTxul8?t=4818">https://youtu.be/O92bGCTxul8?t=4818</a></li>
        <li>Invited Talk at <a href="http://michaelryoo.com/cvpr2018tutorial/">CVPR 2018 Tutorial on Human Activity Recognition</a></li>
        <li><a href="http://allenai.org/plato/charades/">The Charades-Ego Dataset has been released!</a> 8000 paired egocentric and third person videos. </li>
        <li><a href="http://arxiv.org/abs/1804.09627">Actor and Observer: Joint Modeling of First and Third-Person Videos</a> will be a spotlight presentation at CVPR'18 in Salt Lake City!</li>
        <li><a href="http://arxiv.org/abs/1708.02696">What Actions are Needed for Understanding Human Actions in Videos?</a> will be presented at ICCV 2017 in Venice.</li>
        <li><a href="http://arxiv.org/abs/1612.06371">Asynchronous Temporal Fields for Action Recognition</a> will be presented at CVPR 2017 in Honolulu.</li>
        <li>We are organizing the <a href="http://vuchallenge.org">Workshop on Visual Understanding Across Modalities</a> at CVPR 2017.</li>
        <li>Our <a href="http://arxiv.org/abs/1607.07429">paper</a> on crowdsourcing exhaustive video annotation was accepted to <a href="http://www.humancomputation.com/2016/">HCOMP2016</a>!</li>
        <li>2 papers accepted to <a href="http://www.eccv2016.org/">ECCV2016</a>!</li>
        <li>We have released our dataset <a href="http://allenai.org/plato/charades/"><i>Charades</i></a>!</li>
        <li>I am interning at <a href="http://allenai.org/">Allen Institute of Artificial Intelligence</a> summer 2016.</li>
        <li>"Interpretable exemplar-based shape classification using constrained sparse linear models", was accepted to SPIE Medical Imaging 2015 for an oral presentation!</li>
      </ul>
    </div> <!-- /container -->

    <nav id="research" class="navbar navbar-inverse sep"> <div class="septext">Research</div> </nav>

    <div class="container">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="images/webteaser.png" alt="missing" title="A visualization of our work on jointly modelling first and third person.">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Unifying Third and First Person</h2>
          <p class="lead">Several theories in cognitive neuroscience suggest that when people interact with the world, or simulate interactions, they do so from a first-person egocentric perspective, and seamlessly transfer knowledge between third-person (observer) and first-person (actor). Despite this, learning such models for human action recognition has not been achievable due to the lack of data. This paper takes a step in this direction, with the introduction of Charades-Ego, a large-scale dataset of paired first-person and third-person videos, involving 112 people, with 4000 paired videos. This enables learning the link between the two, actor and observer perspectives. Thereby, we address one of the biggest bottlenecks facing egocentric vision research, providing a link from first-person to the abundant third-person data on the web. We use this data to learn a joint representation of first and third-person videos, with only weak supervision, and show its effectiveness for transferring knowledge from the third-person to the first-person domain. </p>
<?php
dispRef('sigurdsson2018actor');
dispRef('sigurdsson2018charadesego');
?>
        </div>
      </div>


      <hr>

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Hollywood in Homes / Charades</h2>
          <h4 class="featurette-heading"><a href="http://allenai.org/plato/charades/">allenai.org/plato/charades/</a></h4>
          <p class="lead">Computer vision has a great potential to help our daily lives by searching for lost keys, watering flowers or reminding us to take a pill. To succeed with such tasks, computer vision methods need to be trained from real and diverse examples of our daily dynamic scenes. While most of such scenes are not particularly exciting, they typically do not appear on YouTube, in movies or TV broadcasts. So how do we collect sufficiently many diverse but <i>boring</i> samples representing our lives? We propose a novel Hollywood in Homes approach to collect such data. Instead of shooting videos in the lab, we ensure diversity by distributing and crowdsourcing the whole process of video creation from script writing to video recording and annotation. Following this procedure we collect a new dataset, <i>Charades</i>, with hundreds of people recording videos in their own homes, acting out casual everyday activities. </p>
<?php
dispRef('sigurdsson2017actions');
dispRef('sigurdsson2017asynchronous');
dispRef('sigurdsson2016much');
dispRef('sigurdsson2016hollywood');
?>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="images/wall2b.png" alt="missing" title="Samples from the Charades dataset">
        </div>
      </div>

      <hr>

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="images/storylines.png" alt="missing" title="A visualization of what our algorithm thinks Paris is about">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Learning Visual Storylines</h2>
          <p class="lead">What does a typical visit to Paris look like? In this work, we show how to automatically learn the temporal
aspects, or storylines of visual concepts from web data. Our novel Skipping
Recurrent Neural Network (S-RNN) uses a framework that skips through the images in the photo
stream to explore the space of all ordered subsets of the albums.</p>
<?php
dispRef('sigurdsson2016learning');
?>
        </div>
      </div>

      <hr>

<div id="showmore"> Show More </div>
<div id="more">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Shape Analysis</h2>
          <p class="lead">Image segmentation algorithms commonly return segmentation masks that represent the shape of objects. Particularly, in the medical imaging domain, this shape incorporates information about, for example, the state of the segmented organ. By looking at the shape of an object, in two or three dimensions, it is possible to look for signs of disease.</p>
<?php
dispRef('sigurdsson2015interpretable');
?>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="images/shapes.png" alt="missing" title="Cerebellum Shapes">
        </div>
      </div>

      <hr>

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="images/noisy.jpg" alt="missing" title="Noisy dMRI directions">
          <img class="featurette-image img-responsive center-block" src="images/smooth.jpg" alt="missing" title="Smoothed dMRI directions">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Diffusion MRI processing</h2>
          <p class="lead">Using modern diffusion weighted magnetic resonance imaging protocols, 
the orientations of multiple neuronal fiber tracts within each voxel
can be estimated. Further analysis of these populations, including
application of fiber tracking and tract segmentation methods, is often
hindered by lack of spatial smoothness of the estimated orientations.
For example, a single noisy voxel can cause a fiber tracking method to
switch tracts in a simple crossing tract geometry. In this work, a
generalized spatial smoothing framework that handles multiple
orientations as well as their fractional contributions within each
voxel is proposed.  </p>
<?php
dispRef('sigurdsson2014smoothing');
?>
        </div>
      </div>

      <hr>

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Polysomnography Analysis</h2>
          <p class="lead">The Icelandic biomedical company, <a href="http://www.noxmedical.com/">Nox Medical</a>, provides solutions for sleep monitoring and diagnostics. With portable sleep monitors, there is opportunity to measure large population of people in their own beds. From this data, we are interested in exploring relationships between underlying disease and measurements. We performed statistical analysis on various time-series from the device and looked at the discriminative power of various features for classifying events. Using regression and classification algorithms, such as neural networks, we were able to predict vibration in patients from sounds, and warrant further study of relationships with disease. Our work was incorporated in to the company's software suite, Noxturnal.</p>
<?php
dispRef('arnardottir2015how');
dispRef('arnardottir2014snoring');
?>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="images/nox-medical.jpg" alt="missing" title="Measurement setup for Nox Medical's T3">
        </div>
      </div>

      <hr>

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="images/measurements.png" alt="missing" title="Measurement setup">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Active Radiator</h2>
          <p class="lead">The immense popularity of wireless communications has left the common frequency bands crowded, prompting researchers to utilize available spectrum at ever higher frequencies. At mm-wave frequencies there is pronounced need for novel antenna designs that are tightly integrated with their driving circuitry in order to reduce power losses. A radiator concept for 94 GHz CMOS-technology was reviewed, scaled up, and redesigned to work at 2.4 GHz on a FR-4 printed circuit board, in the interest of testing the concept. The radiator works in similar manner to an array of dipoles, and can connect directly to the last amplifier stage without impedance matching, due to load-pull matched input impedances, accomplishing all of its power combining in the air. 3D full-wave electromagnetic field simulations were performed on all transmission line structures and furthermore, various ways to achieve symmetric power splitting and shorted transmission line stubs with coupled lines were designed and experimented with, in order to achieve acceptable efficiency and radiation pattern of the radiating array. <span class="text-muted">Work with Steven Bowers and Ali Hajimiri at Caltech.</span></p>
        </div>
      </div>
</div> <!-- end show more -->

    </div>

    <nav id="cv" class="navbar navbar-inverse sep"> <div class="septext">CV</div> </nav>

    <div class="container">
      <!-- <a href="SigurdssonCV.pdf"><img style="vertical-align: bottom;" src="images/pdficon_large.png" width="32" height="32" border="0" alt="PDF"/>Download Resume in PDF format.</a> -->
      <p> CV available on request. </p>
    </div>

    <nav id="publications" class="navbar navbar-inverse sep"> <div class="septext">Publications</div> </nav>

    <div class="container">
<?php
$query = array('year'=>'.*');
$entries=$db->multisearch($query);
uasort($entries, 'compare_bib_entries'); 
foreach ($entries as $bibentry) { 
  echo '<div class="bibitem">';
  echo $bibentry->toHTML(); 
  echo '</div>';
}
?>
    </div>

    <nav id="code" class="navbar navbar-inverse sep"> <div class="septext">Code</div> </nav>

    <div class="container">
      <p> Please see my <a href="https://github.com/gsig">GitHub page</a> for released code.
    </div>

    <footer>
      <p>&copy; Gunnar Atli Sigurdsson 2015-</p>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script>
    var more_shown = false;
    function loadme() {
      $("#more").slideUp('fast', function() {});
      $("#showmore").click(function() {
        if(!more_shown) {
          $("#more").slideDown('fast', function() {});
          more_shown = true;
        }
      });
    }
    </script>
  </body>
</html>


<?php
  // cmu doesn't support php, so convert to html 
  $string = ob_get_contents(); ob_end_flush();
  $outfile = fopen('index.html', "w") or die("Unable to open file!");
  fwrite($outfile, $string);
  fclose($outfile);
  ob_flush();
?>
