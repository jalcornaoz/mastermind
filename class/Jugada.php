<?php

class Jugada
{
    private $jugadas = [];
    private int $intentos = 0;
    private int $noPosiciones = 0;
    private int $posiciones = 0;
    private $acertados = [];

    public function __construct()
    {
        if (isset($_SESSION["jugada"])) {
            $this->jugadas = $_SESSION["jugada"];
            $this->intentos = $_SESSION["intentos"];
        }
    }

    public function setJugada($combinacion)
    {
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
            $msj .= "<td><span class=\"posicion\">&nbsp" . $this->getPosiciones($jugada) . "&nbsp</span></td>";
            $msj .= "<td><span class=\"noPosicion\">&nbsp" . $this->getNoPosiciones($jugada) . "&nbsp</span></td>";
            foreach ($jugada as $color) {
                $msj .= "<td><span class=\"$color\">&nbsp$color&nbsp</span></td>";
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
        $this->acertados = [];
        $this->posiciones = 0;
        for ($i = 0; $i < 4; $i++) {
            if ($combinacion[$i] == $clave[$i]) {
                $this->posiciones++;
                $this->acertados[] = $clave[$i];
            }
        }
        return $this->posiciones;
    }

    private function getNoPosiciones($combinacion)
    {
        $clave = $_SESSION["clave"];
        $this->noPosiciones = 0;
        for ($i = 0; $i < 4; $i++) {
            if ($clave[$i] != $combinacion[$i] && !in_array($combinacion[$i], $this->acertados)) {
                if (in_array($combinacion[$i], $clave)) {
                    $this->noPosiciones++;
                    $this->acertados[] = $combinacion[$i];
                }
            }
        }
        return $this->noPosiciones;
    }

    public function getIntentos()
    {
        return $this->intentos;
    }
}
