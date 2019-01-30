<?php 
     /**
    * @Entity @Table(name="image")
    */
    Class ImageData 
    {
        /** @Id @Column(type="integer") @GeneratedValue */
        protected $id;
        /** @Column(type="integer") */
        protected $defaultimagesequencenumber;
        /** @Column(type="integer") */
        protected $sequencenumber;
        /** @Column(type="string") */
        protected $filename;
        /** @Column(type="string") */
        protected $descriptivename;
        /** @Column(type="string") */
        protected $alt;
        /**
        * @ManyToOne(targetEntity="InformationData", inversedBy="addimageurl")
        */
        protected $imageurl;

        public function getId() {
            return $this->id;
        }

        public function setDefaultImageSequenceNumber($defaultimagesequencenumber) {
            $this->defaultimagesequencenumber = $defaultimagesequencenumber;
        }

        public function getDefaultImageSequenceNumber() {
            return $this->defaultimagesequencenumber;
        }

        public function setSequenceNumber($sequencenumber) {
            $this->sequencenumber = $sequencenumber;
        }

        public function getSequenceNumber() {
            return $this->sequencenumber; 
        }

        public function setFileName($filename) {
            $this->filename = $filename;
        }

        public function getFileName() {
            return $this->filename; 
        }

        public function setDescriptiveName($descriptivename) {
            $this->descriptivename = $descriptivename;
        }

        public function getDescriptiveName() {
            return $this->descriptivename;
        }

        public function setAlt($alt) {
            $this->alt = $alt;
        }

        public function getAlt() {
            return $this->alt;
        }

        public function setImageUrl($imageurl) {
            $imageurl->addimageurl($this);
            $this->imageurl = $imageurl;
        }

        public function getImageUrl() {
            return $this->imageurl;
        }
    }
?>