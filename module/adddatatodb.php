<?php
    require_once './bootstrap.php';
    require_once 'cloundimage.php';

    class addDataToDb {       
        
        public function __construct($entityManager) {
            $this->em = $entityManager;
            $this->log = Logger::getLogger("debug_db");
            $this->cloundImage = new CloundImage();
       }

       public function addAllPropertyData(array $geoData, array $Idata,array $ImgList) {
           try {
            $GeoDB = $this->addGeoToDb($geoData);
           } catch (Exception $e) {
               $this->log->error('This Error to add geo data to db'.$e->getMessage());
           }
           
           try {
               $informationDB = $this->addInformationToDb($Idata,$GeoDB);
           } catch (Exception $e) {
               $this->log->error('This Error to add information data to db'.$e->getMessage());
           }

           try {
               $index = 0;
               foreach($ImgList as $img) {
                if(gettype($img) == 'array') {
                    $imgpath = $this->cloundImage->upLoadImageByRemote($img['FileName'],'property');
                    $this->addImageToDb($ImgList,$informationDB->getId(),$index,$imgpath['url']);
                }
               }
           } catch (Exception $e) {
            $this->log->error('This Error to add information data to db'.$e->getMessage());
           }
           return true;
       }

        public function addInformationToDb(array $Idata,$GeoDB) {
            $informationData = new InformationData();
           
            $informationData->setGeo($GeoDB);
            $informationData->setPropertyId($Idata['PropertyID']);
            $informationData->setOfficeId($Idata['OfficeID']);
            $informationData->setSaleId($Idata['SaleID']);
            $informationData->setMode($Idata['Mode']);
            $informationData->setPropertyCategory($Idata['PropertyCategory']);
            $informationData->setPropertyType($Idata['PropertyType']);
            $informationData->setCurrentListingPrice($Idata['CurrentListingPrice']);
            $informationData->setPropertyAppraisal($Idata['PropertyAppraisal']);
            $informationData->setFireAppraisal($Idata['FireAppraisal']);
            $informationData->setMortgage($Idata['Mortgage']);
            $informationData->setCurrentListingCurrency($Idata['CurrentListingCurrency']);
            $informationData->setRentalPriceGranularity($Idata['RentalPriceGranularity']);
            $informationData->setPropertyStatus($Idata['PropertyStatus']);
            $informationData->setFloorLevel($Idata['FloorLevel']);
            $informationData->setTotalArea($Idata['TotalArea']);
            $informationData->setLivingArea($Idata['LivingArea']);
            $informationData->setLandArea($Idata['LandArea']);
            $informationData->setCubicVolume($Idata['CubicVolume']);
            $informationData->setTotalNumberOfRooms($Idata['TotalNumberOfRooms']);
            $informationData->setNumberOfBathrooms($Idata['NumberOfBathrooms']);
            $informationData->setNumberOfLivingrooms($Idata['NumberOfLivingrooms']);
            $informationData->setNumberOfBedrooms($Idata['NumberOfBedrooms']);
            $informationData->setNumberOfToiletRooms($Idata['NumberOfToiletRooms']);
            $informationData->setNumberOfFloors($Idata['NumberOfFloors']);
            $informationData->setEntrance($Idata['Entrance']);
            $informationData->setGarage($Idata['Garage']);
            $informationData->setGarageArea($Idata['GarageArea']);
            $informationData->setYearBuild($Idata['YearBuild']);
            $informationData->setUnitOfMeasue($Idata['UnitOfMeasue']);
            $informationData->setPossessionDate(new DateTime($Idata['PossessionDate']));
            $informationData->setAvailabilityDate(new DateTime($Idata['AvailabilityDate']));
            $informationData->setOrigListingDate(new DateTime($Idata['OrigListingDate']));
            $informationData->setExpiryDate(new DateTime($Idata['ExpiryDate']));
            $informationData->setElevator($Idata['Elevator']);
            $informationData->setFeatured($Idata['Featured']);
            $informationData->setProjectName(serialize($Idata['ProjectName']));
            $informationData->setCompanyName(serialize($Idata['CompanyName']));

            $this->em->persist($informationData);
            $this->em->flush();
            
            return $informationData;
            // $this->log->debug('Add data to compleate and gen Id : '.$informationData->getId());
        }

        public function addImageToDb(array $Imagedata,int $id,int $index,string $img_url) {
            $imagedata = new ImageData();
            
            $informationDb = $this->em->find('InformationData',$id);
            
            $imagedata->setDefaultImageSequenceNumber($Imagedata['DefaultImageSequenceNumber']);
            $imagedata->setSequenceNumber($Imagedata[$index]['SequenceNumber']);
            $imagedata->setFileName($img_url);
            $imagedata->setDescriptiveName($Imagedata[$index]['setDescriptiveName'][0]);
            $imagedata->setAlt($Imagedata[$index]['Alt'][0]);
            $imagedata->setImageUrl($informationDb);
            
            $this->em->persist($imagedata);
            $this->em->flush();
        }

        public function addGeoToDb(array $data)
        {
             
            $geodata = new Geodata();
 
            $geodata->setCountry($data['Country']);
            $geodata->setHouseAddress(serialize($data['HouseAddress']));
            $geodata->setStreet(serialize($data['Street']));
            $geodata->setPostCodeId($data['PostalCodeID']);
            $geodata->setTownId($data['TownID']);
            $geodata->setRegionId($data['RegionID']);
            $geodata->setLatiTude($data['Latitude']);
            $geodata->setLongtiTude($data['Longitude']);          
            $geodata->setZoneId($data['ZoneId']);
 
            $this->em->persist($geodata);
            return $geodata;
         }
        
    }
    
    // $addData = new addDataToDb($entityManager);
    // $addData->mapDataToDb($data);


?>