<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tbl_post_category`.
 * Has foreign keys to the tables:
 *
 * - `tbl_post`
 * - `tbl_category`
 * - `tbl_user`
 * - `tbl_user`
 */
class m180218_074833_create_tbl_post_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_post_category', [
            'id' => $this->primaryKey(),
            'id_post' => $this->integer(),
            'id_category' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `id_post`
        $this->createIndex(
            'idx-tbl_post_category-id_post',
            'tbl_post_category',
            'id_post'
        );

        // add foreign key for table `tbl_post`
        $this->addForeignKey(
            'fk-tbl_post_category-id_post',
            'tbl_post_category',
            'id_post',
            'tbl_post',
            'id',
            'CASCADE'
        );

        // creates index for column `id_category`
        $this->createIndex(
            'idx-tbl_post_category-id_category',
            'tbl_post_category',
            'id_category'
        );

        // add foreign key for table `tbl_category`
        $this->addForeignKey(
            'fk-tbl_post_category-id_category',
            'tbl_post_category',
            'id_category',
            'tbl_category',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            'idx-tbl_post_category-created_by',
            'tbl_post_category',
            'created_by'
        );

        // add foreign key for table `tbl_user`
        $this->addForeignKey(
            'fk-tbl_post_category-created_by',
            'tbl_post_category',
            'created_by',
            'tbl_user',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            'idx-tbl_post_category-updated_by',
            'tbl_post_category',
            'updated_by'
        );

        // add foreign key for table `tbl_user`
        $this->addForeignKey(
            'fk-tbl_post_category-updated_by',
            'tbl_post_category',
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
        // drops foreign key for table `tbl_post`
        $this->dropForeignKey(
            'fk-tbl_post_category-id_post',
            'tbl_post_category'
        );

        // drops index for column `id_post`
        $this->dropIndex(
            'idx-tbl_post_category-id_post',
            'tbl_post_category'
        );

        // drops foreign key for table `tbl_category`
        $this->dropForeignKey(
            'fk-tbl_post_category-id_category',
            'tbl_post_category'
        );

        // drops index for column `id_category`
        $this->dropIndex(
            'idx-tbl_post_category-id_category',
            'tbl_post_category'
        );

        // drops foreign key for table `tbl_user`
        $this->dropForeignKey(
            'fk-tbl_post_category-created_by',
            'tbl_post_category'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            'idx-tbl_post_category-created_by',
            'tbl_post_category'
        );

        // drops foreign key for table `tbl_user`
        $this->dropForeignKey(
            'fk-tbl_post_category-updated_by',
            'tbl_post_category'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            'idx-tbl_post_category-updated_by',
            'tbl_post_category'
        );

        $this->dropTable('tbl_post_category');
    }
}
