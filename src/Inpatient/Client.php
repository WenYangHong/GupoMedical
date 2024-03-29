<?php


namespace GupoMedical\Inpatient;


use GupoMedical\BaseClient;

class Client extends BaseClient
{
    /**
     * User: hongwenyang
     * @param array $params
     * @return mixed
     * Use: 获取住院列表
     */
    public function getList(array $params = [])
    {
        return $this->get('manager/inpatient',$params);
    }

    /**
     * User: hongwenyang
     * @param array $params
     * @return mixed
     * Use: 获取住院患者详情
     */
    public function getDetail(array $params = [])
    {
        return $this->get('emr/inpatient',$params);
    }
}