<?php
use Doctrine\Common\Collections\ArrayCollection;

    /**
    * @Entity @Table(name="information")
    */
    class InformationData
    {
        /**
        * One InformationData has One GeoData.
        * @OneToOne(targetEntity="geoData")
        * @JoinColumn(name="geoid", referencedColumnName="id")
        */
        private $geoData;
        /** @Id @Column(type="integer") @GeneratedValue */
        protected $id;
        /** @Column(type="string") */
        protected $propertyid;
        /** @Column(type="string") */
        protected $officeid;
        /** @Column(type="string") */
        protected $saleid;
        /** @Column(type="integer") */
        protected $mode;
        /** @Column(type="integer") */
        protected $propertycategory;
        /** @Column(type="integer") */
        protected $propertytype;
        /** @Column(type="integer") */
        protected $currentlistingprice;
        /** @Column(type="integer") */
        protected $propertyappraisal;
        /** @Column(type="integer") */
        protected $fireappraisal;
        /** @Column(type="integer") */
        protected $mortgage;
        /** @Column(type="string") */
        protected $currentlistingcurrency;
        /** @Column(type="integer") */
        protected $rentalpricegranularity;
        /** @Column(type="integer") */
        protected $propertystatus;
        /** @Column(type="float") */
        protected $floorlevel;
        /** @Column(type="float") */
        protected $totalarea;
        /** @Column(type="float") */
        protected $livingarea;
        /** @Column(type="float") */        
        protected $landarea;
        /** @Column(type="float") */
        protected $cubicvolume;
        /** @Column(type="integer") */
        protected $totalnumberofrooms;
        /** @Column(type="integer") */
        protected $numberofbathrooms;
        /** @Column(type="integer") */
        protected $numberoflivingrooms;
        /** @Column(type="integer") */
        protected $numberofbedrooms;
        /** @Column(type="integer") */
        protected $numberoftoiletrooms;
        /** @Column(type="integer") */
        protected $numberoffloors;
        /** @Column(type="string") */
        protected $entrance;
        /** @Column(type="boolean") */
        protected $garage;
        /** @Column(type="float") */
        protected $garagearea;
        /** @Column(type="integer") */
        protected $yearbuild;
        /** @Column(type="string") */
        protected $unitofmeasue;
        /** @Column(type="datetime") */
        protected $possessiondate;
        /** @Column(type="datetime") */
        protected $availabilitydate;
        /** @Column(type="datetime") */
        protected $origlistingdate;
        /** @Column(type="datetime") */
        protected $expirydate;
        /** @Column(type="boolean") */
        protected $elevator;
        /** @Column(type="boolean") */
        protected $featured;
        /** @Column(type="string") */
        protected $projectname;
        /** @Column(type="string") */
        protected $companyname;
        /**
        * @OneToMany(targetEntity="ImageData", mappedBy="imageurl")
        * @var Image[]
        */
        protected $addimageurl = null;

        public function __construct() {
            $this->addimageurl = new ArrayCollection();
        }

        public function getId() {
            return $this->id;
        }

        public function setGeo(GeoData $geo) {
            $this->geoData = $geo;
        }

        public function getGeo() {
            return $this->geoData;
        }

        public function setPropertyId($propertyid) {
            $this->propertyid = $propertyid;
        }

        public function getPropertyId() {
            return $this->propertyid;
        }
        
        public function setOfficeId($officeid) {
            $this->officeid = $officeid;
        }

        public function getOfficeId() {
            return $this->officeid;
        }

        public function setSaleId($saleid) {
            $this->saleid = $saleid;
        }

        public function getSaleId() {
            return $this->saleid;
        }

        public function setMode($mode) {
            $this->mode = $mode;
        }

        public function getMode() {
            return $this->model;
        }

        public function setPropertyCategory($propertycategory) {
            $this->propertycategory = $propertycategory;
        }

        public function getPropertyCategory() {
            return $this->propertycatelogory;
        }

        public function setPropertyType($propertytype) {
            $this->propertytype = $propertytype;
        }

        public function getPropertyType() {
            return $this->propertytype;
        }

        public function setCurrentListingPrice($currentlistingprice) {
            $this->currentlistingprice = $currentlistingprice;
        }

        public function getCurrentListingPrice() {
            return $this->$currentlistingprice;
        }

        public function setPropertyAppraisal($propertyappraisal) {
            $this->propertyappraisal = $propertyappraisal;
        }

        public function getPropertyAppraisal() {
            return $this->propertyappraisal;
        }

        public function setFireAppraisal($fireappraisal) {
            $this->fireappraisal = $fireappraisal;
        }

        public function getFireAppraisal() {
            return $this->fireappraisal;
        }

        public function setMortgage($mortgage) {
            $this->mortgage = $mortgage;
        }

        public function getMortgage() {
            return $this->mortgage;
        }

        public function setCurrentListingCurrency($currentlistingcurrency) {
            $this->currentlistingcurrency = $currentlistingcurrency;
        }

        public function getCurrentListingCurrency() {
            return $this->curretlistingcurrency;
        }

        public function setRentalPriceGranularity($rentalpricegranularity) {
            $this->rentalpricegranularity = $rentalpricegranularity;
        }

        public function getRentalPriceGranularity() {
            return $this->rentalpricegranularity;
        }

        public function setPropertyStatus($propertystatus) {
            return $this->propertystatus = $propertystatus;
        }

        public function getPropertyStatus(){
            return $this->propertystatus;
        }
        
        public function setFloorLevel($floorlevel){
            $this->floorlevel = $floorlevel;
        }

        public function getFloorLevel(){
            return $this->floorlevel;
        }

        public function setTotalArea($totalarea) {
            $this->totalarea = $totalarea;
        }

        public function getTotalArea() {
            return $this->totalarea;
        }

        public function setLivingArea($livingarea) {
            $this->livingarea = $livingarea;
        }

        public function getLivingArea() {
            return $this->livingarea;
        }

        public function setLandArea($landarea){
            $this->landarea = $landarea;
        }

        public function getLandArea() {
            return $landarea;
        }

        public function setCubicVolume($cubicvolume) {
            $this->cubicvolume = $cubicvolume;
        }

        public function getCubicVolume() {
            return $this->cubicvolume;
        }

        public function setTotalNumberOfRooms($totalnumberofrooms) {
            $this->totalnumberofrooms = $totalnumberofrooms;
        }

        public function getTotalNumberOfRooms() {
            return $this->totalnumberofrooms;
        }

        public function setNumberOfBathrooms($numberofbathrooms) {
            $this->numberofbathrooms = $numberofbathrooms;
        }

        public function getNumberOfBathrooms() {
            return $this->numberofbathrooms;
        }

        public function setNumberOfLivingrooms($numberoflivingrooms) {
            $this->numberoflivingrooms = $numberoflivingrooms;
        }

        public function getNumberOfLivingrooms() {
            return $this->numberoflivingrooms;
        }

        public function setNumberOfBedrooms($numberofbedrooms) {
            $this->numberofbedrooms = $numberofbedrooms;
        }

        public function getNumberOfBedrooms() {
            return $this->numberofbedrooms;
        }

        public function setNumberOfToiletRooms($numberoftoiletrooms){
            $this->numberoftoiletrooms = $numberoftoiletrooms;
        }

        public function getNumberOfToiletRooms() {
            return $this->numberoftoiletrooms;
        }

        public function setNumberOfFloors($numberoffloors) {
            $this->numberoffloors = $numberoffloors;
        }

        public function getNumberOfFloors() {
            return $this->numberoffloors;
        }

        public function setEntrance($entrance) {
            return $this->entrance = $entrance;
        }

        public function getEntrance() {
            return $this->entrance;
        }

        public function setGarage($garage) {
            $this->garage = $garage;
        }

        public function getGarage() {
            return $this->garage;
        }

        public function setGarageArea($garagearea) {
            $this->garagearea = $garagearea;
        }

        public function getGarageArea() {
            return $this->garagearea;
        }

        public function setYearBuild($yearbuild) {
            $this->yearbuild = $yearbuild;
        }

        public function getYearBuild() {
            return $this->yearbuild;
        }

        public function setUnitOfMeasue($unitofmeasue) {
            $this->unitofmeasue = $unitofmeasue;
        }

        public function getUnitOfMeasue() {
            return $this->unitofmeasue;
        }

        public function setPossessionDate($possessiondate) {
            $this->possessiondate = $possessiondate;
        }

        public function getPossessionDate() {
            return $this->posessiondate;
        }

        public function setAvailabilityDate($availabilitydate) {
            $this->availabilitydate = $availabilitydate;
        }

        public function getAvailabilityDate() {
            return $this->availabilitydate;
        }

        public function setOrigListingDate($origlistingdate) {
            $this->origlistingdate = $origlistingdate;
        }

        public function getOrigListingDate() {
            return $this->origlistingdate;
        }

        public function setExpiryDate($expirydate) {
            $this->expirydate = $expirydate;
        }

        public function getExpiryDate() {
            return $this->expirydate;
        }

        public function setElevator($elevator) {
            $this->elevator = $elevator;
        }

        public function getElevator() {
            return $this->elevator;
        }

        public function setFeatured($featured) {
            $this->featured = $featured;
        }

        public function getFeatured() {
            return $this->featured;
        } 

        public function setProjectName($projectname) {
            $this->projectname = $projectname;
        }

        public function getProjectName() {
            return $this->projectname;
        }

        public function setCompanyName($companyname) {
            $this->companyname = $companyname;
        }

        public function getCompanyName() {
            return $this->companyname;
        }

        public function addimageurl($image) {
            $this->addimageurl[] = $image;
        }
    }
?>