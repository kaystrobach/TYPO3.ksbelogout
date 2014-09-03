<?php

namespace KayStrobach\Ksbelogout\Xclass;

class LogoutController extends \TYPO3\CMS\Backend\Controller\LogoutController {
    /**
     * Performs the logout processing
     *
     * @return    void
     */
    function logout()    {
        // logout
        $GLOBALS['BE_USER']->writelog(
			255,2,0,1,'User %s logged out from TYPO3 Backend',
			Array($GLOBALS['BE_USER']->user['username']));    // Logout written to log
        $GLOBALS['BE_USER']->logoff();

        // get target
			$options = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['ksbelogout']);
			$target  = $options['uri'];
        // redirect

		\TYPO3\CMS\Core\Utility\HttpUtility::redirect($target);
        
    }


}



?>