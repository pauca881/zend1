<?php

class UsuarioController extends Zend_Controller_Action
{

    public function init()
    {
        /* Inicializador del controlador */
    }

    public function indexAction()
    {
        $usuarios = new Application_Model_Usuario();
        $this->view->usuarios = $usuarios->getUsuarios();

    }

    public function addAction()
    {
        $form = new Application_Form_UsuarioForm();
        $form->submit->setLabel('Añadir');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $nombre = $form->getValue('nombre');
                $email = $form->getValue('email');
                
                $usuarios = new Application_Model_Usuario();
                $usuarios->addUsuario(array(
                    'nombre' => $nombre,
                    'email' => $email
                ));

            // Usar FlashMessenger para mostrar un mensaje de éxito
            $this->_helper->FlashMessenger->addMessage('Usuario añadido exitosamente.');
            
            // Redirigir al listado de usuarios (acción index)
            $this->_helper->redirector('index');

            } else {
                $form->populate($formData);
            }
        }
    }

    public function editAction()
    {
        $form = new Application_Form_UsuarioForm();
        $form->submit->setLabel('Guardar');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int)$this->_getParam('id');
                $nombre = $form->getValue('nombre');
                $email = $form->getValue('email');
                
                $usuarios = new Application_Model_Usuario();
                $usuarios->updateUsuario($id, array(
                    'nombre' => $nombre,
                    'email' => $email
                ));
                
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = (int)$this->_getParam('id');
            if ($id > 0) {
                $usuarios = new Application_Model_Usuario();
                $this->view->usuario = $usuarios->getUsuario($id);
                $form->populate($this->view->usuario->toArray());
            }
        }
    }

    
public function deleteAction()
    {
        $id = (int)$this->_getParam('id');
        
        if ($id > 0) {
            $usuarios = new Application_Model_Usuario();
            $usuarios->deleteUsuario($id);
        }
        
        $this->_helper->redirector('index');
    }


}

