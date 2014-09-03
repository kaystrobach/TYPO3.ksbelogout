<?php

namespace KayStrobach\Ksbelogout\Xclass;

/**
 * Class LogoutController
 *
 * XClass for redirecting to the given URL
 *
 * @package KayStrobach\Ksbelogout\Xclass
 */
class LogoutController extends \TYPO3\CMS\Backend\Controller\LogoutController {
	/**
	 * Performs the logout processing
	 *
	 * @return    void
	 */
	public function logout() {
		// Logout written to log
		$GLOBALS['BE_USER']->writelog(
			255,
			2,
			0,
			1,
			'User %s logged out from TYPO3 Backend',
			array(
				$GLOBALS['BE_USER']->user['username']
			)
		);

		// logout
		$GLOBALS['BE_USER']->logoff();

		// get target
		$options = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['ksbelogout']);
		$target  = $options['uri'];

		// redirect
		\TYPO3\CMS\Core\Utility\HttpUtility::redirect($target);

	}
}