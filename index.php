<?php 
    require('genxml.php');
    require('adddatatodb.php');
    
    $xmlfile_1 = 'propertyCreate1.xml';
    $xmlfile_2 = 'propertyCreate2.xml';
    
    // $log = Logger::getLogger("propertydata");

    $properties = new genXml();
    $propData = $properties->genXmltoArray($xmlfile_1);
    
    $address = $properties->extractAllDataBytype($propData,'Address');
    $properties  = $properties->extractAllDataBytype($propData,'Information');

    // print_r($properties);

    // $addData = new addDataToDb($entityManager);
    // $objAddress = $addData->addGeoToDb($address);
    // $addData->addInformationToDb($properties,$objAddress);
    // $address = $entityManager->find('geodata', 1);
    // $stree =  unserialize($address->getStreet());
    $AllData = $entityManager->find('informationData',1);
    echo $AllData->getGeo()->getStreet();

    // echo $stree['th'];
?>