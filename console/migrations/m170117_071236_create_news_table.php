<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170117_071236_create_news_table extends Migration
{
    protected $tableName = '{{%news}}';
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'active' => $this->boolean(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'photo' => $this->text()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
