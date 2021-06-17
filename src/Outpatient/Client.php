<?php


namespace GupoMedical\Outpatient;


use GupoMedical\BaseClient;

class Client extends BaseClient
{
    /**
     * User: hongwenyang
     * @param array $params
     * @return mixed
     * Use: 获取门诊列表
     */
    public function getList(array $params = [])
    {
        return $this->get('manager/outpatient',$params);
    }

    /**
     * User: hongwenyang
     * @param array $params
     * @return mixed
     * Use: 获取门诊患者详情
     */
    public function getDetail(array $params = [])
    {
        return $this->get('emr/outpatient',$params);
    }
}