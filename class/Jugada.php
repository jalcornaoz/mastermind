<?php
$cargar_clase = fn ($clase) => require_once "./class/$clase.php";
spl_autoload_register($cargar_clase);

class Jugada
{
    private array $jugada;
    private int $posiciones = 0;
    private int $noPosiciones = 0;

    public function __construct($combinacion)
    {
        $this->jugada = $combinacion;
        $clave = $_SESSION["clave"];
        $this->comprobarAciertos($clave);
    }

    private function comprobarAciertos($clave)
    {
        $array_acertados = [];
        $this->posiciones = 0;
        $this->noPosiciones = 0;
        for ($i = 0; $i < 4; $i++) {
            if ($clave[$i] == $this->jugada[$i]) {
                $this->posiciones++;
                $array_acertados[] = $clave[$i];
            }
        }
        for ($i = 0; $i < 4; $i++) {
            if ($clave[$i] != $this->jugada[$i] && !in_array($this->jugada[$i], $array_acertados)) {
                if (in_array($this->jugada[$i], $clave)) {
                    $this->noPosiciones++;
                    $array_acertados[] = $clave[$i];
                }
            }
        }
    }

    public function mostrarJugada()
    {
        $msj = "<td><span class=\"posicion\">&nbsp" . $this->posiciones . "&nbsp</span></td>";
        $msj .= "<td><span class=\"noPosicion\">&nbsp" . $this->noPosiciones . "&nbsp</span></td>";
        foreach ($this->jugada as $color) {
            $msj .= "<td><span class=\"$color\">&nbsp$color&nbsp</span></td>";
        }
        return $msj;
    }


    public function getPosiciones()
    {
        return $this->posiciones;
    }
}
/*
    public function setJugada($combinacion)
    {
        $this->jugadas[] = $combinacion;
        $this->intentos++;
        $_SESSION["jugada"] = $this->jugadas;
        $_SESSION["intentos"] = $this->intentos;
    }
*/
