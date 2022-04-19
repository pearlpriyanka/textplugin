<?php


defined('_JEXEC') || die('Restricted access');

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

class PlgContentWorkshop extends CMSPlugin
{
    protected $autoloadLanguage = true;
    
    /**
     * PlgSystemOverride constructor.
     *
     * @param object $subject
     * @param array  $config
     *
     * @throws Exception
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
    }

   public function onContentPrepare($context, &$row, &$params, $page = 0)
   {
    if($context !=='com_content.article'){
        return;
    }

    $user= Factory::getUser();

    if($user->guest){
        $promoText= $this->params->get(path:'promoText',default:'') ;
       if(!empty($promoText)){
           $row->text=$promoText.$row->text;
    }
    return;


    }

    $greeting ='<p>' . Text::sprintf( string:'PLG_CONTENT_WORKSHOP_GREETING',data: $user->username). '</p>';

    $row->text= $greeting. $row->text;

    }

}


