<?php

namespace PlanMyLife\NotificationBundle\Model;

use JMS\Serializer\Annotation as Serializer;

class Notification
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Exclude()
     */
    protected $id;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    protected $status;

    /**
     * @var  string
     * @Serializer\Type("string")
     */
    protected $title;

    /**
     * @var  string
     * @Serializer\Type("string")
     */
    protected $content;

    /**
     * @var  string
     * @Serializer\Type("string")
     */
    protected $type;

    /**
     * @var  \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $date;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    protected $params;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this;
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return $this;
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return $this;
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }
}
