<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tbl_post`.
 * Has foreign keys to the tables:
 *
 * - `tbl_user`
 * - `tbl_user`
 * - `tbl_user`
 */
class m180218_074526_create_tbl_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_post', [
            'id' => $this->primaryKey(),
            'post_author' => $this->integer(),
            'post_title' => $this->string()->notNull(),
            'post_content' => $this->text()->notNull(),
            'post_date_create' => $this->dateTime(),
            'post_date_create_gmt' => $this->dateTime(),
            'post_date_update' => $this->dateTime(),
            'post_date_update_gmt' => $this->dateTime(),
            'post_status' => $this->integer()->notNull(),
            'post_allow_comment' => $this->boolean()->notNull()->default(1),
            'post_comment_count' => $this->integer()->notNull()->default(0),
            'post_type' => $this->integer()->notNull()->default(1),
            'post_image' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `post_author`
        $this->createIndex(
            'idx-tbl_post-post_author',
            'tbl_post',
            'post_author'
        );

        // add foreign key for table `tbl_user`
        $this->addForeignKey(
            'fk-tbl_post-post_author',
            'tbl_post',
            'post_author',
            'tbl_user',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            'idx-tbl_post-created_by',
            'tbl_post',
            'created_by'
        );

        // add foreign key for table `tbl_user`
        $this->addForeignKey(
            'fk-tbl_post-created_by',
            'tbl_post',
            'created_by',
            'tbl_user',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            'idx-tbl_post-updated_by',
            'tbl_post',
            'updated_by'
        );

        // add foreign key for table `tbl_user`
        $this->addForeignKey(
            'fk-tbl_post-updated_by',
            'tbl_post',
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
            'fk-tbl_post-post_author',
            'tbl_post'
        );

        // drops index for column `post_author`
        $this->dropIndex(
            'idx-tbl_post-post_author',
            'tbl_post'
        );

        // drops foreign key for table `tbl_user`
        $this->dropForeignKey(
            'fk-tbl_post-created_by',
            'tbl_post'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            'idx-tbl_post-created_by',
            'tbl_post'
        );

        // drops foreign key for table `tbl_user`
        $this->dropForeignKey(
            'fk-tbl_post-updated_by',
            'tbl_post'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            'idx-tbl_post-updated_by',
            'tbl_post'
        );

        $this->dropTable('tbl_post');
    }
}
