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

            $dataList = array();

            if($typeData == 'address') $arrData = $propperty['Address'];
            else if($typeData == 'information') $arrData= $propperty['Information'];
            else if ($typeData == 'description') $arrData = $propperty['Description'];

            foreach($arrData as $title => $fetchData) {
                if(gettype($fetchData) == 'array' && count($fetchData)!=0) {
                    foreach($fetchData as $key => $v) {
                        if(gettype($v)!=='array') $dataList[$key] = $v;
                        else {
                            foreach($v as $k => $fetch){
                                $dataList[$k] = $fetch;
                            }
                        }
                    }
                }else if(gettype($fetchData) != 'array'){
                    if(count($this->JsonToarray($fetchData)) > 1) {
                        $arr = $this->JsonToarray($fetchData);
                        foreach($arr as $lang => $value) {
                            $dataList[$title][$lang] = $value;
                        }    
                    }else {
                        $dataList[$title] = $fetchData;
                    }
                }
            }

            return $dataList;
        }

        function JsonToarray($array) {
            return (array) json_decode($array,TRUE);
        }
    }
?>