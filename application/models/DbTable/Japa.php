<?php

class Application_Model_DbTable_Japa extends Zend_Db_Table_Abstract
{

    protected $_name = 'Entrant';
    
    public function getEntrant($entrant_id)
        {
        $entrant_id = (int)$entrant_id;
        $row = $this->fetchRow('id = ' . $entrant_id);
        if (!$row) {
        throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    
    public function addEntrant($entrant_email, $country_id, $sangha_id, $firstname, $lastname, $japa_no)
        {
        $data = array(
        'entrant_email' => $entrant_email,
        'country_id' => $country_id,
        'sangha_id' => $sangha_id,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'japa_no' => $japa_no,
        );
        $this->insert($data);
    }

}

