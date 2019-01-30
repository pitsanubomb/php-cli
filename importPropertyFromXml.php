<?php
require('./module/genxml.php');
require('./module/adddatatodb.php');

$xmlfile_1 = 'propertyCreate1.xml';
$xmlfile_2 = 'propertyCreate2.xml';

$log = Logger::getLogger("debug_import");

$properties = new genXml();

$propData = $properties->genXmltoArray($xmlfile_1);

$address = $properties->extractAllDataByType($propData,'Address');
$informations  = $properties->extractAllDataByType($propData,'Information');
$image = $properties->extractAllDataByType($propData,'Images');
$feature = $properties->extractAllDataByType($propData,'Features');

$addData= new addDataToDb($entityManager);

try {
    $result = $addData->addAllPropertyData($address,$informations,$image,$feature);
    if($result == true) {
        $log->info('Import data to db from xml complete');
    }    
} catch (Exception $e) {
    $log->error('Can\'t Import data something have wrong',$e->getMessage());
}
?>