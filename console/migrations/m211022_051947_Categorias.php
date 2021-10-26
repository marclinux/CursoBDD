<?php

use yii\db\Migration;

/**
 * Class m211022_051947_Categorias
 */
class m211022_051947_Categorias extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        
        $this->createTable('{{%categorias}}', [
                'id' => $this->primaryKey(),
                'ClaveCategoria' => $this->string(20)->unique(),
                'NombreCategoria' => $this->string(200)->unique(),
                'Activo' => $this->boolean(),
                'idCategoriaPadre' => $this->integer(),
            ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categorias}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211022_051947_Categorias cannot be reverted.\n";

        return false;
    }
    */
}
