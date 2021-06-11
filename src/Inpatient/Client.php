<?php


namespace GupoMedical\Inpatient;


use GupoMedical\BaseClient;

class Client extends BaseClient
{
    public function getList(array $params = [])
    {
        return $this->get('manager/inpatient',$params);
    }
}