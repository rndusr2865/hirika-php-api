<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%org}}`.
 */
class m210726_101001_create_org_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%org}}', [
            'id' => $this->primaryKey(),
            'org_name' => $this->string()->notNull(),
            'parent_id' => $this->integer(),
        ]);
        $this->addForeignKey(
            'fk-parent_id-id',
            '{{%org}}',
            'parent_id',
            '{{%org}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%org}}');
    }
}
