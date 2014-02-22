<?php
/**
 * Category list test
 *
 * @package None
 * @subpackage None
 *
 * @copyright Copyright (C) 2014 Jonathan M. Cameron, All Rights Reserved
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author Jonathan M. Cameron
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


/**
 * The class for the category list test
 *
 * @package None
 */
class plgContentCategory_list_test extends JPlugin
{
	   /**
	    * Constructor
	    *
	    * @param object $subject The object to observe
	    * @param array $config  An optional associative array of configuration settings.
	    * Recognized key values include 'name', 'group', 'params', 'language'
	    * (this list is not meant to be comprehensive).
	    */
	   public function __construct(&$subject, $config = array())
	   {
		   parent::__construct($subject, $config);

		   // Always load the language
		   $this->loadLanguage();
	   }

	/**
	 * The content plugin that inserts the attachments list into content items
	 *
	 * @param string The context of the content being passed to the plugin.
	 * @param &object &$row the content object (eg, article) being displayed
	 * @param &object &$params the parameters
	 * @param int $page the 'page' number
	 *
	 * @return true if anything has been inserted into the content object
	 */
	public function onContentPrepare($context, &$row, &$params, $page = 0)
	{
		$title_array = array('com_content.category.title', 'com_newsfeeds.category.title', 'com_contact.category.title', 'com_weblinks.category.title');
		
		if (in_array($context, $title_array))
		{
			$row->text .= " [CATEGORY TITLE!]";
			return true;
		}

		$desc_array = array('com_content.category', 'com_newsfeeds.category', 'com_contact.category', 'com_weblinks.category');
		
		if (in_array($context, $desc_array))
		{
			$row->text .= " [CATEGORY DESCRIPTION?]";
			return true;
		}

		return false;
	}
}
