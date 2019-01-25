<?php
require 'vendor/autoload.php';
$xmlfile_1 = './propertyCreate1.xml';
$xmlfile_2 = './propertyCreate2.xml';
    class genXml {
        function genXmltoArray($file) {
            $xmlfile = $file;

            $xmlObj = simplexml_load_file($xmlfile);
            $xmltoJson = json_encode($xmlObj);

            $properties = json_decode($xmltoJson,TRUE);
            return $properties['Properties'];
        }
        
        function extractAllDataBytype($data,$typeData) {
            
            $log = Logger::getLogger("extractalldata");
            $typeData = strtolower($typeData);
            $propperty = $data['Property'];

            if($typeData == 'address') $arrData = $propperty['Address'];
            else if($typeData == 'information') $arrData= $propperty['Information'];
            else if ($typeData == 'description') $arrData = $propperty['Description'];

            foreach($arrData as $title => $fetchData) {
                if(gettype($fetchData) == 'array' && count($fetchData)!=0) {
                    foreach($fetchData as $key => $v) {
                        if(gettype($v)!=='array') $log->info('Key is : '.$key.' And value is : '.$v.'</br>');
                        else {
                            foreach($v as $k => $fetch){
                                $log->info($k.' is : '.$fetch.'</br>');
                            }
                        }
                    }
                }else if(gettype($fetchData) != 'array'){
                    if(count($this->JsonToarray($fetchData)) > 1) {
                        $arr = $this->JsonToarray($fetchData);
                        foreach($arr as $lang => $value) {
                            if($value != null) $log->info($title.' lang '.$lang.' '.$value.'</br>');
                        }
                        echo '</br>';    
                    }else {
                        $log->info($title.' is : '.$fetchData.'</br>');
                    }
                }
            }
        }

        function JsonToarray($array) {
            return (array) json_decode($array,TRUE);
        }
    }
    $log = Logger::getLogger("propertydata");

    $properties = new genXml();
    $propData = $properties->genXmltoArray($xmlfile_1);
    
    $log->info('Address <br/>');
    $properties->extractAllDataBytype($propData,'Address');

    $log->info('<br/><br/><br/> Information <br/>');
    $properties->extractAllDataBytype($propData,'Information');
    
    $log->info('<br/><br/><br/> Description <br/>');
    $properties->extractAllDataBytype($propData,'Description');
?>