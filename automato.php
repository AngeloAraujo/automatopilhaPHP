<!DOCTYPE html>
<html>

<head>
  <title>Autômato de Pilha</title>
</head>

<body>
  <h1>Autômato de Pilha</h1>

  <form method="post" action="">
    <label for="cadeia">Digite uma palavra:</label>
    <input type="text" name="cadeia" id="cadeia" required>
    <input type="submit" value="Testar">
  </form>

  <?php include 'automatopilha.php'; ?>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ap = new AP();
    $input = $_POST["cadeia"];

    if ($ap->palavra($input)) {
      echo "<p class='valid'>A palavra '{$input}' é válida.</p>";
    } else {
      echo "<p class='invalid'>A palavra '{$input}' é inválida.</p>";
    }
  }
  ?>
</body>

</html>