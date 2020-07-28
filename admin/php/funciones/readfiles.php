<?php 

class ReadFiles{

    public $file_dir="";

    function __construct($name_file){        
        $this->file_dir = $name_file;
    }

    public function get_file(){
        $archivo = $this->file_dir;
        $respuesta = [];

        if (file_exists($archivo)){
            $myfile = fopen($archivo, "r");
            while(!feof($myfile)){
                $linea = fgets($myfile);
    
                if (!empty($linea)){
                    $valores = explode('/', $linea);
                    array_push($respuesta, $valores);
                }
            }
            fclose($myfile);
        }

        return $respuesta;
    }

    public function write_file($data, $sobreescribir){
        $respuesta = false;
        $archivo = $this->file_dir;        

        if (is_array($data)){
            if (count($data)>0){
                $txt = '';
                if ($sobreescribir){
                    $txt = "\n";
                }
                
                $i=0;
                foreach ($data as $key => $value) {
                    $txt .= $value;
                    $i+=1;
                    if ($i<count($data)){
                        $txt .= "/";
                    }                    
                }
                
                if ($txt!=''){            
                    if ($sobreescribir){
                        $myfile = file_put_contents($archivo, $txt, FILE_APPEND) or die("Unable to open file!");
                    }else{
                        $myfile = file_put_contents($archivo, $txt) or die("Unable to open file!");
                    }
                    
                    $respuesta = true;                    
                }
            }
        }

        return $respuesta;
    }
}