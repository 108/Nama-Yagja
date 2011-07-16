<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $japa = new Application_Model_DbTable_Japa();
        $this->view->japa = $japa->fetchAll();
    }

    public function testimonialsAction()
    {
        // action body
    }

    public function registrationAction()
    {
        $form = new Application_Form_Japa();
        
        $form->submit->setLabel('Add');
        $form->cancel->setLabel('Cancel');
        $this->view->form = $form;
        $add = $this->getRequest()->getPost('submit');
        $cancel = $this->getRequest()->getPost('cancel');
        
        if ($this->getRequest()->isPost()) {
            
            if ($cancel == 'Cancel'){
                $this->_helper->redirector('index');
            } else if($add == 'Add') {
            $formData = $this->getRequest()->getPost();
                if ($form->isValid($formData)) {
                    $entrant_email = $form->getValue('entrant_email');
                    $country_id = $form->getValue('country_id');
                    $sangha_id = $form->getValue('sangha_id');
                    $firstname = $form->getValue('firstname');
                    $lastname = $form->getValue('lastname');
                    $japa_no = $form->getValue('japa_no');

                    $japa = new Application_Model_DbTable_Japa();
                    $japa->addEntrant($entrant_email, $country_id, $sangha_id, $firstname, $lastname, $japa_no, $language_code);
                    $this->_helper->redirector('index');

                } else {
                    $form->populate($formData);
                }
            }

        }
        
              
    }

    public function contactusAction()
    {
        // action body
    }


}







