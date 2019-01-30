<?php 
    require('./module/genxml.php');
    require('./module/adddatatodb.php');

    $xmlfile_1 = 'propertyCreate1.xml';
    $xmlfile_2 = 'propertyCreate2.xml';

    $properties = new genXml();
    $propData = $properties->genXmltoArray($xmlfile_1);
    
    $address = $properties->extractAllDataByType($propData,'Address');
    $informations  = $properties->extractAllDataByType($propData,'Information');
    $image = $properties->extractAllDataByType($propData,'Images');

    $addData= new addDataToDb($entityManager);
    $addData->addAllPropertyData($address,$informations,$image);
?>