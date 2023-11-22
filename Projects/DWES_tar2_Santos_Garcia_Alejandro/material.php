<!-- Subtarea 1 -->
<?php
class Material
{
    private $titulo;
    private $autor;
    private $ISBN;
    private $disponible;

    // Constructor de la clase base Material
    public function __construct($titulo, $autor, $ISBN, $disponible)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ISBN = $ISBN;
        $this->disponible = $disponible;
    }

    // Getters y setters
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function getISBN()
    {
        return $this->ISBN;
    }

    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }

    public function isDisponible()
    {
        return $this->disponible;
    }

    public function prestar()
    {
        if ($this->disponible) {
            $this->disponible = false;
            return "El material ha sido prestado correctamente.";
        } else {
            return "No se ha podido prestar.";
        }
    }

    public function devolver()
    {
        if (!$this->disponible) {
            $this->disponible = true;
            return "Devuelto correctamente.";
        } else {
            return "No se puede devolver; no se ha tomado prestado.";
        }
    }

    // Sobreescritura del método toString
    public function __toString()
    {
        return "{$this->getTitulo()}. {$this->getAutor()} ({$this->getISBN()}).";
    }
}
