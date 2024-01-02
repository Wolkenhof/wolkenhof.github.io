<?php

// Uncomment to enable debugging on this script
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$errors = [];

if (isset($_POST['submit'])) {
  $to = "info@wolkenhof.com";
  $from = $_POST['mail'];
  $name = $_POST['name'];
  $website = $_POST['website'];
  $datenschutz = $_POST['datenschutz'];
  $comment = $_POST['comment'];
  $subject = "wolkenhof Kontaktformular: Von " . $name . "";
  $message = '
  <html>
  <head>
    <title>Nachricht von '. $name .'</title>
  </head>
  <body>
    <table style="width: 500px; font-family: arial; font-size: 14px;" border="1">
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">Name:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $name .'</td>
    </tr>
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">E-mail:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $from .'</td>
    </tr>
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">Website:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $website .'</td>
    </tr>
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">Nachricht:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $comment .'</td>
    </tr>
    <tr style="height: 32px;">
      <th align="right" style="width:150px; padding-right:5px;">Datenschutzerklärung:</th>
      <td align="left" style="padding-left:5px; line-height: 20px;">'. $datenschutz .'</td>
    </tr>
    </table>
  </body>
  </html>
  ';
  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  //$headers .= 'From: ' . $from . "\r\n";

  if (empty($name)) {
    $errors[] = "Bitte geben Sie Ihren Namen an.";
  }

  if (empty($from)) {
    $errors[] = "Bitte geben Sie Ihre E-Mail-Adresse an.";
  } else if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Bitte geben Sie eine gültige E-Mail-Adresse an.";
  }

  if (empty($_POST['comment'])) {
    $errors[] = "Bitte geben Sie Ihre Nachricht ein.";
  }

  if ($datenschutz != "gelesen") {
    $errors[] = "Bitte akzeptieren Sie die Datenschutzerklärung.";
  }

  if (empty($errors)) {
    $mail = mail($to, $subject, $message, $headers);
    if ($mail) {
      $errorMessage = "<p style='color: #333; font-size: 14px;'>Vielen Dank, " . $name . "! Wir werden uns in Kürze bei Ihnen melden.</p>";
    } else {
      $errorMessage = "<p style='color: red; font-size: 14px;'>Oops, etwas ist schief gelaufen. Bitte versuchen Sie es später noch einmal.</p>";
    }
  } else {
    $allErrors = join('<br/>', $errors);
    $errorMessage = "<p style='color: red; font-size: 14px;'>{$allErrors}</p>";
  }
}

?>

<!doctype html>
<html lang="de" class="no-js">

<head>
  <title>wolkenhof - Kontakt</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link href="../css/googlefont_roboto.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/fullwidth.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="../css/settings.css" media="screen" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/magnific-popup.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/owl.carousel.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/owl.theme.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/flexslider.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/jquery.bxslider.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/animate.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/responsive.css" media="screen">
  <link rel="apple-touch-icon" sizes="57x57" href="../images/favicons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../images/favicons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../images/favicons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../images/favicons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../images/favicons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../images/favicons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../images/favicons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../images/favicons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../images/favicons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="../images/favicons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../images/favicons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../images/favicons/favicon-16x16.png">
  <link rel="manifest" href="../images/favicons/manifest.json">

  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="images/favicons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.migrate.js"></script>
  <script type="text/javascript" src="../js/jquery.magnific-popup.min.js"></script>
  <script type="text/javascript" src="../js/jquery.flexslider.js"></script>
  <script type="text/javascript" src="../js/bootstrap.js"></script>
  <script type="text/javascript" src="../js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="../js/retina-1.1.0.min.js"></script>
  <script type="text/javascript" src="../js/jquery.bxslider.min.js"></script>
  <script type="text/javascript" src="../js/plugins-scroll.js"></script>

  <script type="text/javascript" src="../js/waypoint.min.js"></script>
  <!--<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>-->
  <script type="text/javascript" src="../js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="../js/jquery.themepunch.revolution.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>
</head>

<body>
  <!-- Main Container -->
  <div id="container" class="boxed">
    <header class="clearfix">
      <div class="navbar navbar-default navbar-fixed-top">

        <!-- Header Contact Informations -->
        <div class="top-line">
          <div class="container">
            <ul class="top-menu" style="float: right;">
              <li><a href="#"><i class="fa fa-clock-o"></i><strong>Mo-Fr</strong> 8-17 Uhr</a></li>
              <br>
              <li><a href="tel:+4958190360"><i class="fa fa-phone"></i><strong>+49 581 9036-0</strong></a>
              </li>
              <br>
              <li><a href="https://get.teamviewer.com/wolkenhof"><i
                    class="fa fa-download"></i><strong>FERNWARTUNG</strong></a></li>
            </ul>
            <ul>
              <a href="../"><img alt="Wolkenhof-Logo" src="../images/Wolkenhof_Logo.png"></a>
            </ul>
          </div>
        </div>

        <!-- Header Menu -->
        <div class="container">
          <div class="navbar-header test">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../"><span></span>Start</a></li>
                <li class="drop"><a href="../#about"><span></span>Wolkenhof</a>
                  <ul class="drop-down">
                    <li><a href="../wolkenhof">Der Wolkenhof</a></li>
                    <li><a href="../wolkenhof/#standorte">Unsere Standorte</a></li>
                    <li><a href="../team">Unser Team</a></li>
                    <li><a href="../netzwerk-partner">Netzwerk &amp; Partner</a></li>
                    <li><a href="../karriere">Jobs &amp; Karriere</a></li>
                  </ul>
                </li>
                <li class="drop"><a href="../#bereiche"><span></span>Leistungen</a>
                  <ul class="drop-down">
                    <li><a href="../greencloud">GREENCLOUD</a></li>
                    <li><a href="../it">IT</a>
                      <ul class="drop-down level3">
                        <li><a href="../it/it-service">IT-Service</a></li>
                        <li><a href="../it/it-consulting">IT-Consulting</a></li>
                        <li><a href="../it/it-sicherheit">IT-Sicherheit</a></li>
                      </ul>
                    </li>
                    <li><a href="/datev/">DATEV</a></li>
                    <li><a href="../office">Office</a>
                      <ul class="drop-down level3">
                        <li><a href="../office/bueroplanung">Büroplanung</a></li>
                        <li><a href="../office/bueroeinrichtung">Büroeinrichtung</a></li>
                        <li><a href="../office/druck-kopie-software">Druck-/Kopiersysteme
                            &amp;
                            Software</a></li>
                        <li><a href="../office/dms">Dokumentenmanagement (DMS)</a></li>
                      </ul>
                    </li>
                    <li><a href="../datenschutzservice">Datenschutzservice</a></li>
                  </ul>
                </li>
                <li class="drop">
                  <a href="#" class="active">
                    <span></span>Kontakt
                  </a>
                  <ul class="drop-down">
                    <li><a href="../kontakt">Kontakt</a></li>
                    <li><a href="../impressum">Impressum</a></li>
                    <li><a href="../datenschutz">Datenschutz</a></li>
                    <li><a href="../agb">AGB</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </header>

    <div id="background-wrap" class="clouds"></div>

    <!-- Content Section -->
    <div id="content">
      <!-- Banner -->
      <div class="services-boxgc pointer">
        <div id="about" class="container" style="height: 30%;">
          <h1 class="page-title" style="margin-top: 15%;"><span>Kontakt</span></h1>
        </div>
      </div>

      <!-- Content -->
      <div class="choose-tempcore">
        <div class="contact-box">
          <div class="title-section">
            <div class="container">
              <h1><span class="wolkenhof blue">wolkenhof</span></h1>
              <h3>Wo Sie uns erreichen können – unsere Standorte</h3>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-md-3 triggerAnimation animated fadeInLeft" data-animate="fadeInLeft">
                  <div class="widget blue">
                    <ul>
                      <li><span class="greencloud">wolkenhof</span> GmbH</li>
                      <li>Hauptgeschäftssitz</li>
                      <li>IT-Abteilung, Greencloud</li>
                      <li><i class="fa fa-home"></i> Schillerstraße 13b</li>
                      <li>29525 Uelzen</li>
                      <li><i class="fa fa-phone"></i> <a href="tel:+4958190360">+49 581 9036-0</a></li>
                      <li><i class="fa fa-envelope"></i> <a
                          href="&#x6d;&#x61;&#x69;&#x6c;&#x74;&#x6f;&colon;&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;">&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-md-3 triggerAnimation animated fadeInLeft" data-animate="fadeInLeft">
                  <div class="widget blue">
                    <ul>
                      <li><span class="greencloud">wolkenhof</span> GmbH</li>
                      <li>Office-Abteilung</li><br>
                      <li><i class="fa fa-home"></i> Klosterstraße 1</li>
                      <li>29525 Uelzen, OT Oldenstadt</li>
                      <li><i class="fa fa-phone"></i> <a href="tel:+4958190360">+49 581 9036-0</a></li>
                      <li><i class="fa fa-envelope"></i> <a
                          href="&#x6d;&#x61;&#x69;&#x6c;&#x74;&#x6f;&colon;&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;">&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3 triggerAnimation animated fadeInLeft" data-animate="fadeInLeft">
                  <div class="widget blue">
                    <ul>
                      <li><span class="greencloud">wolkenhof</span> GmbH</li>
                      <li>Technischer Standort</li><br>
                      <li><i class="fa fa-home"></i> Tempelhofer Weg 10</li>
                      <li>21502 Geesthacht</li>
                      <li><i class="fa fa-phone"></i> <a href="tel:+4958190360">+49 581 9036-0</a></li>
                      <li><i class="fa fa-envelope"></i> <a
                          href="&#x6d;&#x61;&#x69;&#x6c;&#x74;&#x6f;&colon;&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;">&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3 triggerAnimation animated fadeInLeft" data-animate="fadeInLeft">
                  <div class="widget blue">
                    <ul>
                      <li><span class="greencloud">wolkenhof</span> GmbH</li>
                      <li>Standort Bremen</li>
                      <br>
                      <li><i class="fa fa-home"></i> Haferwende 23</li>
                      <li>28357 Bremen</li>
                      <li><i class="fa fa-phone"></i> <a href="tel:+4958190360">+49 581 9036-0</a></li>
                      <li><i class="fa fa-envelope"></i> <a
                          href="&#x6d;&#x61;&#x69;&#x6c;&#x74;&#x6f;&colon;&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;">&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;</a>
                      </li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="portfolio-box with-1-col">
            <div class="container">
              <div class="portfolio-container">
                <div class="project-post">
                  <img id="whmap">
                  <div class="hover-box pt-50">
                    <div class="inner-hover-box-2">
                      <div class="info-link">
                        <p>Durch einen Klick stimmen Sie dem Laden externer Inhalte gemäß unserer&nbsp;<a
                            class="info-link" href="../datenschutz"
                            target="_blank"><strong>Datenschutzerklärung</strong></a> zu.</p>
                        <a href="https://goo.gl/maps/4xyPz45YgMqirXSRA" target="_blank" class="link">Karte öffnen</a>
                      </div>
                      <div class="inner-hover-box-1 hidden-xs">
                        <a href="https://goo.gl/maps/4xyPz45YgMqirXSRA" target="_blank" class="link"><i
                            class="fa fa-map-marker"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="kontaktformular" class="row pt-50">
                  <div class="col-md-6">
                    <div class="contact-info">
                      <h1>Wir freuen uns auf Ihre Anfrage!</h1>
                      <p>Haben wir Ihr Interesse geweckt? Dann nehmen Sie mit uns Kontakt auf. Bitte füllen Sie alle
                        Felder des Kontaktformulars sorgfältig aus und schildern Sie uns Ihr Anliegen. Wir werden uns
                        umgehend melden. Sie können auch einen persönlichen Termin mit unseren kompetenten
                        Ansprechpartner*innen vereinbaren, wenn Sie individuelle Beratung für Ihr Projekt wünschen.</p>
                    </div>
                    <ul class="contact-info-list">
                      <li><i class="fa fa-home"></i> wolkenhof</li>
                      <li><a href="tel:+4958190360"><i class="fa fa-phone"> </i>+49 581 9036-0</a></li>
                      <li><i class="fa fa-envelope"></i><a
                          href="&#x6d;&#x61;&#x69;&#x6c;&#x74;&#x6f;&colon;&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;">&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <form id="contact-form" class="form-inline" method="post" action="">
                      <h3>Senden Sie uns Ihr Anliegen</h3>
                      <div class="text-fields">
                        <div class="float-input">
                          <input name="name" id="name" type="text" placeholder="Name*" required="required">
                          <span><i class="fa fa-user"></i></span>
                        </div>
                        <div class="float-input">
                          <input name="mail" id="mail" type="text" placeholder="E-Mail*" required="required">
                          <span><i class="fa fa-envelope-o"></i></span>
                        </div>
                        <div class="float-input">
                          <input name="website" id="website" type="text" placeholder="Website">
                          <span><i class="fa fa-link"></i></span>
                        </div>
                      </div>
                      <div class="submit-area">
                        <textarea name="comment" id="comment" placeholder="Nachricht"></textarea>
                        <input type="checkbox" name="datenschutz" id="datenschutz" value="gelesen"> <a
                          href="/datenschutz" target="_blank"><strong>Datenschutzerklärung</strong></a> <strong>
                          gelesen</strong><br>
                        <input type="submit" id="submit" name="submit" class="main-button" value="Senden">
                        <?php echo ((!empty($errorMessage)) ? $errorMessage : '') ?>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sponsor Logos -->
      <div class="foerderer">
        <div class="title-section">
          <div class="container">
            <p>Errichtung einer neuen Betriebsstätte:<br>
              Gefördert mit Mitteln des Europäischen Fonds für regionale Entwicklung.</p>
          </div>
        </div>
        <div class="container text-center">
          <img alt="Sponsors" src="../upload/efre-300x144.png">
        </div>
      </div>

      <!-- Get to know -->
      <div class="tempcore-line">
        <div class="container text-center">
          <div class="col-md-10 col-md-offset-1">
            <a href="javascript:linkTo_UnCryptMailto('nbjmup;jogpAxpmlfoipg/dpn');">INFOS</a>
            <p><i class="fa fa-arrow-right"></i><span class="greencloud">wolkenhof</span> kennenlernen.
              <span>Jetzt INFOS anfragen!</span>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Footer -->
    <footer>
      <div class="up-footer">
        <div class="container">
          <div class="row">

            <!-- Main Footer Logo -->
            <div class="col-md-3 triggerAnimation animated fadeInLeft" data-animate="fadeInLeft">
              <div class="widget footer-widgets text-widget">
                <div>
                  <img class="img-responsive" alt="Logo Greencloud" src="../images/Wolkenhof_Logo-weiss.png">
                </div>

              </div>
            </div>

            <!-- Footer Contact Informations -->
            <div class="col-md-3 triggerAnimation animated fadeInLeft" data-animate="fadeInLeft">
              <div class="widget footer-widgets text-widget">
                <ul>
                  <li><span class="greencloud">wolkenhof</span> GmbH</li>
                  <li><i class="fa fa-home"></i> Schillerstraße 13b, 29525 Uelzen</li>
                  <li><a href="tel:+4958190360"><i class="fa fa-phone"></i> +49 581 9036-0</a></li>
                  <li><i class="fa fa-envelope"></i><a
                      href="&#x6d;&#x61;&#x69;&#x6c;&#x74;&#x6f;&colon;&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;">&#x69;&#x6e;&#x66;&#x6f;&commat;&#x77;&#x6f;&#x6c;&#x6b;&#x65;&#x6e;&#x68;&#x6f;&#x66;&period;&#x63;&#x6f;&#x6d;</a>
                  </li>
                </ul>
              </div>
            </div>

            <!-- Main Foot first Menu -->
            <div class="col-md-3 triggerAnimation animated fadeInUp" data-animate="fadeInUp">
              <div class="widget footer-widgets tag-widget">
                <ul class="posts-widget-list">
                  <li> <a href="#top">Start</a></li>
                  <li> <a href="#wolkenhof">Wolkenhof – über uns</a></li>
                  <li> <a href="#bereiche">Leistungen</a></li>
                </ul>
              </div>
            </div>

            <!-- Main Foot second Menu -->
            <div class="col-md-3 triggerAnimation animated fadeInUp" data-animate="fadeInUp">
              <div class="widget footer-widgets tag-widget">
                <ul class="posts-widget-list">
                  <li> <a href="../kontakt">Kontakt</a></li>
                  <li> <a href="../impressum">Impressum</a></li>
                  <li> <a href="../datenschutz">Datenschutz</a></li>
                </ul>
              </div>
            </div>


          </div>
        </div>
      </div>

      <!-- Copyright Footer -->
      <div class="footer-line">
        <div class="container">
          <div class="col-md-12">
            <h5 class="text-center white">© <span id="currentYear"></span> Wolkenhof GmbH. Alle Rechte vorbehalten.</h5>
          </div>
          <script>
            document.getElementById("currentYear").innerText = new Date().getFullYear();
          </script>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>