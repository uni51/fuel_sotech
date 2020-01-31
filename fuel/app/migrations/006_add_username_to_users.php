<?php

namespace Fuel\Migrations;

class Add_username_to_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'username' => array('constraint' => 50, 'null' => false, 'type' => 'varchar'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users', array(
			'username'
		));
	}
}