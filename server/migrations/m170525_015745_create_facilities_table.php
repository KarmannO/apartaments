<?php

use yii\db\Migration;

/**
 * Handles the creation of table `facilities`.
 */
class m170525_015745_create_facilities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('facilities', [
            'id' => $this->primaryKey(),
            'description' => $this->string(255)->unique()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('facilities');
    }
}
