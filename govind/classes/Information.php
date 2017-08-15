<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/15/2017
 * Time: 2:45 PM
 */

class Information {

    private $_db,
            $_data;
           

    public function __construct() {
        $this->_db = DB::getIntance();
    
    }

    public function create($fields = array()) {
        if (!$this->_db->insert('information', $fields)) {
            throw new Exception("There was a problem creating an information");
        }
    }

 
    public function getInformation() {
       
            $data = $this->_db->get('information',[]);

            if ($data->count()) {
                $this->_data = $data->result();
                return true;
            } else {
                return false;
            }
        }
      
    


    public function data() {
        return $this->_data;
    }

 

}

?>