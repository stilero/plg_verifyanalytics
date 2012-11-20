<?php
/**
 * Description of Plugin_Verify_Analytics
 *
 * @version  1.0
 * @author Daniel Eliasson (joomla@stilero.com)
 * @copyright  (C) 2012-nov-20 Stilero Webdesign (www.stilero.com)
 * @category Plugins
 * @license	GPLv2
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

// import library dependencies
jimport('joomla.plugin.plugin');

class plgContentVerifyanalytics extends JPlugin {

    public function __construct(&$subject, $config = array()) {
        parent::__construct($subject, $config);
    }
    
    /**
     * Method is called by the view
     * 
     * @var string  $context    The context of the content passed to the plugin
     * @var object  $article    content object. Note $article->text is also available
     * @var object  $params     content params
     * @var integer $limitstart The 'page' number
     * @return void
     * @since 1.6
     */        
    public function onContentPrepare($context, &$article, &$params, $limitstart=0){
        $meta = '<meta name="google-site-verification" content="'.$this->params->def('meta_code').'" />';
        $document =& JFactory::getDocument();
        if($document->getType() !== 'html'){
            return;
        }
        $document->addCustomTag($meta);
    }
} //End Class