<?php
namespace App\Core;
class Router{
    private $get,$post;
    public function __construct(){
        $this->get=[];
        $this->post=[];
        
        
}
    public function set_route($method,$url,$route){
        if ($method=="post"){
            $this->post[$url]=$route;
            
            
        }
        if($method=="get"){
            
            $this->get[$url]=$route;
            
        }
    }
    public function get($req){
        if($req["REQUEST_METHOD"]=="GET" && isset($this->get[$req["REQUEST_URI"]])){
            //var_dump(getallheaders());
            return $this->get[$req["REQUEST_URI"]];
}
    if ($req["REQUEST_METHOD"]=="POST" && isset($this->post[$req["REQUEST_URI"]])){
    
    
        return $this->post[$req["REQUEST_URI"]];
    }
        else{
        
            
            return "";
        }
    }
}

?>