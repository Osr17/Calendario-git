<?php

class Calculadora{
    
    public $n1;
    public $n2;
    public $resultado;
    public $memoria;
    public $historial=[];
    
    function __construct($n1,$n2){
        $this->n1=$n1;
        $this->n2=$n2;
    }
    function suma(){
        $this->resultado=$this->n1+$this->n2;
        $this->historial[]=$this->resultado;
    }
    function resta(){
        $this->resultado=$this->n1-$this->n2;
        $this->historial[]=$this->resultado;
    }
    function multiplicar(){
        $this->resultado=$this->n1*$this->n2;
        $this->historial[]=$this->resultado;
    }
    function dividir(){
        $this->resultado=$this->n1/$this->n2;
        $this->historial[]=$this->resultado;
    }
    function mostrarResultado(){
        echo $this->resultado;
    }
}

class Cientifica extends Calculadora{
    
    function exponencial(){
        $this->resultado=$this->n1**$this->n2;
        $this->historial[]=$this->resultado;
        //return $this->resultado;
    }
    function raiz(){
        $this->resultado=sqrt($this->n1);
        $this->historial[]=$this->resultado;
    }
    function setvalores($a,$b){
        $this->n1=$a;
        $this->n2=$b;
    }
    function MC(){
        $this->memoria=$this->resultado;
    }
    function recuperar_MC(){
        return $this->memoria;
    }
}



$calc=new Cientifica(7, 10);
echo "La suma de: ".$calc->n1."+".$calc->n2."=".$calc->suma();
$calc->mostrarResultado();
echo "<br>";
echo "La resta de: ".$calc->n1."-".$calc->n2."=".$calc->resta();
$calc->mostrarResultado();
echo "<br>";
echo "La multiplicación de: ".$calc->n1."*".$calc->n2."=".$calc->multiplicar();
$calc->mostrarResultado();
echo "<br>";
echo "La división de: ".$calc->n1."/".$calc->n2."=".$calc->dividir();
$calc->mostrarResultado();
echo "<br>";
echo "El exponente de: ".$calc->n1."^".$calc->n2."=".$calc->exponencial();
$calc->mostrarResultado();
echo "<br>";
echo "La raíz cuadrada de: √".$calc->n1." es ".$calc->raiz();
$calc->mostrarResultado();
echo "<br>";
$calc->MC();
echo $calc->recuperar_MC();
echo "<br>";
$calc->setValores(2,5);
$calc->multiplicar();
echo $calc->resultado;
echo "<br>";
echo $calc->recuperar_MC();
$calc->MC();
echo "<br>";
echo $calc->recuperar_MC();
echo "<pre>";
print_r($calc->historial);
echo "</pre>";
//$cien=new Cientifica(2,2);
//echo $cien->exponencial($cien->n1,$cien->n2);
//Para hacerlo desde fuera*/









?>