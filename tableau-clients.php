<?php
require "clients.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listes des clients</title>
  <style>
    body { width: 80%; margin: auto; font-family: 'Trebuchet MS', sans-serif; }
    .grid { display: grid; grid-gap: 3px; }
    .l { display: contents; }
    .l:nth-of-type(2n) .content   { background-color: #eee; }
    .l:nth-of-type(2n+1) .content { background-color: #ddd; }
    .top     { text-align: center; font-weight: bold; border: 2px solid cornflowerblue; }
    .top, .content { box-sizing: border-box; padding: 5px 20px; line-height: 32px; border-radius: 3px; }
    .right { text-align: right; }
    .center { text-align: center; }
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
    }
    </style>
</head>
<body>
  <main>
      <h1>Clients</h1>
      <br>
      <div><a href="Ajout-clients.php">ajouter un client</a></div>
      <br>
      <div class ="grid" style="grid-template-columns: repeat(5, max-content)">
          <div class="top">ID</div>
          <div class="top">Nom</div>
          <div class="top">Date de naissance</div>
          <div class="top">Téléphone</div>
          <div class="top">Actions</div>
<?php foreach($clients as $clients) : ?>
          <div class="l">
            <div class="content"><?php echo $clients["id"]?></div>
            <div class="content"><?php echo $clients["nom"].", ".$clients["prenom"]?></div>
            <div class="content"><?php echo $clients["dateNaissance"]?></div>
            <div class="content"><?php echo $clients["tel"]?></div>
            <div class="content"><a href="modifications.php?id=<?=$clients["id"]?>">modifications</a></div>
          </div>
<?php endforeach ?>
      </div>
  </main>
  <footer class="footer">Copyright blah blah blah</footer>
</body>
</html>