<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
/** Add the following line in "bibtexbrowser.local.php"
<pre>
define('BIBLIOGRAPHYSTYLE','JanosBibliographyStyle');
</pre>
*/
function GunnarBibliographyStyle(&$bibentry) {
  $title = $bibentry->getTitle();
  $type = $bibentry->getType();

  $entry=array();

  // author
  if ($bibentry->hasField('author')) {
    $entry[] = $bibentry->formattedAuthors();
  }

  // title
  $title = '"'.$title.'"';
  if ($bibentry->hasField('url')) $title = ' <a'.(BIBTEXBROWSER_BIB_IN_NEW_WINDOW?' target="_blank" ':'').' href="'.$bibentry->getField('url').'">'.$title.'</a>';
  $entry[] = $title;


  // now the origin of the publication is in italic
  $booktitle = '';

  if (($type=="misc") && $bibentry->hasField("note")) {
    $booktitle = $bibentry->getField("note");
  }

  if ($type=="inproceedings" && $bibentry->hasField(BOOKTITLE)) {
      $booktitle = 'In '.$bibentry->getField(BOOKTITLE);
  }

  if ($type=="incollection" && $bibentry->hasField(BOOKTITLE)) {
      $booktitle = 'Chapter in '.$bibentry->getField(BOOKTITLE);
  }

  if ($type=="article" && $bibentry->hasField("journal")) {
      $booktitle = 'In '.$bibentry->getField("journal");
  }



  //// ******* EDITOR
  $editor='';
  if ($bibentry->hasField(EDITOR)) {
    $editor = $bibentry->getFormattedEditors();
  }

  if ($booktitle!='') {
    if ($editor!='') $booktitle .=' ('.$editor.')';
    $entry[] = '<i>'.$booktitle.'</i>';
  }


  $publisher='';
  if ($type=="phdthesis") {
      $publisher = 'PhD thesis, '.$bibentry->getField(SCHOOL);
  }

  if ($type=="mastersthesis") {
      $publisher = 'Master\'s thesis, '.$bibentry->getField(SCHOOL);
  }
  if ($type=="techreport") {
      $publisher = 'Technical report';
      if ($bibentry->hasField("number")) {
        $publisher = $bibentry->getField("number");
      }
      $publisher .=', '.$bibentry->getField("institution");
  }
  if ($bibentry->hasField("publisher")) {
    $publisher = $bibentry->getField("publisher");
  }

  if ($publisher!='') $entry[] = $publisher;

  if ($bibentry->hasField('volume')) $entry[] =  "vol. ".$bibentry->getField("volume");
  if ($bibentry->hasField('number')) $entry[] =  'no. '.$bibentry->getField("number");

  if ($bibentry->hasField('address')) $entry[] =  $bibentry->getField("address");

  if ($bibentry->hasField('pages')) $entry[] = str_replace("--", "-", "pp. ".$bibentry->getField("pages"));


  if ($bibentry->hasField(YEAR)) $entry[] = $bibentry->getYear();

  $result = implode(", ",$entry).'.';

  // some comments (e.g. acceptance rate)?
  if ($bibentry->hasField('comment')) {
      $result .=  " <span class=\"bibcomment\">(".$bibentry->getField("comment").")</span>";
  }
  if ($bibentry->hasField('note')) {
      $result .=  " (".$bibentry->getField("note").")";
  }

  // add the Coin URL
  $result .=  "\n".$bibentry->toCoins();

  return $result;
}



function getBibLink(&$bibentry) {
  $links = array();

  $link =  $bibentry->getLink('pdf');
  if ($link != '') { $links[] = '<b>'.$link.'</b> '; };

  //if (BIBTEXBROWSER_BIBTEX_LINKS) {
  //  $link = $bibentry->getBibLink();
  //  if ($link != '') { $links[] = $link; };
  //}
  $key = $bibentry->getKey();
  //$link = $bibentry->toEntryUnformatted();
  $link = $bibentry->getFullText();
  $myfile = fopen('bib/'.$key.'.bib', "w") or die("Unable to open file!");
  fwrite($myfile, $link);
  fclose($myfile);
  $links[] = '<a href="bib/'.$key.'.bib'.'">[bibtex]'.'</a>';

  //if (BIBTEXBROWSER_PDF_LINKS) {
  //  $link = $bibentry->getUrlLink();
  //  if ($link != '') { $links[] = $link; };
  //}

  if (BIBTEXBROWSER_DOI_LINKS) {
    $link = $bibentry->getDoiLink();
    if ($link != '') { $links[] = $link; };
  }

  if (BIBTEXBROWSER_GSID_LINKS) {
    $link = $bibentry->getGSLink();
    if ($link != '') { $links[] = $link; };
  }
  $link =  $bibentry->getLink('slides');
  if ($link != '') { $links[] = $link; };

  $link = $bibentry->getLink('poster');
  if ($link != '') { $links[] = $link; };

  $link =  $bibentry->getLink('code');
  if ($link != '') { $links[] = $link; };

  $link =  $bibentry->getLink('web');
  if ($link != '') { $links[] = $link; };

  return '<span class="bibmenu">'.implode(" ",$links).'</span>';
}
define('BIBTEXBROWSER_LINK_STYLE','getBibLink');
# define('BIBLIOGRAPHYSTYLE','JanosBibliographyStyle');
# @include('IEEEStyleForBibtexbrowser.php');
# define('BIBLIOGRAPHYSTYLE','IEEEStyle');
define('BIBLIOGRAPHYSTYLE','GunnarBibliographyStyle');
define('ABBRV_TYPE','none');
?>
