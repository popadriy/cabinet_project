<?php
/**
  * Application bootstrap
  *
  * PHP version 5
  *
  * @category   tutorial
  * @package    Default
  * @subpackage Bootstrap
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */

/**
  * Bootstrap class
  *
  * @category   tutorial
  * @package    Default
  * @subpackage Bootstrap
  * @author     Sauciuc Dragos George <dragos.sauciuc@qinsoft.ro>
  * @since      File available since Release 1.0.1
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
	 * Initialize the viewer
	 *
	 * Sets and return the viewer
	 *
	 * @return Object Zend_View
	 */
	protected function _initView()
    {
        // Initialize view
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');

        // Add it to the ViewRenderer
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
            'ViewRenderer'
        );
        $viewRenderer->setView($view);

        // Return it, so that it can be stored by the bootstrap
        return $view;
    }

}