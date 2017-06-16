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
class Application_Model_GuestbookMapper
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
     * @return Application_Model_DbTable_ConsultAnaliza
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_ConsultAnaliza');
        }
        return $this->_dbTable;
    }


    /**
     * Save data from model, when id is set, it will try and update
     *
     * @param Application_Model_ConsultAnaliza instance
     * @return void
     */
    public function save(Application_Model_ConsultAnaliza $consultAnaliza)
    {
        $data = array(
            'id_analiza'   => $consultAnaliza->getId_analiza(),
            'id_consult' => $consultAnaliza->getId_consult(),
        );
        
        /** daca aici nu avem nevoie de incrementare id ci este un tabel 
         * de lagatura acesta trebuie sters?*/

        if (null === ($id = $consultAnaliza->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }


    /**
     * Find a record of Model, when found model is set
     *
     * @param $id
     * @return Application_Model_ConsultAnaliza
     */
    public function find($id, Application_Model_ConsultAnaliza $consultAnaliza)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $consultAnaliza->setId_analiza($row->id_analiza)
        			   ->setId_consult($row->id_consult);
    }


    /**
     * Fetch all records from Model used
     *
     * @return array of Application_Model_ConsultAnaliza
     */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_ConsultAnaliza();
            $entry->setId_analiza($row->id_analiza)
            ->setId_consult($row->id_consult);
            $entries[] = $entry;
        }
        return $entries;
    }
}
