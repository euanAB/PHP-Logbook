use Phinx\Migration\AbstractMigration;

class CreateMonsterTable extends AbstractMigration
{
    public function change()
    {
        // Create a new table called 'monster'
        $table = $this->table('monster');
        
        // Add the columns to the 'monster' table
        $table->addColumn('Name', 'string', ['limit' => 20, 'null' => false])
              ->addColumn('Image', 'blob', ['null' => false])
              ->addColumn('Audio', 'blob', ['null' => false])
              ->addPrimaryKey('id')
              ->create();
    }
}
