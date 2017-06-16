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
class Application_Model_AnalizaMapper
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
     * @return Application_Model_DbTable_Analiza
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Analiza');
        }
        return $this->_dbTable;
    }


    /**
     * Save data from model, when id is set, it will try and update
     *
     * @param Application_Model_Analiza instance
     * @return void
     */
    public function save(Application_Model_Analiza $analiza)
    {
        $data = array(
            'tip_analiza'   => $analiza->getTip_analiza(),
            
        );

        if (null === ($id_analiza = $analiza->getId_analiza())) {
            unset($data['id_analiza']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id_analiza = ?' => $id_analiza));
        }
    }


    /**
     * Find a record of Model, when found model is set
     *
     * @param $id
     * @return Application_Model_Analiza
     */
    public function find($id_analiza, Application_Model_Analiza $analiza)
    {
    	$result = $this->getDbTable()->find($id_analiza);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $analiza->setId_examinare($row->id_examinare)
                  ->setTip_examinare($row->tip_examinare);
    }


    /**
     * Fetch all records from Model used
     *
     * @return array of Application_Model_Analiza
     */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Analiza();
            $entry->setId_examinare($row->id_examinare)
            ->setTip_examinare($row->tip_examinare);
            $entries[] = $entry;
        }
        return $entries;
    }
}
