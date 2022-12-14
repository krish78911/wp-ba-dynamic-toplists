<?php

require_once 'DataInterface.php';

class DataFactory
{
    private $data;

    public function setDataType(DataInterface $datatype)
    {
        $this->data = $datatype;
    }

    public function getDataType()
    {
        return $this->data->getData();
    }
}
?>