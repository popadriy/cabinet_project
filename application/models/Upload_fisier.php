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
class Application_Model_Upload_Fisier
{
	protected $_id_upload;
	protected $_id_pacient;
	protected $_fisier;
	
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
		
	
	
	public function setId_upload($id_upload)
	{
		$this->_id_upload= (int) $id_upload;
		return $this;
	}
	
	public function getId_upload()
	{
		return $this->_id_upload;
	}
	
	
	public function setId_pacient($id_pacient)
	{
		$this->_id_pacient= (int) $id_pacient;
		return $this;
	}
	
	public function getId_pacient()
	{
		return $this->_id_pacient;
	}
	
	
	public function setFisier($fisier)
	{
		$this->_fisier= $fisier;
		return $this;
	}
	
	public function getFisier()
	{
		return $this->_fisier;
	}
}