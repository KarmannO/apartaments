<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rel_apartaments_facilities`.
 */
class m170525_021344_create_rel_apartaments_facilities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rel_apartaments_facilities', [
            'apartament' => $this->integer()->notNull(),
            'facility' => $this->integer()->notNull()
        ]);
        $this->createIndex('rel_apartaments_facilities_ap_index', 'rel_apartaments_facilities', 'apartament', false);
        $this->createIndex('rel_apartaments_facilities_fa_index', 'rel_apartaments_facilities', 'facility', false);
        $this->addForeignKey('rel_apartaments_facilities_ap_fk', 'rel_apartaments_facilities', 'apartament', 'apartaments', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('rel_apartaments_facilities_fa_fk', 'rel_apartaments_facilities', 'facility', 'facilities', 'id', 'CASCADE', 'CASCADE');
        $this->addPrimaryKey('rel_apartaments_facilities_pk', 'rel_apartaments_facilities', ['apartament', 'facility']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('rel_apartaments_facilities_ap_fk', 'rel_apartaments_facilities');
        $this->dropForeignKey('rel_apartaments_facilities_fa_fk', 'rel_apartaments_facilities');
        $this->dropIndex('rel_apartaments_facilities_ap_index', 'rel_apartaments_facilities');
        $this->dropIndex('rel_apartaments_facilities_fa_index', 'rel_apartaments_facilities');
        $this->dropTable('rel_apartaments_facilities');
    }
}
