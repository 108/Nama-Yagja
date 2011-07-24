<?php

class Application_Form_Japa extends Zend_Form
{
    public function init()
    {
       $this->setName('japa');
        
        $entrant_email = new Zend_Form_Element_Text('entrant_email');
        $entrant_email->setLabel('Email')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setAttrib('accept-charset', 'utf-8');
        
        $country_name = new Zend_Form_Element_Select('country_name');
        $country_name->setLabel('Country Name')
                ->setRequired(true);
        
        $table = new Application_Model_DbTable_Country();
                foreach ($table->findForSelect() as $c) {
                    $country_name->addMultiOption($c->country_id, $c->country_name);
                }
                
        $sangha_name = new Zend_Form_Element_Select('sangha_name');
        $sangha_name->setLabel('Sangha Name')
                ->setRequired(true);
        
        $t = new Application_Model_DbTable_Sangha();
                foreach ($t->findForSelect() as $s) {
                    $sangha_name->addMultiOption($s->sangha_id, $s->sangha_name);
                }
        
        $firstname = new Zend_Form_Element_Text('firstname');
        $firstname->setLabel('First Name')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setAttrib('accept-charset', 'utf-8');
        
        $lastname = new Zend_Form_Element_Text('lastname');
        $lastname->setLabel('Last Name')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setAttrib('accept-charset', 'utf-8');
        
        $japa_no = new Zend_Form_Element_Text('japa_no');
        $japa_no->setLabel('Japa No')
                ->setRequired(true)
                ->addFilter('Int')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setAttrib('accept-charset', 'utf-8');
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        
        $cancel = new Zend_Form_Element_Submit('cancel');
        $cancel->setAttrib('id', 'cancel');
        
        $this->addElements(array($entrant_email, $country_name, $sangha_name, $firstname, $lastname, $japa_no, $submit, $cancel));        
    }


}

