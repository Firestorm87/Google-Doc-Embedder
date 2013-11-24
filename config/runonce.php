class GdeRunonceJob extends Controller 
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
            $arrFields = $this->Database->listFields('tl_gde'); 
            $blnDone = false; 
             
            //check for table and field 
            foreach ($arrFields as $arrField) 
            { 
                if ($arrField['name'] == 'file' && $arrField['type'] == 'varchar') 
                { 
					// Run the version 3.2 update
					if ($blnDone == false) 
					{ 
						Database\Updater::convertSingleField('tl_gde', 'file');
					} 
                } 
            } 
             
        } 
         
    } 
} 

$objGdeRunonceJob = new GdeRunonceJob(); 
$objGdeRunonceJob->run();  