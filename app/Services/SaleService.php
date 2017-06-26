<?php

namespace App\Services;

use App\Contracts\SaleInterface;
use App\Sale;

class SaleService implements SaleInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->sale = new Sale();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->sale->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->sale->paginate(9);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->sale->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->sale->find($id);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function getUpdateData($id,$data)
    {
        return $this->getOne($id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteData($id)
    {
        return $this->getOne($id)->delete();
    }

    /**
     * @return mixed
     */
    public function getFirstRow()
    {
        return $this->sale->first();
    }




}