<?PHP class GdeRunonceJob extends Controller 
{ 
    public function __construct() 
    { 
        parent::__construct(); 
        $this->import('Database'); 
    } 
    public function run() 
    { 
        //Check for update to C3.2 
        if ($this->Database->tableExists('tl_gde')) 
        { 
            //check for table and field 
            foreach ($this->Database->listFields('tl_gde') as $arrField) 
            { 
                if ($arrField['name'] == 'file' && $arrField['type'] == 'varchar') 
                { 
					// Run the version 3.2 update 
					$this->Database->execute("ALTER TABLE `tl_gde` ADD `file_uuid` binary(16) NULL");
					$this->Database->execute("UPDATE `tl_gde` SET `file_uuid`=(SELECT `uuid` FROM `tl_files` WHERE `id` = `file`)");
					$this->Database->execute("ALTER TABLE `tl_gde` DROP COLUMN `file`");
                } 
            } 
        } 
    } 
} 

$objGdeRunonceJob = new GdeRunonceJob(); 
$objGdeRunonceJob->run();
?>