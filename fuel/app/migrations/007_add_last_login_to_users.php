<?php

namespace Fuel\Migrations;

class Add_last_login_to_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'last_login' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users', array(
			'last_login'
		));
	}
}