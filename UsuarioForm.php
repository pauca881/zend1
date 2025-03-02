<?php
require_once 'Zend/Form.php';

class Application_Form_UsuarioForm extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre:')
               ->setRequired(true)
               ->addValidator('StringLength', false, array(2, 100))
               ->setAttrib('class', 'form-control'); 
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email:')
              ->setRequired(true)
              ->addValidator('EmailAddress')
              ->setAttrib('class', 'form-control');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Agregar Usuario')
               ->setAttrib('class', 'btn btn-primary');
        
        // Agregar los elementos al formulario
        $this->addElements(array($nombre, $email, $submit));
    }
}
