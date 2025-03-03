<?php
require_once 'Zend/Db/Table/Abstract.php';

class Application_Model_Calendario extends Zend_Db_Table_Abstract
{
    protected $_id;
    protected $_fecha;
    protected $_titulo;
    protected $_descripcion;
    protected $_lugar;
    protected $_horaInicio;
    protected $_horaFin;
    
    // Constructor opcional para inicializar con un array
    public function __construct()
    {
        
    }
    
    // Método para configurar propiedades desde un array
    public function setOptions(array $options)
    {
        // $methods = get_class_methods($this);
        // foreach ($options as $key => $value) {
        //     $method = 'set' . ucfirst($key);
        //     if (in_array($method, $methods)) {
        //         $this->$method($value);
        //     }
        // }
        // return $this;
    }

    public function getCalendarios(){

        $calendarios = [];
    //$csvFile = APPLICATION_PATH . './data/fechas.csv';
    $csvFile = 'C:\laragon\www\zf1\data\fechas.csv';


 
    
    if (file_exists($csvFile)) {
        $file = fopen($csvFile, 'r');
        
        // Leer la primera línea como encabezados
        $headers = fgetcsv($file);
        
        // Procesar el resto de líneas
        while (($data = fgetcsv($file)) !== FALSE) {
            $calendario = new Application_Model_Calendario();
            $calendario->setFecha($data[0]);
            $calendario->setTitulo($data[1]);
            $calendario->setDescripcion($data[2]);
            $calendario->setLugar($data[3]);
            $calendario->setHoraInicio($data[4]);
            $calendario->setHoraFin($data[5]);

            
            $calendarios[] = $calendario;
        }
        
        fclose($file);
    }
    
    return $calendarios;


    }
    
    // Getters y setters
    public function getId()
    {
        return $this->_id;
    }
    
    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }
    
    public function getFecha()
    {
        return $this->_fecha;
    }
    
    public function setFecha($fecha)
    {
        $this->_fecha = $fecha;
        return $this;
    }
    
    public function getTitulo()
    {
        return $this->_titulo;
    }
    
    public function setTitulo($titulo)
    {
        $this->_titulo = $titulo;
        return $this;
    }
    
    public function getDescripcion()
    {
        return $this->_descripcion;
    }
    
    public function setDescripcion($descripcion)
    {
        $this->_descripcion = $descripcion;
        return $this;
    }
    
    public function getLugar()
    {
        return $this->_lugar;
    }
    
    public function setLugar($lugar)
    {
        $this->_lugar = $lugar;
        return $this;
    }
    
    public function getHoraInicio()
    {
        return $this->_horaInicio;
    }
    
    public function setHoraInicio($horaInicio)
    {
        $this->_horaInicio = $horaInicio;
        return $this;
    }
    
    public function getHoraFin()
    {
        return $this->_horaFin;
    }
    
    public function setHoraFin($horaFin)
    {
        $this->_horaFin = $horaFin;
        return $this;
    }
}
