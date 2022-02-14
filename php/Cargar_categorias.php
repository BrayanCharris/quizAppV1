<?php
    function cargarCategorias($arreglo){
        $categorias=array();

        for ($i=0; $i < count($arreglo); $i++) {
            $valorArr=$arreglo[$i];
            if (!comprobarSiExisteValor($valorArr["categoria"],$categorias)){
                $categorias[$valorArr["categoria"]]=0;
            }
        }

        return $categorias;
    }

    function cargarCantidasCategorias($arreglo){
        $cantCategorias=array();

        for ($i=0; $i < count($arreglo); $i++) {
            $valorArr=$arreglo[$i]["categoria"];
            $cant=cuantasVecesRepiteValor($valorArr,$arreglo);
            $cantCategorias[$valorArr]=$cant;
        }


        return $cantCategorias;
    }

    function comprobarSiExisteValor($valor,$valores){
        $existencia=false;

        foreach ($valores as $value) {
            if ($valor==$value) {
                $existencia=true;
            }
        }

        return $existencia;
    }

    function cuantasVecesRepiteValor($valor,$valores){
        $nVeces=0;
        for ($i=0; $i < count($valores); $i++) { 
            $valorArr= $valores[$i];
            if ($valor==$valorArr["categoria"]){
                $nVeces++;
            }
        }

        return $nVeces;
    }
?>