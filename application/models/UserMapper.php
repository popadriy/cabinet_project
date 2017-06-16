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
class Application_Model_UserMapper
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
     * @return Application_Model_DbTable_User
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_User');
        }
        return $this->_dbTable;
    }


    /**
     * Save data from model, when id is set, it will try and update
     *
     * @param Application_Model_User instance
     * @return void
     */
    public function save(Application_Model_User $user)
    {
        $data = array(
            'nume_utilizator'   => $user->getNume_utilizator(),
            'parola' => $user->getParola(),
        	'nume_doctor' => $user->getNume_doctor(),
        	'specialitate' => $user->getSpecialitate(),
        );
        

        if (null === ($id_user= $user->getId_user())) {
            unset($data['id_user']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id_user = ?' => $id_user));
        }
    }


    /**
     * Find a record of Model, when found model is set
     *
     * @param $id_user
     * @return Application_Model_User
     */
    public function find($id_user, Application_Model_User $user)
    {
        $result = $this->getDbTable()->find($id_user);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $user->setId_user($row->id_user)
                  ->setNume_utilizator($row->nume_utilizator)
                  ->setParola($row->parola)
                  ->setNume_doctor($row->nume_doctor)
                  ->setSpecialitate($row->specialitate);
    }

   
    /**
     * Fetch all records from Model used
     *
     * @return array of Application_Model_User
     */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_User();
            $entry->setId_user($row->id_user)
            	  ->setNume_utilizator($row->nume_utilizator)
            	  ->setParola($row->parola)
            	  ->setNume_doctor($row->nume_doctor)
            	  ->setSpecialitate($row->specialitate);
            $entries[] = $entry;
        }
        return $entries;
    }
}
