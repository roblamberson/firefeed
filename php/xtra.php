<?php

class place {
    
    public $id;
    public $catalogue;
    public $name;
    public $notes;
    private $result;
    
    public function __construct( $params = false ){
        
        if( is_array( $params ) ){
            
            if( $params["id"] >= 1 ){
				
				$this->id = $params["id"];
				
				if( isset( $params["name"] ) ){
					
					if( $params["name"] == "delete place" ){
						
						$this->result = $this->del( $this->id );
						
					}else{
						
						$this->name = $params["name"];
						$this->notes = $params["notes"];
						$this->result = $this->update();
						
					}
					
				}
                
            }else if( $params["id"] == "xx" ){
                
                $this->name = $params["name"];
                $this->notes = $params["notes"];
                $this->result = "basic unit";
                $this->id = $this->insertNew();
                
            }
            
        }else{
                $this->catalogue = $this->listThemAll();
        }
        
    }
	
	public function vw(){
		
		return $this->result;
		
	}
    
    public function insertNew(){
        
        global $database;
		
        $database->insert("places", [
            "name" => $this->name,
            "notes" => $this->notes,
            "harmony" => $this->result
        ]);
        
        $this->id = $database->id();
        
        return $this->id;
		
    }
    
    public function listThemAll(){	global $database;
        
        return $database->select("places", "*", ["harmony"=>"basic unit"]);
        
    }
	   
    public function del( $id ){
		
		global $database;
		
		$database->update( "places", [ "harmony" => "trash value" ], [ "id" => $id ]);
		
		return $id;
		
	}
	
    public function update(){ global $database;
		
		return $database->update( "places", [ "name" => $this->name, "notes" => $this->notes ], [ "id" => $this->id ]) ? $this->id : false;
		
	}		
    
    	
	
    
}

class beer {
    
    public $id;
    public $btype;
    public $catalogue;
    public $name;
    public $notes;
	public $in_use;
    private $result;
    
    public function __construct( $params ){
        
        if( is_array( $params ) ){
            
            if( $params["id"] >= 1 && isset( $params["name"] ) ){
				
				$this->id = $params["id"];
				
				if( $params["name"] == "delete" ){
					
					$this->id = $this->del( $this->id ); // should be 1
					
				}else if( $params["name"] != "delete" ){
				
					$this->name = $params["name"];
					
					$this->btype = $params["btype"];
				
					$this->notes = $params["notes"];
				
					$this->id = $this->update(); // should be 1
					
				}
				
				
            }else if( $params["id"]  == 0 || $params["id"]  == "0" ){
                
				$this->name = $params["name"];
				
				$this->btype = $params["btype"];

				$this->notes = $params["notes"];
				
				$this->in_use = 1;

				$this->result = $this->insertNewBeer();
                
            }
            
        }else{
			
            $this->catalogue = $this->listBeers();
        
		}
        
    }
    
    public function insertNewBeer(){
        
        global $database;
        
        $database->insert("beers", ["name" => $this->name, 
		
		"btype" => $this->btype,
		
		"in_use" => $this->in_use,
		
		"notes" => $this->notes]);
       
        $this->id = $database->id();
		
        return $this->id;
		
    }
    
    public function listBeers(){
        
        global $database;
        
        return $database->select( "beers", '*', [ "in_use" => 1 ] );
        
    }
    
    public function del( $id ){
		
		global $database;
		
		$database->update( "beers", [ "in_use" => 0 ], [ "id" => $id ]);
		
		return true;
		
	}

    public function update(){ global $database;
		
		return $database->update( "beers", [ "name" => $this->name, "btype" => $this->btype, "notes" => $this->notes ], [ "id" => $this->id ]) ? $this->id : false;
		
	}		
    
    
}


?>