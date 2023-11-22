<!-- Subtarea 2 -->
<?php
class DVD extends Material
{
    private $duracion;
    private $genero;

    // Constructor de la clase DVD
    public function __construct($titulo, $autor, $ISBN, $disponible, $duracion, $genero)
    {
        parent::__construct($titulo, $autor, $ISBN, $disponible);
        $this->duracion = $duracion;
        $this->genero = $genero;
    }

    // Getters y setters
    public function getDuracion()
    {
        return $this->duracion;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    // Sobreescritura del método toString
    public function __toString()
    {
        $isDisponibleStr = $this->isDisponible() ? "Si" : "No";
        // Encadenamos la llamada al método toString de la clase padre
        return parent::__toString() . " Duración: {$this->getDuracion()}min. Género: {$this->getGenero()}. Disponible: $isDisponibleStr.<br>";
    }
}
