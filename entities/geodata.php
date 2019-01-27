<?php
    /**
    * @Entity @Table(name="geo")
    */
    class GeoData
    {
        /** @Id @Column(type="integer") @GeneratedValue */
        protected $id;
        /** @Column(type="string") */
        protected $country;
        /** @Column(type="string") */
        protected $houseaddress;
        /** @Column(type="string") */
        protected $street;
        /** @Column(type="integer") */
        protected $postcodeid;
        /** @Column(type="integer") */
        protected $townid;
        /** @Column(type="integer") */
        protected $regionid;
        /** @Column(type="float") */
        protected $latitude;
        /** @Column(type="float") */
        protected $longtitude;
        /** @Column(type="integer") */
        protected $zoneid;

        public function getId(){
            return $this->id;
        }

        public function setCountry($country) {
            $this->country = $country;
        }

        public function getCountry(){
            return $this->country;
        }

        public function setHouseAddress($houseaddress) {
            $this->houseaddress = $houseaddress;
        }

        public function getHouseAddress() {
            return $this->houseaddress;
        }

        public function setStreet($street) {
            $this->street = $street;
        }

        public function getStreet() {
            return $this->street;
        }

        public function setPostCodeId($postcodeid) {
            $this->postcodeid = $postcodeid;
        }

        public function getPostCodeId() {
            return $this->postcodeid;
        }

        public function setTownId($townid) {
            $this->townid = $townid;
        }

        public function getTownId() {
            return $this->townid;
        }

        public function setRegionId($regionid) {
            $this->regionid = $regionid;
        }

        public function getRegionId() {
            return $this->regionid;
        }

        public function setLatiTude($latitude) {
            $this->latitude = $latitude;
        }

        public function getLatiTude() {
            return $this->lattitude;
        }

        public function setLongtiTude($longtitude) {
            $this->longtitude = $longtitude;
        }

        public function getLongtiTude() {
            return $this->longtitude;
        }

        public function setZoneId($zondeid) {
            $this->zoneid = $zondeid;
        }

        public function getZoneId()
        {
            return $this->zoneid;
        }        
    }
?>