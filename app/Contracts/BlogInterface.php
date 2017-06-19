<?php

namespace App\Contracts;

interface BlogInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @return mixed
     */
    public function getAllPaginate();

    /**
     * @param $data
     * @return mixed
     */
    public function createData($data);

    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id);

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function getUpdateData($id,$data);


    /**
     * @param $id
     * @return mixed
     */
    public function deleteData($id);

    /**
     * @return mixed
     */
    public function getFirstRow();



}
