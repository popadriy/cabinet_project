<?php
/**
  * ModelMapper file
  *
  * PHP version 5
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */

/**
  * ModelMapper class
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */
class Application_Model_ExaminareMapper
{
    /**
     * Zend db table object
     *
     * @var Zend_Db_Table_Abstract
     */

    protected $_dbTable;


	/**
	 * Set db table object
	 *
	 * @param string $dbTable
	 * @return this mapper class instance
	 */
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }


    /**
     * Return instance of Zend_Db_Table_Abstract set for this mapper
     *
     * @return Application_Model_DbTable_Examinare
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Examinare');
        }
        return $this->_dbTable;
    }


    /**
     * Save data from model, when id is set, it will try and update
     *
     * @param Application_Model_Examinare instance
     * @return void
     */
    public function save(Application_Model_Examinare $examinare)
    {
        $data = array(
            'tip_examinare'   => $examinare->getTip_examinare(),
            'pret_examinare' => $examinare->getPret_examinare(),
           
        );

        if (null === ($id_examinare = $examinare->getId_examinare())) {
            unset($data['id_examinare']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id_examinare = ?' => $id_examinare));
        }
    }


    /**
     * Find a record of Model, when found model is set
     *
     * @param $id
     * @return Application_Model_Examinare
     */
    public function find($id_examinare, Application_Model_Examinare $examinare)
    {
    	$result = $this->getDbTable()->find($id_examinare);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $examinare->setId_examinare($row->id_examinare)
                  ->setTip_examinare($row->tip_examinare)
                  ->setPret_examinare($row->pret_examinare);
    }


    /**
     * Fetch all records from Model used
     *
     * @return array of Application_Model_Examinare
     */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Examinare();
            $entry->setId_examinare($row->id_examinare)
            	  ->setTip_examinare($row->tip_examinare)
            	  ->setPret_examinare($row->pret_examinare);
            $entries[] = $entry;
        }
        return $entries;
    }
}
