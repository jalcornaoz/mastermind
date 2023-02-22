<?php
class Clave
{
    public const COLORES = ["amarillo", "azul", "marron", "naranja", "rojo", "rosa", "verde", "violeta"];
    private $clave = [];

    public function __construct()
    {
        if (isset($_SESSION["clave"]))
            $this->clave = $_SESSION["clave"];
        else {
            $this->clave = $this->generaClave();
            $_SESSION["clave"] = $this->clave;
        }
        return $this->clave;
    }

    private function generaClave()
    {
        $n1 = rand(0, 7);
        do {
            $n2 = rand(0, 7);
        } while ($n2 == $n1);
        do {
            $n3 = rand(0, 7);
        } while ($n3 == $n2 || $n3 == $n1);
        do {
            $n4 = rand(0, 7);
        } while ($n4 == $n3 || $n4 == $n2 || $n4 == $n1);
        $colores = $this::COLORES;
        $this->clave = ["$colores[$n1]", "$colores[$n2]", "$colores[$n3]", "$colores[$n4]"];
        return $this->clave;
    }
    
    public function getClave()
    {
        $clave = "";
        foreach ($this->clave as $color)
            $clave .= "<span class=\"$color\">&nbsp$color&nbsp</span>";
        return $clave;
    }
}
