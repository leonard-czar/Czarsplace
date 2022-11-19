<?php
ob_start();
include_once "functions/mydbfunctions.php";
include_once "functions/admin.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8 ">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-to">
  <meta name="author" content="leonard lebechi">
  <meta name="description" content="your one stop shop for wristwatches">
  <meta name="keywords" content="czar's Place,wristwatch,luxury watch,mechanical watch,
    time,timepiece,online store,watch store,watch collection,
    lagos,rolex,hublot,patek phillepe,">

  <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <title><?php if (isset($homepage)) {
            echo $homepage . " | ";
          };
          if (isset($contact)) {
            echo $contact . " | ";
          };
          if (isset($register)) {
            echo $register . " | ";
          }
          if (isset($login)) {
            echo $login . " | ";
          }
          if (isset($admin)) {
            echo $admin . " | ";
          }

          ?><?php if (!defined("CZARS")) {
              define("CZARS", "Czar's Place");
              echo CZARS;
            } ?> Haven for luxury wristwatches</title>

  <style>
    @font-face {
      font-family: 'czars';
      src: url('unica_one/UnicaOne-Regular.ttf');
    }

    @font-face {
      font-family: 'czars3';
      src: url('pacifico/pacifico-Regular.ttf');
    }

    @font-face {
      font-family: 'czars2';
      src: url('padauk/padauk-Regular.ttf');
    }

    #brandname {
      font-family: czars, sans-serif;
      text-decoration: none;
      color: white;
    }

    .bannertxt {
      font-family: czars3, sans-serif;
      color: white;
      font-size: 4.5vw;
      padding: auto;
    }

    #copyright_txt {
      font-family: czars, sans-serif;
      color: white;
      font-size: 1.2vw;
    }

    .row1 {
      font-size: 1.1vw;
      text-transform: capitalize;
    }

    .footr {
      font-family: czars, sans-serif;
      color: white;
    }

    .price {
      color: rgba(0, 0, 0, 0.6);
      margin-top: 2px;
    }

    a,
    a:hover {
      text-decoration: none;
      color: black;
    }

    .nav-item :hover {
      color: white !important;
    }

    #drop :hover {
      color: white !important;
    }

    .navbar-brand:hover {
      color: white !important;
    }

    #acct:hover {
      color: white !important;
    }

    #whatsapp {
      position: fixed;
      justify-content: flex-end;
      display: flex;
      top: 350px;
      right: 20px;
    }

    #spanwhatsapp {
      border: 2px solid white;
      color: rgba(0, 0, 0, 0.9);
      background-color: white;
      font-size: 1vw;
      border-radius: 7%;
      padding: 3px;
    }

    .socials {
      background-color: rgba(255, 255, 255, 0.5);
      border-radius: 30%;
    }
  </style>

</head>

<body>





  <!-------------NAVBAR----------->
  <div class="container-fluid-sm">
    <div>
      <div class="row" style="border-bottom: 1px solid ;background-color: #050C24;padding-bottom:30px;padding-left:22px;">
        <div class="col-sm pt-sm-2 " style="color:rgba(255, 255, 255);">
          <a href="index.php" id="brandname">
            <h1>
              <?php echo CZARS; ?>
            </h1>
          </a>
        </div>
        <div class="col-sm offset-sm-5 pt-sm-3 ">
          <form class="d-flex  flex-grow-1 bd-highlight" method="post" action="index_redirect.php">
            <input class=" me-1" type="text" name="searchbox" placeholder="Search" aria-label="Search" id="inputs">
            <button class="btn btn-outline-success btn-sm" type="submit" name="btnsearch">
              Search
            </button>
          </form>
        </div>
      </div>
    </div>



    <div class="row " style="background-color: #050C24;position:
                sticky;top: 0;z-index:1; padding-left:12px;display:flex; ">
      <div>
        <nav class="navbar navbar-expand navbar-light">
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mb-sm-2 col-sm">
              <li class="nav-item col-sm" style="padding-left: 10px;">
                <a class="nav-link " href="index.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                  <b> HOME</b>
                </a>
              </li>
              <li class="nav-item col-sm" style="padding-left: 10px;">
                <a class="nav-link " href="index_displaybrands.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                  <b> BRANDS </b>
                </a>
              </li>
              <li class="nav-item col-sm-2" style="padding-left: 10px;">
                <a class="nav-link " href="index_malewatches.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                  <b> MEN COLLECTIONS</b>
                </a>
              </li>
              <li class="nav-item col-sm-2" style="padding-left: 10px;">
                <a class="nav-link " href="index_femalewatches.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                  <b> LADIES COLLECTIONS</b>
                </a>
              </li>
              <li class="nav-item col-sm-1  offset-sm-4">
                <a class="nav-link active " style="color:rgba(255, 255, 255,0.5);
                        font-size: 1.1vw!important;" href="login.php"><b> ACCOUNT</b></a>

              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>