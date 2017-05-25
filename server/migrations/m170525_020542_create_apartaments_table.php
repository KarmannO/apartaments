<?php

use yii\db\Migration;

/**
 * Handles the creation of table `apartaments`.
 */
class m170525_020542_create_apartaments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('apartaments', [
            'id' => $this->primaryKey(),
            'address' => $this->string(255)->notNull(),
            'capacity' => $this->integer()->notNull(),
            'area' => $this->integer()->notNull(),
            'time_arrive' => $this->time()->notNull(),
            'time_departure' => $this->time()->notNull(),
            'price_daily' => $this->integer()->notNull(),
            'price_weekly' => $this->integer()->notNull(),
            'price_monthly' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull()
        ]);
        $this->createIndex('apartaments_type_index', 'apartaments', 'type');
        $this->addForeignKey('apartaments_type_fk', 'apartaments', 'type', 'types', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('apartaments_type_fk', 'apartaments');
        $this->dropIndex('apartaments_type_index', 'apartaments');
        $this->dropTable('apartaments');
    }
}
