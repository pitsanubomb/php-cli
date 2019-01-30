<?php 
    require('./module/genxml.php');
    require('./module/adddatatodb.php');
    // require ('./module/cloundImage.php');

    $xmlfile_1 = 'propertyCreate1.xml';
    $xmlfile_2 = 'propertyCreate2.xml';
    
    $log = Logger::getLogger("propertydata");

    $properties = new genXml();
    $propData = $properties->genXmltoArray($xmlfile_1);
    
    $address = $properties->extractAllDataByType($propData,'Address');
    $informations  = $properties->extractAllDataByType($propData,'Information');
    $image = $properties->extractAllDataByType($propData,'Images');

    $addData= new addDataToDb($entityManager);
    $addData->addAllPropertyData($address,$informations,$image);
    // $feature = $properties->extractAllDataByType($propData,'Features');
    // foreach($image as $im) {
    //     foreach($im as $i) {
    //         echo $i;
    //     }
    // }
    // $path_img = $image[0]['FileName'];

    // $cloundDinary = new CloundImage();

    // $imgUpload = $cloundDinary->upLoadImageByRemote($path_img,'property');

    // $log->info($imgUpload['url']);

    // $addData = new addDataToDb($entityManager);
    // $addAddress = $addData->addGeoToDb($address);
    // $addInformation = $addData->addInformationToDb($informations,$addAddress);
    // $addData->addImageToDb($image,1,1);

    // $imData = $entityManager->find('ImageData',1);

    // print_r($imData->getImageUrl()->getId());
?>