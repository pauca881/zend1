<?php
require_once 'Zend/Db/Table/Abstract.php';


class Application_Model_Usuario extends Zend_Db_Table_Abstract
{


    // public function __construct()
    // {
    //     $this->_dbTable = new Zend_Db_Table('usuarios');
    // }

    //Nombre de la tabla
    protected $_name = 'usuarios';

    //Clave primaria de la tabla
    protected $_primary = 'id';
    
    public function getUsuarios()
    {
        return $this->fetchAll();
        //return $this->_dbTable->fetchAll();

        //consulta personalizada
//        $select = $this->select()
//                   ->where('fecha_inicio >= ?', $inicio)
 //                  ->where('fecha_fin <= ?', $fin);
    
 //   return $this->fetchAll($select);

    }
    
    public function getUsuario($id)
    {
        $id = (int)$id;
        return $this->find($id)->current();
    }
    
    public function addUsuario($data)
    {
        $data = array(
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            // La fecha_creacion se genera automáticamente si configuraste CURRENT_TIMESTAMP
        );
        
        return $this->insert($data);
    }
    
    public function updateUsuario($id, $data)
    {
        $id = (int)$id;
        $data = array(
            'nombre' => $data['nombre'],
            'email' => $data['email']
        );
        
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        return $this->update($data, $where);
    }
    
    public function deleteUsuario($id)
    {
        $id = (int)$id;
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        return $this->delete($where);
    }

}

