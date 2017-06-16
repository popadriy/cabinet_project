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
class Application_Model_ScrisoareMedicala
{
	protected $_id_vizite;
	protected $_scrisoare_medicala;
	protected $_id_user;
	protected $_id_consult;
	
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
		
	
	
	public function setId_vizite($id_vizite)
	{
		$this->_id_vizite= (int) $id_vizite;
		return $this;
	}
	
	public function getId_vizite()
	{
		return $this->_id_vizite;
	}
	
	
	
	public function setScrisoareMedicala($scrisoareMedicala)
	{
		$this->_scrisoare_medicala= (string) $scrisoareMedicala;
		return $this;
	}
	
	public function getScrisoareMedicala()
	{
		return $this->_scrisoare_medicala;
	}
	
	
	public function setId_user($id_user)
	{
		$this->_id_user= (int) $id_user;
		return $this;
	}
	
	public function getId_user()
	{
		return $this->_id_user;
	}
	
	
	public function setId_consult($id_consult)
	{
		$this->_id_consult = (int) $id_consult ;
		return $this;
	}
	
	public function getId_consult()
	{
		return $this->_id_consult ;
	}
}