<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tbl_category`.
 * Has foreign keys to the tables:
 *
 * - `tbl_user`
 * - `tbl_user`
 */
class m180218_073832_create_tbl_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            'idx-tbl_category-created_by',
            'tbl_category',
            'created_by'
        );

        // add foreign key for table `tbl_user`
        $this->addForeignKey(
            'fk-tbl_category-created_by',
            'tbl_category',
            'created_by',
            'tbl_user',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            'idx-tbl_category-updated_by',
            'tbl_category',
            'updated_by'
        );

        // add foreign key for table `tbl_user`
        $this->addForeignKey(
            'fk-tbl_category-updated_by',
            'tbl_category',
            'updated_by',
            'tbl_user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `tbl_user`
        $this->dropForeignKey(
            'fk-tbl_category-created_by',
            'tbl_category'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            'idx-tbl_category-created_by',
            'tbl_category'
        );

        // drops foreign key for table `tbl_user`
        $this->dropForeignKey(
            'fk-tbl_category-updated_by',
            'tbl_category'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            'idx-tbl_category-updated_by',
            'tbl_category'
        );

        $this->dropTable('tbl_category');
    }
}
