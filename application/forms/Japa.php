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
        
        $country_id = new Zend_Form_Element_Text('country_id');
        $country_id->setLabel('Country ID')
                ->setRequired(true)
                ->addFilter('Int')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setAttrib('accept-charset', 'utf-8');
        
        $sangha_id = new Zend_Form_Element_Text('sangha_id');
        $sangha_id->setLabel('Sangha ID')
                ->setRequired(true)
                ->addFilter('Int')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty')
                ->setAttrib('accept-charset', 'utf-8');
        
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
        
        $this->addElements(array($entrant_email, $country_id, $sangha_id, $firstname, $lastname, $japa_no, $submit, $cancel));        
    }


}

