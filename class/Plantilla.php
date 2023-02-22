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
}
