<!-- Subtarea 2 -->
<?php
class Libro extends Material
{
    private $numPaginas;

    // Constructor de la clase Libro
    public function __construct($titulo, $autor, $ISBN, $disponible, $numPaginas)
    {
        parent::__construct($titulo, $autor, $ISBN, $disponible);
        $this->numPaginas = $numPaginas;
    }

    // Getters y setters
    public function getNumPaginas()
    {
        return $this->numPaginas;
    }

    public function setNumPaginas($numPaginas)
    {
        $this->numPaginas = $numPaginas;
    }


    // Sobreescritura del método toString
    public function __toString()
    {
        $isDisponibleStr = $this->isDisponible() ? "Si" : "No";
        // Encadenamos la llamada al método toString de la clase padre
        return parent::__toString() . " Paginas: {$this->getNumPaginas()}. Disponible: $isDisponibleStr.<br>";
    }
}
