<?php

/**
  * Index page controller
  *
  * PHP version 5
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */

/**
  * Controller class
  *
  * @category   tutorial
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */
class UserController extends Zend_Controller_Action
{

    /**
     * Init()
     *
     * @return none
     */
    public function init()
    {
        // Called for every action.
         $this->_helper->layout->setLayout('user');
    }


	/**
	 * Default Action
	 *
	 * @return null
	 */
	public function indexAction()
	{
        $user = new Application_Model_UserMapper();
        $this->view->entries = $user->fetchAll();
	}
	
	
	/**
	 * Sign Action
	 *
	 * @return null
	 */
	public function signAction()
	{
		$request = $this->getRequest();
		$form    = new Application_Form_User();
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($request->getPost())) {
				$comment = new Application_Model_User($form->getValues());
				$mapper  = new Application_Model_UserMapper();
				$mapper->save($comment);
				return $this->_helper->redirector('index');
			}
		}
		
		$this->view->form = $form;
	}
	
	
	/**
	 * Sign Action
	 *
	 * @return null
	 */
	public function findAction()
	{
		$mapper  = new Application_Model_UserMapper();
		$resObjArr = $mapper->findUser('dr_marcel');
		var_dump($resObjArr);die();
	}
}