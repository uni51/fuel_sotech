<?php

namespace Fuel\Migrations;

class Create_article_category
{
	public function up()
	{
		\DBUtil::create_table('article_category', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'article_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'category_id' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('article_category');
	}
}