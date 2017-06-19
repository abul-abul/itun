<?php

namespace App\Services;

use App\Contracts\BlogInterface;
use App\Blog;

class BlogService implements BlogInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->blog = new Blog();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->blog->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->blog->paginate(9);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->blog->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->blog->find($id);
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
        return $this->blog->first();
    }




}