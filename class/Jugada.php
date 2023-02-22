<?php

class Jugada
{
    private $jugadas = [];
    private int $noPosiciones = 0;
    private $posiciones = [];
    private int $intentos = 0;

    public function __construct($combinacion)
    {
        if (isset($_SESSION["jugada"])) {
            $this->intentos = $_SESSION["intentos"];
            $this->jugadas = $_SESSION["jugada"];
        }
        $this->jugadas[] = $combinacion;
        $this->intentos++;
        $_SESSION["jugada"] = $this->jugadas;
        $_SESSION["intentos"] = $this->intentos;
    }

    public function getJugada()
    {
        $msj = "<table class=\"table\">";
        $n = 1;
        foreach ($this->jugadas as $jugada) {
            $msj .= "<tr><td>$n.-</td>";
            $msj .= "<td><span class=\"posicion\">" . $this->getPosiciones($jugada) . "</span></td>";
            $msj .= "<td><span class=\"noPosicion\">" . $this->getNoPosiciones($jugada) . "</span></td>";
            foreach ($jugada as $color) {
                $msj .= "<td><span class=\"$color\">$color</span></td>";
            }
            $msj .= "</tr>";
            $n++;
        }
        $msj .= "</table>";
        return $msj;
    }

    public function getPosiciones($combinacion)
    {
        $clave = $_SESSION["clave"];
        $this->posiciones = [0, 0, 0, 0];
        for ($i = 0; $i < 4; $i++) {
            if ($combinacion[$i] == $clave[$i]) {
                $this->posiciones[$i] = 1;
            }
        }
        $aciertos = 0;
        foreach ($this->posiciones as $posicion)
            $aciertos += $posicion;
        return $aciertos;
    }
    private function getNoPosiciones($combinacion)
    {
        $clave = $_SESSION["clave"];
        $this->noPosiciones = 0;
        if ($clave[0] != $combinacion[0]) {
            if ($combinacion[0] == $clave[1] || $combinacion[0] == $clave[2] || $combinacion[3] == $clave[3])
                $this->noPosiciones++;
        }
        if ($clave[1] != $combinacion[1]) {
            if ($combinacion[1] == $clave[0] || $combinacion[1] == $clave[2] || $combinacion[1] == $clave[3])
                $this->noPosiciones++;
        }
        if ($clave[2] != $combinacion[2]) {
            if ($combinacion[2] == $clave[0] || $combinacion[2] == $clave[1] || $combinacion[2] == $clave[3])
                $this->noPosiciones++;
        }
        if ($clave[3] != $combinacion[3]) {
            if ($combinacion[3] == $clave[0] || $combinacion[3] == $clave[1] || $combinacion[3] == $clave[2])
                $this->noPosiciones++;
        }
        return $this->noPosiciones;
    }

    public function getIntentos()
    {
        return $this->intentos;
    }
}
