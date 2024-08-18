<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%applications}}`.
 */
class m240816_130444_create_applications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%applications}}', [
            'id' => $this->bigPrimaryKey(),
            'full_name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->null(),
            'phone' => $this->string(13)->null(),
            'message' => $this->text()->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)->comment('0 - на рассмотрении, 1 - одобрено, 2 - отклонено'),
            'moderator_comment' => $this->text()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%applications}}');
    }
}
