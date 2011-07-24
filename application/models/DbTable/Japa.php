<?php

class Application_Model_DbTable_Japa extends Zend_Db_Table_Abstract
{

    protected $_name = 'Entrant';
    protected $_dependentTables = array('Country', 'Sanga');
    
    public function getEntrant($entrant_id)
        {
        $entrant_id = (int)$entrant_id;
        $row = $this->fetchRow('id = ' . $entrant_id);
        if (!$row) {
        throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    
    
    public function countryGroup(){
        $select = $this->select();
        $select->from('Entrant', array('country_id'))
                ->group('country_id');
        $result = $this->fetchAll($select);
        return $result->toArray();
    }
    
    
    public function sanghaGroup(){
        $select = $this->select();
        $select->from('Entrant', array('sangha_id'))
                ->group('sangha_id');
        $result = $this->fetchAll($select);
        return $result->toArray();
    }
    
    
    public function sumJapa(){
        $select = $this->select();
        $select->from('Entrant', new Zend_Db_Expr('SUM(japa_no)'))
                ->group('country_id');
        $result = $this->fetchAll($select);
        return $result->toArray();
    }
    
    
    public function sumJapaTotal(){
        $select = $this->select();
        $select->from('Entrant', new Zend_Db_Expr('SUM(japa_no)'));
        $result = $this->fetchRow($select);
        return $result->toArray();
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

