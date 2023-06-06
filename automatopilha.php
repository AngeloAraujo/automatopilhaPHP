<?php
class AP {
  private $pilha;
  private $estadoAtual;

  public function __construct() {
    $this->pilha = [];
    $this->estadoAtual = 0;
  }

  public function palavra($input) {
    $length = strlen($input);

    for ($i = 0; $i < $length; $i++) {
      $simbolo = $input[$i];

      switch ($this->estadoAtual) {
        case 0:
          if ($simbolo === 'a' || $simbolo === 'b') {
            array_push($this->pilha, $simbolo);
            $this->estadoAtual = 1;
          } else {
            return false; // Caractere inválido
          }
          break;

        case 1:
          if ($simbolo === 'a' || $simbolo === 'b') {
            array_push($this->pilha, $simbolo);
          } elseif ($simbolo === 'X') {
            $this->estadoAtual = 2;
          } else {
            return false; // Caractere inválido
          }
          break;

        case 2:
          if ($simbolo === 'a' || $simbolo === 'b') {
            $top = end($this->pilha);
            if ($top === $simbolo) {
              array_pop($this->pilha);
              $this->estadoAtual = 2;
            } else {
              return false; // Inversão incorreta
            }
          } else {
            return false; // Caractere inválido
          }
          break;
      }
    }

    if ($this->estadoAtual === 2 && empty($this->pilha)) {
      return true; // Aceita a palavra
    } else {
      return false; // Rejeita a palavra
    }
  }
}
?>
