<!DOCTYPE html>
<html lang="FR">
<head>
  <title>Page de Connexion</title>
    <link rel="stylesheet" href="../style/login.css">

</head>
<body>
<h2>Connexion</h2>
<form method="post" action="../php/authentifier.php">
  <label for="username">Nom d'utilisateur :</label>
  <input type="text" id="username" name="username" required><br><br>

  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password" required><br><br>

  <input type="submit" value="Se Connecter">
</form>
<a href="../index.php">retour</a>
</body>
</html>
