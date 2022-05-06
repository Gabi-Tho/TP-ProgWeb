<?php
$clients = [
  ["id" => 1, "nom" => "Aubin",  "prenom" => "Alain",  "dateNaissance" => "1981-01-01", "tel" => "514 111-1234"],
  ["id" => 2, "nom" => "Brel",   "prenom" => "Bruno",  "dateNaissance" => "1982-02-02", "tel" => "514 222-1234"],
  ["id" => 3, "nom" => "Chabot", "prenom" => "Clara",  "dateNaissance" => "1983-03-03", "tel" => "514 333-1234"],
  ["id" => 4, "nom" => "Dubois", "prenom" => "Didier", "dateNaissance" => "1984-04-04", "tel" => "514 444-1234"],
  ["id" => 5, "nom" => "Escot",  "prenom" => "Ernest", "dateNaissance" => "1985-05-05", "tel" => "514 555-1234"],
  ["id" => 6, "nom" => "Fortin", "prenom" => "France", "dateNaissance" => "1986-06-06", "tel" => "514 666-1234"],
  ["id" => 7, "nom" => "Gravel", "prenom" => "Gérard", "dateNaissance" => "1987-07-07", "tel" => "514 777-1234"],
  ["id" => 8, "nom" => "Hébert", "prenom" => "Hugo",   "dateNaissance" => "1988-08-08", "tel" => "514 888-1234"],
  ["id" => 9, "nom" => "Imbert", "prenom" => "Iris",   "dateNaissance" => "1989-09-09", "tel" => "514 999-1234"]
];
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
            <div class="content"><a href="modifications.php">modifier</a></div>
          </div>
<?php endforeach ?>
      </div>
  </main>
  <footer class="footer">Copyright blah blah blah</footer>
</body>
</html>