<?php

class Application_Model_DbTable_Sangha extends Zend_Db_Table_Abstract
{
    protected $_name = 'Sangha';
    protected $_referenceMap = array('Entrant'=>array('columns'=>'sangha_id', 'refTableClass'=>'Entrant', 'refColumns'=>'sangha_id'));
    
    public function findForSelect(){
        $select = $this->select();
        return $this->fetchAll($select);
    }
    
    public function findSelected($ids){
        $select = $this->select();
        $select->from('Sangha')
                ->where('sangha_id IN (?)', $ids);
        return $this->fetchAll($select);
    }
}
