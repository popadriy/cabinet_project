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
class Application_Model_Analiza
{

    protected $_id_analiza;
    protected $_tip_analiza;

    public function __construct(array $options = null)
    {
    	if (is_array($options)) {
    		$this->setOptions($options);
    	}
    }
    
    public function __set($nume, $value)
    {
    	
    	$numeArr = explode('_', $key);
    	$final = '';
    	foreach ($numeArr as $partialName) {
    		$final .= ucfirst($partialName);
    	}
    	
    	$method = 'set' . $final;
    	if (('mapper' == $nume) || !method_exists($this, $method)) {
    		throw new Exception('Invalid pacient property');
    	}
    	$this->$method($value);
    }
    
    public function __get($nume)
    {
    	$numeArr = explode('_', $nume);
    	$final = '';
    	foreach ($numeArr as $partialName) {
    		$final .= ucfirst($partialName);
    	}
    	$method = 'get' . $final;
    	
    	if (('mapper' == $nume) || !method_exists($this, $method)) {
    		var_dump($method);die();
    		throw new Exception('Invalid pacient property');
    	}
    	return $this->$method();
    }
    
    public function setOptions(array $options)
    {
    	$methods = get_class_methods($this);
    	foreach ($options as $key => $value) {
    		$numeArr = explode('_', $key);
    		$final = '';
    		foreach ($numeArr as $partialName) {
    			$final .= ucfirst($partialName);
    		}
    		
    		$method = 'set' . $final;
    		if (in_array($method, $methods)) {
    			$this->$method($value);
    		}
    	}
    	return $this;
    }

   

    public function setId_analiza($id_analiza)
    {
    	$this->_id_analiza = (int) $id_analiza;
        return $this;
    }

    public function getId_analiza()
    {
    	return $this->_id_analiza;
    }
    
    
    public function setTip_analiza($tip_analiza)
    {
    	$this->_tip_analiza = (string) $tip_analiza;
    	return $this;
    }
    
    public function getTip_analiza()
    {
    	return $this->_tip_analiza;
    }
}