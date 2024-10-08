<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCustomers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('customers');
        $table->addColumn('name', 'string', ['limit' => 255, 'null' => false]);
        $table->addColumn('nik', 'string', ['limit' => 20, 'null' => false]);
        $table->addColumn('phone', 'string', ['limit' => 20, 'null' => false]);
        $table->addColumn('email', 'string', ['limit' => 100]);
        $table->addColumn('address', 'text', ['null' => false]);
        $table->addColumn('created', 'datetime', ['null' => false]);
        $table->addColumn('modified', 'datetime', ['null' => false]);
        $table->create();
    }
}
