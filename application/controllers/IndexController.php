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
class IndexController extends Zend_Controller_Action
{

    /**
     * Init()
     *
     * @return none
     */
    public function init()
    {
        // Called for every action.
    }


	/**
	 * Default Action
	 *
	 * @return null
	 */
	public function indexAction()
	{
		$this->view->headTitle('Hello World');
	}


	/**
	 * New Action
	 *
	 * @return null
	 */
	public function newTitleAction()
	{
		$this->view->headTitle('New Hello World');
	}


	/**
	 * New Action json
	 *
	 * @return null
	 */
	public function newTitleJsonAction()
	{
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();

        echo Zend_Json::encode(array('text' => 'Hello World Json'));
	}


	/**
	 * Echo Action
	 *
	 * @return null
	 */
	public function echoAction()
	{
        $text = $this->_request->getParam('text');
		$this->view->headTitle($text);
		$this->view->text = $text;
	}

}