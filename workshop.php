<?php

/**
 * @Copyright
 * @package     Workshop - Content Plugin
 * @author      Viktor Vogel <admin@kubik-rubik.de>
 * @version     3.0.0 - 2020-12-09
 * @link        https://kubik-rubik.de/
 *
 * @license     GNU/GPL
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
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


