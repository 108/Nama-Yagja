<?php

class Application_Model_DbTable_Country extends Zend_Db_Table_Abstract
{
    protected $_name = 'Country';
    protected $_referenceMap = array('Entrant'=>array('columns'=>'country_id', 'refTableClass'=>'Entrant', 'refColumns'=>'country_id'));
    
    public function findForSelect(){
        $select = $this->select();
        return $this->fetchAll($select);
    }
    
    public function findSelected($ids){
        $select = $this->select();
        $select->from('Country')
                ->where('country_id IN (?)', $ids);
        return $this->fetchAll($select);
    }
    
  
}