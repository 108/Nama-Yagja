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
        $country = new Application_Model_DbTable_Country();
        $sangha = new Application_Model_DbTable_Sangha();
        
        
        $this->view->japa = $japa->fetchAll();     
        $countryGroup = $japa->countryGroup();
        $sumJapa = $japa->sumJapa();
        $sumJapaTotal = $japa->sumJapaTotal();
        $sumTotalArray = array();
        
        foreach($japa->sumJapaTotal() as $key => $value){
            $sumTotalArray[] = $value;
        }
        
        $this->view->sumTotal = $sumTotalArray[0];        
        
        $this->view->country = $country->findSelected($japa->countryGroup());
        
        $this->view->sangha = $sangha->findSelected($japa->sanghaGroup());

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
                    $country_name = $form->getValue('country_name');
                    $sangha_id = $form->getValue('sangha_id');
                    $firstname = $form->getValue('firstname');
                    $lastname = $form->getValue('lastname');
                    $japa_no = $form->getValue('japa_no');

                    $japa = new Application_Model_DbTable_Japa();
                    $japa->addEntrant($entrant_email, $country_name, $sangha_id, $firstname, $lastname, $japa_no, $language_code);
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







