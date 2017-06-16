<?php
/**
  * Model file
  *
  * PHP version 5
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */

/**
  * Table Model class
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */
class Application_Model_User
{
	protected $_id_user;
    protected $_nume_utilizator;
    protected $_parola;
    protected $_nume_doctor;
    protected $_specialitate;

    public function __construct(array $options = null)
    {
    	if (is_array($options)) {
    		$this->setOptions($options);
    	}
    }
    public function __set($name, $value)
    {
    	$method = 'set' . $name;
    	if (('mapper' == $name) || !method_exists($this, $method)) {
    		throw new Exception('Invalid user property');
    	}
    	$this->$method($value);
    }
    public function __get($name)
    {
    	$method = 'get' . $name;
    	if (('mapper' == $name) || !method_exists($this, $method)) {
    		throw new Exception('Invalid user property');
    	}
    	return $this->$method();
    }
    public function setOptions(array $options)
    {
    	$methods = get_class_methods($this);
    	foreach ($options as $key => $value) {
    		$method = 'set' . ucfirst($key);
    		if (in_array($method, $methods)) {
    			$this->$method($value);
    		}
    	}
    	return $this;
    }


    public function setId_user($id_user)
    {
        $this->_id_user = (int) $id_user;
        return $this;
    }

    public function getId_user()
    {
    	return $this->_id_user;
    }
    
    
    public function setNume_utilizator($nume_utilizator)
    {
    	$this->_nume_utilizator = (string) $nume_utilizator;
    	return $this;
    }
    
    public function getNume_utilizator()
    {
    	return $this->_nume_utilizator;
    }
    
    
    public function setParola($pass)
    {
    	$this->_parola = (string) $pass;
    	return $this;
    }
    
    public function getParola()
    {
    	return $this->_parola;
    }
    
    
    public function setNume_doctor($nume_doctor)
    {
    	$this->_nume_doctor= (string) $nume_doctor;
    	return $this;
    }
    
    public function getNume_doctor()
    {
    	return $this->_nume_doctor;
    }
    
    
    public function setSpecialitate($specialitate)
    {
    	$this->_specialitate= (string) $specialitate;
    	return $this;
    }
    
    public function getSpecialitate()
    {
    	return $this->_specialitate;
    }
}