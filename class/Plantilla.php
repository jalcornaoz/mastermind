<?php


class Plantilla
{
    static public function generaSelects()
    {
        $colores = Clave::COLORES;
        $msj_select = "";
        for ($i = 1; $i <= 4; $i++) {
            $msj_select .= "<select name=\"combinacion[]\">";
            foreach ($colores as $color) {
                $msj_select .= "<option value=\"$color\" class=\"$color\">$color</option>";
            }
            $msj_select .= "</select>";
        }
        return $msj_select;
    }

    static function mostrarJugadas()
    {
        $n = 1;
        $msj = "Intento número " . sizeof($_SESSION["jugadas"]) . "<br>";
        $msj .= "Tus Jugadas:<br>";
        $msj .= "<table class=\"table text-center\">";
        foreach ($_SESSION["jugadas"] as $jugada) {
            $msj .= "<tr><td>$n.-</td>" . $jugada->mostrarJugada() . "</tr>";
            $n++;
        }
        $msj .= "</table>";
        return $msj;
    }

    static function mostrarClave(){
        $msj_clave = "<table class=\"table text-center\"><tr>";
        foreach ($_SESSION["clave"] as $color)
            $msj_clave .= "<td><span class=\"$color\">&nbsp$color&nbsp</span></td>";
        $msj_clave.="</tr></table>";
        return $msj_clave;
    }
}
