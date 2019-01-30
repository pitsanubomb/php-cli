<?php 
    require_once('bootstrap.php');

    class ShowProperty {

        public function __construct($entityManager) {
            $this->em = $entityManager;
            $this->log = Logger::getLogger("Fetch all data");
       }

        function fetchData(int $id) {
            try {
                $dql = "SELECT p, i FROM ImageData p JOIN p.imageurl i WHERE i.id =".$id;
                $query = $this->em->createQuery($dql);
                return $allData = $query->getResult();
            } catch (Exception $e) {
                $this->log->error('Can\'t fetch data!! '.$e->getMessage());
                exit(1);
            }
        }
    
        function showAllData($data,$lang) {
        
            $log = $this->log;
            
           try {
           if(isset($data)) {
                $title = unserialize($data[0]->getImageUrl()->getProjectName());
                $address = $data[0]->getImageUrl()->getGeo();
                $houseAddress = unserialize($address->getHouseAddress());
                $street = unserialize($address->getStreet());
                
                $log->info('id      : '.$data[0]->getImageUrl()->getId().'<br/>');
                $log->info('title    : '.($title[$lang] !== null ? $title[$lang] : $title['en']).'<br/>');
                $log->info('propertyid      : '.$data[0]->getImageUrl()->getPropertyId().'<br/>');
                $log->info('totalarea : '.$data[0]->getImageUrl()->getTotalArea().'<br/>');
                $log->info('totalnumberofrooms  : '.$data[0]->getImageUrl()->getTotalNumberOfRooms().'<br/>');
                $log->info('totalnumberofbedrooms  : '.$data[0]->getImageUrl()->getNumberOfBedrooms().'<br/>');
                $log->info('totalnumberofbathrooms  : '.$data[0]->getImageUrl()->getNumberOfBathrooms().'<br/>');
                $log->info('floorlevel  : '.$data[0]->getImageUrl()->getFloorLevel().'<br/>');
                $log->info('yearbuild : '.$data[0]->getImageUrl()->getYearBuild().'<br/>');
                $log->info('currentlistingprice : '.$data[0]->getImageUrl()->getCurrentListingPrice().' ฿ <br/>');
                $log->info('houseaddress    : '.($houseAddress[$lang] !== null ? $houseAddress[$lang] : $houseAddress['en']).'<br/>');
                $log->info('street    : '.($street[$lang] !== null ? $street[$lang] : $street['en']).'<br/>');
                $log->info('postcode    : '.$address->getPostCodeId().'<br/>');
                $log->info('townid  : '.$address->getTownId().'<br/>');
                $log->info('Laititude   : '.$address->getLatiTude().'<br/>');
                $log->info('Longtitude  : '.$address->getLongtiTude().'<br/>');
                $log->info('feature list : '.'<br/>');
                
                //Loop list features 

                foreach($data[0]->getImageUrl()->getFeatures() as $feature) {
                    $log->info($feature->getFeatureName().'<br/>');
                }

                //loop show image
                foreach($data as $listImg) {
                    $log->info("<img width='200px' height='200px' src='".$listImg->getFileName()."'>");
                }
           }
           } catch (Exception $e) {
                $this->log->error('Can\'t fetch data!! '.$e->getMessage());
                exit(1);
           }
        }
    }

    $showAll = new ShowProperty($entityManager);
    $l = Logger::getLogger("Debug data");

    try {
        $dataDb = $showAll->fetchData(2);
    } catch (Exception $e) {
        $l->error('Can\'t fetch data!! '.$e->getMessage());
        exit(1);
    }

    if($dataDb[0] != null) {
        try {
            $showAll->showAllData($dataDb,'th');
        } catch (Exception $e) {
            $l->error('Can\'t fetch data!! '.$e->getMessage());
            exit(1);
        }
    } else {
        $l->info('Not have data in db');
    }
?>