<?php 
    require('genxml.php');

    $xmlfile_1 = './propertyCreate1.xml';
    $xmlfile_2 = './propertyCreate2.xml';

    $log = Logger::getLogger("propertydata");

    $properties = new genXml();
    $propData = $properties->genXmltoArray($xmlfile_1);
    
    $address = $properties->extractAllDataBytype($propData,'Description');
?>