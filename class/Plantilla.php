<?php


class Plantilla
{
    static public function generaSelects()
    {
        $colores = Clave::COLORES;
        $select = "";
        for ($i = 1; $i <= 4; $i++) {
            $select .= "<select name=\"combinacion[]\">";
            foreach ($colores as $color) {
                $select .= "<option value=\"$color\" class=\"$color\">$color</option>";
            }
            $select .= "</select>";
        }
        return $select;
    }

    static function mostrarJugadas()
    {
        $n = 1;
        $msj = "Intento número " . $_SESSION["intentos"] . "<br>";
        $msj .= "Tus Jugadas:<br>";
        $msj .= "<table class='table'>";
        foreach ($_SESSION["jugadas"] as $jugada) {
            $msj .= "<tr><td>$n.-</td>" . $jugada->mostrarJugada() . "</tr>";
            $n++;
        }
        $msj .= "</table>";
        return $msj;
    }
}
