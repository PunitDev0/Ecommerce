<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css"
    />

    <title>Document</title>
    <style>
      .Shortby {
        position: relative;
        width: 100%;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div class="Navbar fixed w-full z-50">
      <?php include './Navbar.php' ?>
    </div>
    <div class="MainPage">
      <!-- here include navbar -->
      <div class="Content flex py-28 px-10">
        <div class="box1">
          <?php include'./sidebar.php'?>
        </div>
        <div class="box2 w-full h-full">
          <div class="Shortby w-full relative">
            <?php include'./Filter.php'?>
          </div>
          <div class="Cards my-10">
              <h1 class="text-center text-3xl">FEATURED COLLECTION'S</h1>
              <div class="horizontalCard product-list">
                <?php include './Card.php' ?>
              </div>
              <div class="verticalCard hidden product-list">
                <?php include './verticleCard.php' ?>
              </div>
          </div>
        </div>
      </div>
      <div class="Footer">
        <?php include './Footer.php'; ?>
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
  <!-- <script src="../JS/loco.js"></script> -->
</html>
