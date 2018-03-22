
<?php

include("header.php");

if (isset($_POST['valider'])) {

  $uti_id = $_SESSION['uti_id'];


  if (isset($_POST['niv_comp0'])) {
    $niv_comp0 = $_POST['niv_comp0'];
  } else {
    $niv_comp0 = 0;
  }

  if (isset($_POST['niv_comp1'])) {
    $niv_comp1 = $_POST['niv_comp1'];
  } else {
      $niv_comp1=0;
  }

  if (isset($_POST['niv_comp2'])) {
    $niv_comp2 = $_POST['niv_comp1'];
  } else {
      $niv_comp2=0;
  }

  if (isset($_POST['niv_comp3'])) {
    $niv_comp3 = $_POST['niv_comp1'];
  } else {
      $niv_comp3=0;
  }

  if (isset($_POST['niv_comp4'])) {
    $niv_comp4 = $_POST['niv_comp4'];
  } else {
      $niv_comp4=0;
  }

  if (isset($_POST['niv_comp5'])) {
    $niv_comp5 = $_POST['niv_comp5'];
  } else {
      $niv_comp5=0;
  }

  if (isset($_POST['niv_comp6'])) {
    $niv_comp6 = $_POST['niv_comp6'];
  } else {
      $niv_comp6=0;
  }

  if (isset($_POST['niv_comp7'])) {
    $niv_comp7 = $_POST['niv_comp7'];
  } else {
      $niv_comp7=0;
  }

  if (isset($_POST['niv_comp8'])) {
    $niv_comp8 = $_POST['niv_comp8'];
  } else {
      $niv_comp8=0;
  }

  if (isset($_POST['niv_comp9'])) {
    $niv_comp9 = $_POST['niv_comp9'];
  } else {
      $niv_comp9=0;
  }

  if (isset($_POST['niv_comp10'])) {
    $niv_comp10 = $_POST['niv_comp10'];
  } else {
      $niv_comp10=0;
  }

  if (isset($_POST['niv_comp11'])) {
    $niv_comp11 = $_POST['niv_comp11'];
  } else {
      $niv_comp11=0;
  }

  if (isset($_POST['niv_comp12'])) {
    $niv_comp12 = $_POST['niv_comp12'];
  } else {
      $niv_comp12=0;
  }

  if (isset($_POST['niv_comp13'])) {
    $niv_comp13 = $_POST['niv_comp13'];
  } else {
      $niv_comp13=0;
  }

  if (isset($_POST['niv_comp14'])) {
    $niv_comp14 = $_POST['niv_comp14'];
  } else {
      $niv_comp14=0;
  }

  if (isset($_POST['niv_comp15'])) {
    $niv_comp15 = $_POST['niv_comp15'];
  } else {
      $niv_comp15=0;
  }

  if (isset($_POST['niv_comp16'])) {
    $niv_comp16 = $_POST['niv_comp16'];
  } else {
      $niv_comp16=0;
  }

  if (isset($_POST['niv_comp17'])) {
    $niv_comp17 = $_POST['niv_comp17'];
  } else {
      $niv_comp17=0;
  }

  if (isset($_POST['niv_comp18'])) {
    $niv_comp18 = $_POST['niv_comp18'];
  } else {
      $niv_comp18=0;
  }

  if (isset($_POST['niv_comp19'])) {
    $niv_comp19 = $_POST['niv_comp19'];
  } else {
      $niv_comp19=0;
  }

  if (isset($_POST['niv_comp20'])) {
    $niv_comp20 = $_POST['niv_comp20'];
  } else {
      $niv_comp20=0;
  }

  if (isset($_POST['niv_comp21'])) {
    $niv_comp21 = $_POST['niv_comp21'];
  } else {
      $niv_comp21=0;
  }

  if (isset($_POST['niv_comp22'])) {
    $niv_comp22 = $_POST['niv_comp22'];
  } else {
      $niv_comp22=0;
  }



    $id_comp_hc = $_POST['id_comp_hc'];
    $id_comp_php = $_POST['id_comp_php'];
    $id_comp_js = $_POST['id_comp_js'];
    $id_comp_bdd = $_POST['id_comp_bdd'];
    $id_comp_ccpp = $_POST['id_comp_ccpp'];
    $id_comp_csh = $_POST['id_comp_csh'];
    $id_comp_py = $_POST['id_comp_py'];
    $id_comp_bat = $_POST['id_comp_bat'];
    $id_comp_perl = $_POST['id_comp_perl'];
    $id_comp_ruby = $_POST['id_comp_ruby'];
    $id_comp_vb = $_POST['id_comp_vb'];
    $id_comp_jsf = $_POST['id_comp_jsf'];
    $id_comp_phpf = $_POST['id_comp_phpf'];
    $id_comp_linux = $_POST['id_comp_linux'];
    $id_comp_win = $_POST['id_comp_win'];
    $id_comp_appmobile = $_POST['id_comp_appmobile'];
    $id_comp_ang = $_POST['id_comp_ang'];
    $id_comp_fran = $_POST['id_comp_fran'];
    $id_comp_maths = $_POST['id_comp_maths'];
    $id_comp_algo = $_POST['id_comp_algo'];
    $id_comp_res = $_POST['id_comp_res'];
    $id_comp_mag = $_POST['id_comp_mag'];
    $id_comp_eco = $_POST['id_comp_eco'];



    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_hc, $niv_comp0));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_php, $niv_comp1));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_js, $niv_comp2));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_bdd, $niv_comp3));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_ccpp, $niv_comp4));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_csh, $niv_comp5));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_py, $niv_comp6));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_bat, $niv_comp7));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_perl, $niv_comp8));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_ruby, $niv_comp9));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_vb, $niv_comp10));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_jsf, $niv_comp11));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_phpf, $niv_comp12));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_linux, $niv_comp13));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_win, $niv_comp14));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_appmobile, $niv_comp15));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_ang, $niv_comp16));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_fran, $niv_comp17));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_maths, $niv_comp18));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_algo, $niv_comp19));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_res, $niv_comp20));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_mag, $niv_comp21));

    $req_inser0 = $bdd -> prepare("INSERT INTO AFFECTER(uti_id, comp_id, niv_competence) VALUES(?, ?, ?)");
    $req_inser0 -> execute(array($uti_id, $id_comp_eco, $niv_comp22));

  }


?>

<link rel="stylesheet" href="css/competences.css">

    <form method="POST">
<div class="container">
  <h2 class="faire">Veuillez saisir votre niveau dans les domaines suivants puis valider.</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
    <!-- Indicators -->


    <!-- Wrapper for slides -->
      <div class="carousel-inner">

      <div class="item active">
        <!--html -css  -->
        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
            <div class="icon-circle">
              <img class="logos" src="images/logos/html_css.png" alt="html_css.png">
            </div>
            <h2>HTML & CSS</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp0" id="st1" value="1" />
            <input type="hidden" name="id_comp_hc" value="13"/>
            <label for="st1"></label>
            <input type="checkbox" name="niv_comp0" id="st2" value="2" />
            <input type="hidden" name="id_comp_hc" value="13"/>
            <label for="st2"></label>
            <input type="checkbox" name="niv_comp0" id="st3" value="3" />
            <input type="hidden" name="id_comp_hc" value="13"/>
            <label for="st3"></label>
            <input type="checkbox" name="niv_comp0" id="st4" value="4" />
            <input type="hidden" name="id_comp_hc" value="13"/>
            <label for="st4"></label>
            <input type="checkbox" name="niv_comp0" id="st5" value="5" />
            <input type="hidden" name="id_comp_hc" value="13"/>
            <label for="st5"></label>
          </div>

        </div>


      <!--php  -->
      	<div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image ">
          <div class="fh5co-main-service">
            <div class="icon-circle">
              <img class="logos" src="images/logos/php.png" alt="php.png">
            </div>
            <h2>PHP</h2>
        </div>
        <div class="wrapper">
          <input type="checkbox" name="niv_comp1" id="st1-1" value="1" />
          <input type="hidden" name="id_comp_php" value="20"/>
          <label for="st1-1"></label>
          <input type="checkbox" name="niv_comp1" id="st2-1" value="2" />
          <input type="hidden" name="id_comp_php" value="20"/>
          <label for="st2-1"></label>
          <input type="checkbox" name="niv_comp1" id="st3-1" value="3" />
          <input type="hidden" name="id_comp_php" value="20"/>
          <label for="st3-1"></label>
          <input type="checkbox" name="niv_comp1" id="st4-1" value="4" />
          <input type="hidden" name="id_comp_php" value="20"/>
          <label for="st4-1"></label>
          <input type="checkbox" name="niv_comp1" id="st5-1" value="5" />
          <input type="hidden" name="id_comp_php" value="20"/>
          <label for="st5-1"></label>
        </div>
      </div>




      <!--java script-->
      <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
        <div class="fh5co-main-service">
            <div class="icon-circle">
              <img class="logos" src="images/logos/javascript.png" alt="js.png">
            </div>
            <h2>Javascript</h2>
        </div>
        <div class="wrapper">
          <input type="checkbox" name="niv_comp2" id="st1-2" value="1" />
          <input type="hidden" name="id_comp_js" value="15"/>
          <label for="st1-2"></label>
          <input type="checkbox" name="niv_comp2" id="st2-2" value="2" />
          <input type="hidden" name="id_comp_js" value="15"/>
          <label for="st2-2"></label>
          <input type="checkbox" name="niv_comp2" id="st3-2" value="3" />
          <input type="hidden" name="id_comp_js" value="15"/>
          <label for="st3-2"></label>
          <input type="checkbox" name="niv_comp2" id="st4-2" value="4" />
          <input type="hidden" name="id_comp_js" value="15"/>
          <label for="st4-2"></label>
          <input type="checkbox" name="niv_comp2" id="st5-2" value="5" />
          <input type="hidden" name="id_comp_js" value="15"/>
          <label for="st5-2"></label>
        </div>
      </div>


      <!--BDD-->
      <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
				<div class="fh5co-main-service">
						<div class="icon-circle">
							<img class="logos" src="images/logos/bdd.png" alt="bdd.png">
						</div>
						<h2>Base de données</h2>
				</div>
        <div class="wrapper">
          <input type="checkbox" name="niv_comp3" id="st1-3" value="1" />
          <input type="hidden" name="id_comp_bdd" value="6"/>
          <label for="st1-3"></label>
          <input type="checkbox" name="niv_comp3" id="st2-3" value="2" />
          <input type="hidden" name="id_comp_bdd" value="6"/>
          <label for="st2-3"></label>
          <input type="checkbox" name="niv_comp3" id="st3-3" value="3" />
          <input type="hidden" name="id_comp_bdd" value="6"/>
          <label for="st3-3"></label>
          <input type="checkbox" name="niv_comp3" id="st4-3" value="4" />
          <input type="hidden" name="id_comp_bdd" value="6"/>
          <label for="st4-3"></label>
          <input type="checkbox" name="niv_comp3" id="st5-3" value="5" />
          <input type="hidden" name="id_comp_bdd" value="6"/>
          <label for="st5-3"></label>
        </div>
      </div>

    </div>



      <!--Nouvelle diapo-->
      <div class="item">

        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
  				<div class="fh5co-main-service">
  						<div class="icon-circle">
  							<img class="logos" src="images/logos/c-c++.png" alt="c-c++.png">
  						</div>
  						<h2>C & C++</h2>
  				</div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp4" id="st1-4" value="1" />
            <input type="hidden" name="id_comp_ccpp" value="8"/>
            <label for="st1-4"></label>
            <input type="checkbox" name="niv_comp4" id="st2-4" value="2" />
            <input type="hidden" name="id_comp_ccpp" value="8"/>
            <label for="st2-4"></label>
            <input type="checkbox" name="niv_comp4" id="st3-4" value="3" />
            <input type="hidden" name="id_comp_ccpp" value="8"/>
            <label for="st3-4"></label>
            <input type="checkbox" name="niv_comp4" id="st4-4" value="4" />
            <input type="hidden" name="id_comp_ccpp" value="8"/>
            <label for="st4-4"></label>
            <input type="checkbox" name="niv_comp4" id="st5-4" value="5" />
            <input type="hidden" name="id_comp_ccpp" value="8"/>
            <label for="st5-4"></label>
          </div>
  			</div>

        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
  				<div class="fh5co-main-service">
  						<div class="icon-circle">
  							<img class="logos" src="images/logos/c-sharp.png" alt="c-sharp.png">
  						</div>
  						<h2>C#</h2>
  				</div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp5" id="st1-5" value="1" />
            <input type="hidden" name="id_comp_csh" value="9"/>
            <label for="st1-5"></label>
            <input type="checkbox" name="niv_comp5" id="st2-5" value="2" />
            <input type="hidden" name="id_comp_csh" value="9"/>
            <label for="st2-5"></label>
            <input type="checkbox" name="niv_comp5" id="st3-5" value="3" />
            <input type="hidden" name="id_comp_csh" value="9"/>
            <label for="st3-5"></label>
            <input type="checkbox" name="niv_comp5" id="st4-5" value="4" />
            <input type="hidden" name="id_comp_csh" value="9"/>
            <label for="st4-5"></label>
            <input type="checkbox" name="niv_comp5" id="st5-5" value="5" />
            <input type="hidden" name="id_comp_csh" value="9"/>
            <label for="st5-5"></label>
          </div>
  			</div>

  			<div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
  				<div class="fh5co-main-service">
  						<div class="icon-circle">
  							<img class="logos" src="images/logos/python.png" alt="python.png">
  						</div>
  						<h2>Python</h2>
  				</div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp6" id="st1-6" value="1" />
            <input type="hidden" name="id_comp_py" value="22"/>
            <label for="st1-6"></label>
            <input type="checkbox" name="niv_comp6" id="st2-6" value="2" />
            <input type="hidden" name="id_comp_py" value="22"/>
            <label for="st2-6"></label>
            <input type="checkbox" name="niv_comp6" id="st3-6" value="3" />
            <input type="hidden" name="id_comp_py" value="22"/>
            <label for="st3-6"></label>
            <input type="checkbox" name="niv_comp6" id="st4-6" value="4" />
            <input type="hidden" name="id_comp_py" value="22"/>
            <label for="st4-6"></label>
            <input type="checkbox" name="niv_comp6" id="st5-6" value="5" />
            <input type="hidden" name="id_comp_py" value="22"/>
            <label for="st5-6"></label>
          </div>
  			</div>

  			<div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
  				<div class="fh5co-main-service">
  						<div class="icon-circle">
  							<img class="logos" src="images/logos/batch.png" alt="batch.png">
  						</div>
  						<h2>Batch</h2>
  				</div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp7" id="st1-7" value="1" />
            <input type="hidden" name="id_comp_bat" value="5"/>
            <label for="st1-7"></label>
            <input type="checkbox" name="niv_comp7" id="st2-7" value="2" />
            <input type="hidden" name="id_comp_bat" value="5"/>
            <label for="st2-7"></label>
            <input type="checkbox" name="niv_comp7" id="st3-7" value="3" />
            <input type="hidden" name="id_comp_bat" value="5"/>
            <label for="st3-7"></label>
            <input type="checkbox" name="niv_comp7" id="st4-7" value="4" />
            <input type="hidden" name="id_comp_bat" value="5"/>
            <label for="st4-7"></label>
            <input type="checkbox" name="niv_comp7" id="st5-7" value="5" />
            <input type="hidden" name="id_comp_bat" value="5"/>
            <label for="st5-7"></label>
          </div>
  			</div>


      </div>


      <!--Nouvelle diapo-->
      <div class="item">


        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/perl.png" alt="perl.png">
              </div>
              <h2>Perl</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp8" id="st1-8" value="1" />
            <input type="hidden" name="id_comp_perl" value="19"/>
            <label for="st1-8"></label>
            <input type="checkbox" name="niv_comp8" id="st2-8" value="2" />
            <input type="hidden" name="id_comp_perl" value="19"/>
            <label for="st2-8"></label>
            <input type="checkbox" name="niv_comp8" id="st3-8" value="3" />
            <input type="hidden" name="id_comp_perl" value="19"/>
            <label for="st3-8"></label>
            <input type="checkbox" name="niv_comp8" id="st4-8" value="4" />
            <input type="hidden" name="id_comp_perl" value="19"/>
            <label for="st4-8"></label>
            <input type="checkbox" name="niv_comp8" id="st5-8" value="5" />
            <input type="hidden" name="id_comp_perl" value="19"/>
            <label for="st5-8"></label>
          </div>
        </div>

        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/ruby.png" alt="ruby.png">
              </div>
              <h2>Ruby</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp9" id="st1-9" value="1" />
            <input type="hidden" name="id_comp_ruby" value="25"/>
            <label for="st1-9"></label>
            <input type="checkbox" name="niv_comp9" id="st2-9" value="2" />
            <input type="hidden" name="id_comp_ruby" value="25"/>
            <label for="st2-9"></label>
            <input type="checkbox" name="niv_comp9" id="st3-9" value="3" />
            <input type="hidden" name="id_comp_ruby" value="25"/>
            <label for="st3-9"></label>
            <input type="checkbox" name="niv_comp9" id="st4-9" value="4" />
            <input type="hidden" name="id_comp_ruby" value="25"/>
            <label for="st4-9"></label>
            <input type="checkbox" name="niv_comp9" id="st5-9" value="5" />
            <input type="hidden" name="id_comp_ruby" value="25"/>
            <label for="st5-9"></label>
          </div>
        </div>

        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/visualBasic.png" alt="vb.png">
              </div>
              <h2>VisualBasic</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp10" id="st1-10" value="1" />
            <input type="hidden" name="id_comp_vb" value="28"/>
            <label for="st1-10"></label>
            <input type="checkbox" name="niv_comp10" id="st2-10" value="2" />
            <input type="hidden" name="id_comp_vb" value="28"/>
            <label for="st2-10"></label>
            <input type="checkbox" name="niv_comp10" id="st3-10" value="3" />
            <input type="hidden" name="id_comp_vb" value="28"/>
            <label for="st3-10"></label>
            <input type="checkbox" name="niv_comp10" id="st4-10" value="4" />
            <input type="hidden" name="id_comp_vb" value="28"/>
            <label for="st4-10"></label>
            <input type="checkbox" name="niv_comp10" id="st5-10" value="5" />
            <input type="hidden" name="id_comp_vb" value="28"/>
            <label for="st5-10"></label>
          </div>
        </div>


        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/jsfw.png" alt="jsfw.png">
              </div>
              <h2>Javascript frameworks</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp11" id="st1-11" value="1" />
            <input type="hidden" name="id_comp_jsf" value="23"/>
            <label for="st1-11"></label>
            <input type="checkbox" name="niv_comp11" id="st2-11" value="2" />
            <input type="hidden" name="id_comp_jsf" value="23"/>
            <label for="st2-11"></label>
            <input type="checkbox" name="niv_comp11" id="st3-11" value="3" />
            <input type="hidden" name="id_comp_jsf" value="23"/>
            <label for="st3-11"></label>
            <input type="checkbox" name="niv_comp11" id="st4-11" value="4" />
            <input type="hidden" name="id_comp_jsf" value="23"/>
            <label for="st4-11"></label>
            <input type="checkbox" name="niv_comp11" id="st5-11" value="5" />
            <input type="hidden" name="id_comp_jsf" value="23"/>
            <label for="st5-11"></label>
          </div>
        </div>


      </div>
      <!--Nouvelle diapo-->
      <div class="item">

        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/php-framework.png" alt="php-fw.png">
              </div>
              <h2>PHP frameworks</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp12" id="st1-12" value="1" />
            <input type="hidden" name="id_comp_phpf" value="21"/>
            <label for="st1-12"></label>
            <input type="checkbox" name="niv_comp12" id="st2-12" value="2" />
            <input type="hidden" name="id_comp_phpf" value="21"/>
            <label for="st2-12"></label>
            <input type="checkbox" name="niv_comp12" id="st3-12" value="3" />
            <input type="hidden" name="id_comp_phpf" value="21"/>
            <label for="st3-12"></label>
            <input type="checkbox" name="niv_comp12" id="st4-12" value="4" />
            <input type="hidden" name="id_comp_phpf" value="21"/>
            <label for="st4-12"></label>
            <input type="checkbox" name="niv_comp12" id="st5-12" value="5" />
            <input type="hidden" name="id_comp_phpf" value="21"/>
            <label for="st5-12"></label>
          </div>
        </div>


        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/linux.png" alt="linux.png">
              </div>
              <h2>Linux</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp13" id="st1-13" value="1" />
            <input type="hidden" name="id_comp_linux" value="16"/>
            <label for="st1-13"></label>
            <input type="checkbox" name="niv_comp13" id="st2-13" value="2" />
            <input type="hidden" name="id_comp_linux" value="16"/>
            <label for="st2-13"></label>
            <input type="checkbox" name="niv_comp13" id="st3-13" value="3" />
            <input type="hidden" name="id_comp_linux" value="16"/>
            <label for="st3-13"></label>
            <input type="checkbox" name="niv_comp13" id="st4-13" value="4" />
            <input type="hidden" name="id_comp_linux" value="16"/>
            <label for="st4-13"></label>
            <input type="checkbox" name="niv_comp13" id="st5-13" value="5" />
            <input type="hidden" name="id_comp_linux" value="16"/>
            <label for="st5-13"></label>
          </div>
        </div>

        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">

              <div class="icon-circle">
                <img class="logos" src="images/logos/windows.png" alt="windows.png">
              </div>
              <h2>Windows</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp14" id="st1-14" value="1" />
            <input type="hidden" name="id_comp_win" value="29"/>
            <label for="st1-14"></label>
            <input type="checkbox" name="niv_comp14" id="st2-14" value="2" />
            <input type="hidden" name="id_comp_win" value="29"/>
            <label for="st2-14"></label>
            <input type="checkbox" name="niv_comp14" id="st3-14" value="3" />
            <input type="hidden" name="id_comp_win" value="29"/>
            <label for="st3-14"></label>
            <input type="checkbox" name="niv_comp14" id="st4-14" value="4" />
            <input type="hidden" name="id_comp_win" value="29"/>
            <label for="st4-14"></label>
            <input type="checkbox" name="niv_comp14" id="st5-14" value="5" />
            <input type="hidden" name="id_comp_win" value="29"/>
            <label for="st5-14"></label>
          </div>
        </div>


        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/Swift.png" alt="appmobile.png">
              </div>
              <h2>Developpement mobile</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp15" id="st1-15" value="1" />
            <input type="hidden" name="id_comp_appmobile" value="4"/>
            <label for="st1-15"></label>
            <input type="checkbox" name="niv_comp15" id="st2-15" value="2" />
            <input type="hidden" name="id_comp_appmobile" value="4"/>
            <label for="st2-15"></label>
            <input type="checkbox" name="niv_comp15" id="st3-15" value="3" />
            <input type="hidden" name="id_comp_appmobile" value="4"/>
            <label for="st3-15"></label>
            <input type="checkbox" name="niv_comp15" id="st4-15" value="4" />
            <input type="hidden" name="id_comp_appmobile" value="4"/>
            <label for="st4-15"></label>
            <input type="checkbox" name="niv_comp15" id="st5-15" value="5" />
            <input type="hidden" name="id_comp_appmobile" value="4"/>
            <label for="st5-15"></label>
          </div>
        </div>




      </div>


      <!--Nouvelle diapo-->

      <div class="item">


        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/anglais.png" alt="anglais.png">
              </div>
              <h2>Anglais</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp16" id="sti-16" value="1" />
            <input type="hidden" name="id_comp_ang" value="3"/>
            <label for="st1-16"></label>
            <input type="checkbox" name="niv_comp16" id="st2-16" value="2" />
            <input type="hidden" name="id_comp_ang" value="3"/>
            <label for="st2-16"></label>
            <input type="checkbox" name="niv_comp16" id="st3-16" value="3" />
            <input type="hidden" name="id_comp_ang" value="3"/>
            <label for="st3-16"></label>
            <input type="checkbox" name="niv_comp16" id="st4-16" value="4" />
            <input type="hidden" name="id_comp_ang" value="3"/>
            <label for="st4-16"></label>
            <input type="checkbox" name="niv_comp16" id="st5-16" value="5" />
            <input type="hidden" name="id_comp_ang" value="3"/>
            <label for="st5-16"></label>
          </div>
        </div>

        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/francais.png" alt="fr.png">
              </div>
              <h2>Français</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp17" id="st1-17" value="1" />
            <input type="hidden" name="id_comp_fran" value="12"/>
            <label for="st1-17"></label>
            <input type="checkbox" name="niv_comp17" id="st2-17" value="2" />
            <input type="hidden" name="id_comp_fran" value="12"/>
            <label for="st2-17"></label>
            <input type="checkbox" name="niv_comp17" id="st3-17" value="3" />
            <input type="hidden" name="id_comp_fran" value="12"/>
            <label for="st3-17"></label>
            <input type="checkbox" name="niv_comp17" id="st4-17" value="4" />
            <input type="hidden" name="id_comp_fran" value="12"/>
            <label for="st4-17"></label>
            <input type="checkbox" name="niv_comp17" id="st5-17" value="5" />
            <input type="hidden" name="id_comp_fran" value="12"/>
            <label for="st5-17"></label>
          </div>
        </div>

        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/maths.png" alt="mayhs.png">
              </div>
              <h2>Mathématiques</h2>
            </div>
            <div class="wrapper">
              <input type="checkbox" name="niv_comp18" id="st1-18" value="1" />
              <input type="hidden" name="id_comp_maths" value="18"/>
              <label for="st1-18"></label>
              <input type="checkbox" name="niv_comp18" id="st2-18" value="2" />
              <input type="hidden" name="id_comp_maths" value="18"/>
              <label for="st2-18"></label>
              <input type="checkbox" name="niv_comp18" id="st3-18" value="3" />
              <input type="hidden" name="id_comp_maths" value="18"/>
              <label for="st3-18"></label>
              <input type="checkbox" name="niv_comp18" id="st4-18" value="4" />
              <input type="hidden" name="id_comp_maths" value="18"/>
              <label for="st4-18"></label>
              <input type="checkbox" name="niv_comp18" id="st5-18" value="5" />
              <input type="hidden" name="id_comp_maths" value="18"/>
              <label for="st5-18"></label>
          </div>
        </div>

        <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
          <div class="fh5co-main-service">
              <div class="icon-circle">
                <img class="logos" src="images/logos/algo.png" alt="algo.png">
              </div>
              <h2>Algorithme</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp19" id="st1-19" value="1" />
            <input type="hidden" name="id_comp_algo" value="2"/>
            <label for="st1-19"></label>
            <input type="checkbox" name="niv_comp19" id="st2-19" value="2" />
            <input type="hidden" name="id_comp_algo" value="2"/>
            <label for="st2-19"></label>
            <input type="checkbox" name="niv_comp19" id="st3-19" value="3" />
            <input type="hidden" name="id_comp_algo" value="2"/>
            <label for="st3-19"></label>
            <input type="checkbox" name="niv_comp19" id="st4-19" value="4" />
            <input type="hidden" name="id_comp_algo" value="2"/>
            <label for="st4-19"></label>
            <input type="checkbox" name="niv_comp19" id="st5-19" value="5" />
            <input type="hidden" name="id_comp_algo" value="2"/>
            <label for="st5-19"></label>
          </div>
        </div>


      </div>

    <div class="item">

      <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
        <div class="fh5co-main-service">
            <div class="icon-circle">
              <img class="logos" src="images/logos/reseau.png" alt="reseau.png">
            </div>
            <h2>Réseaux</h2>
          </div>
          <div class="wrapper">
            <input type="checkbox" name="niv_comp20" id="st1-20" value="1" />
            <input type="hidden" name="id_comp_res" value="24"/>
            <label for="st1-20"></label>
            <input type="checkbox" name="niv_comp20" id="st2-20" value="2" />
            <input type="hidden" name="id_comp_res" value="24"/>
            <label for="st2-20"></label>
            <input type="checkbox" name="niv_comp20" id="st3-20" value="3" />
            <input type="hidden" name="id_comp_res" value="24"/>
            <label for="st3-20"></label>
            <input type="checkbox" name="niv_comp20" id="st4-20" value="4" />
            <input type="hidden" name="id_comp_res" value="24"/>
            <label for="st4-20"></label>
            <input type="checkbox" name="niv_comp20" id="st5-20" value="5" />
            <input type="hidden" name="id_comp_res" value="24"/>
            <label for="st5-20"></label>
        </div>
      </div>

      <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
        <div class="fh5co-main-service">
            <div class="icon-circle">
              <img class="logos" src="images/logos/management.png" alt="management.png">
            </div>
            <h2>Management</h2>
        </div>
        <div class="wrapper">
          <input type="checkbox" name="niv_comp21" id="st1-21" value="1" />
          <input type="hidden" name="id_comp_mag" value="17"/>
          <label for="st1-21"></label>
          <input type="checkbox" name="niv_comp21" id="st2-21" value="2" />
          <input type="hidden" name="id_comp_mag" value="17"/>
          <label for="st2-21"></label>
          <input type="checkbox" name="niv_comp21" id="st3-21" value="3" />
          <input type="hidden" name="id_comp__mag" value="17"/>
          <label for="st3-21"></label>
          <input type="checkbox" name="niv_comp21" id="st4-21" value="4" />
          <input type="hidden" name="id_comp__mag" value="17"/>
          <label for="st4-21"></label>
          <input type="checkbox" name="niv_comp21" id="st5-21" value="5" />
          <input type="hidden" name="id_comp__mag" value="17"/>
          <label for="st5-21"></label>
        </div>
      </div>

      <div class="col-md-2 col-lg-2 col-xs-8 col-sm-8 image">
        <div class="fh5co-main-service">
            <div class="icon-circle">
              <img class="logos" src="images/logos/economie.png" alt="economie.png">
            </div>
            <h2>Economie</h2>
        </div>
        <div class="wrapper">
          <input type="checkbox" name="niv_comp22" id="st1-22" value="1" />
          <input type="hidden" name="id_comp_eco" value="11"/>
          <label for="st1-22"></label>
          <input type="checkbox" name="niv_comp22" id="st2-22" value="2" />
          <input type="hidden" name="id_comp_eco" value="11"/>
          <label for="st2-22"></label>
          <input type="checkbox" name="niv_comp22" id="st3-22" value="3" />
          <input type="hidden" name="id_comp_eco" value="11"/>
          <label for="st3-22"></label>
          <input type="checkbox" name="niv_comp22" id="st4-22" value="4" />
          <input type="hidden" name="id_comp_eco" value="11"/>
          <label for="st4-22"></label>
          <input type="checkbox" name="niv_comp22" id="st5-22" value="5" />
          <input type="hidden" name="id_comp_eco" value="11"/>
          <label for="st5-22"></label>
        </div>
      </div>

    </div>
  </div>



    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>

  </div>


  <div class="form-group valider">
  	<button type="submit" name="valider" class="btn btn-primary">Valider</button>
  </div>

</div>
</form>


<?php include("footer.php") ?>
