<?php

use yii\db\Migration;

/**
 * Handles the creation of table `types`.
 */
class m170525_015514_create_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('types', [
            'id' => $this->primaryKey(),
            'description' => $this->string(255)->unique()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('types');
    }
}
