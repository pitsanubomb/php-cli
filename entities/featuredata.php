<?php
/**
 * @Entity @Table(name="feature")
 */
class FeatureData
{
    /** @Id @Column(type="integer")*/
    protected $id;
    /** @Column(type="string") */
    protected $name;
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getFeatureName()
    {
        return $this->name;
    }
    public function setFeatureName($name)
    {
        $this->name = $name;
    }
}