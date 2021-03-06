<?php
// +----------------------------------------------------------------------
// | Demila [ Beautiful Digital Content Trading System ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://demila.org All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Email author@demila.org
// +----------------------------------------------------------------------

_setView ( __FILE__ );
_setTitle ( $langArray ['list'] );

	$cms = new collections ( );
	
	$data = $cms->getAll(START, LIMIT);
	if(is_array($data)) {
		
		require_once ROOT_PATH.'/apps/users/models/users.class.php';
		$usersClass = new users();
		
		$users = $usersClass->getAll(0, 0, $cms->usersWhere);
		abr('users', $users);
				
	}
	abr('data', $data);

	$p = paging ( "?m=" . $_GET ['m'] . "&c=list&p=", "", PAGE, LIMIT, $cms->foundRows );
	abr ( 'paging', $p );
require_once ROOT_PATH.'/apps/lists/leftlist_admin.php';

?>