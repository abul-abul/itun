<?php

namespace App\Services;

use App\Contracts\BlogGalleryInterface;
use App\BlogGallery;

class BlogGalleryService implements BlogGalleryInterface
{

    /**
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->blog_gallery = new BlogGallery();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->blog_gallery->get();
    }

    /**
     * @return mixed
     */
    public function getAllPaginate()
    {
        return $this->blog_gallery->paginate(5);
    }


    /**
     * @param $data
     * @return mixed
     */
    public function createData($data)
    {
        return $this->blog_gallery->create($data);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->blog_gallery->find($id);
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
        return $this->blog_gallery->first();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getBlog($id)
    {
        return $this->blog_gallery->where('blog_id',$id)->get();
    }


}