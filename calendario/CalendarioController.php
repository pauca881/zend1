<?php

class CalendarioController extends Zend_Controller_Action
{

    public function init()
    {

    }

    public function indexAction()
    {
        $calendarios = new Application_Model_Calendario();
        $this->view->calendarios = $calendarios->getCalendarios();
    
    }


}

