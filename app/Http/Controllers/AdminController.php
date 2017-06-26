<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\BlogInterface;
use App\Contracts\BlogGalleryInterface;
use App\Contracts\SaleInterface;

use View;
use Session;
use Validator;
use Auth;
use File;

class AdminController extends BaseController
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('authadmin', ['except' => ['getLogin', 'postLogin','getLogout']]);
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return view('admin.admin-login.admin-login');
    }

    public function postLogin(request $request)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'name' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $name = $request->get('name');
        $password  = $request->get('password');

        if(Auth::attempt ([
            'name'=>$name,
            'password'=>$password,
        ]))
        {
            return redirect()->action('AdminController@getDashboard');
        }else{
            return redirect()->back()->with('error', 'Invalid login or password');
        }
    }

    /**
     * @return mixed
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->action('AdminController@getLogin');
    }

    /**
     * @return View
     */
    public function getDashboard()
    {
        return view('admin.dashboard.dashboard');
    }

    /**
     * @param BlogInterface $blogRepo
     * @return View
     */
    public function getBlog(BlogInterface $blogRepo)
    {
        $result = $blogRepo->getAllPaginate();
        
        $data = [
            'blogs' => $result,
            'blogactive' => 1
        ];
        return view('admin.blog.blog',$data);
    }

    /**
     * @return View
     */
    public function getAddBlog()
    {
        $data = [
            'blogactive' => 1
        ];
        return view('admin.blog.add-blog',$data);
    }

    public function postAddBlog(request $request,BlogInterface $blogRepo,BlogGalleryInterface $blogGalleryRepo)
    {
        $result = $request->all();
        $validator = Validator::make($result, [
            'images' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            unset($result['_token']);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/images/blog-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $article_images = $name.'.'.$logoFile;
            $result['images'] = $article_images;

            $blogRow = $blogRepo->createData($result);
            $data = [];
            foreach ($result['images_gallery'] as $img){
                $logoFile = $img->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/images/blog-images';
                $result_move = $img->move($path, $name.'.'.$logoFile);
                $article_images = $name.'.'.$logoFile;
                $img = $article_images;
                $data['images_gallery'] = $article_images;
                $data['blog_id'] = $blogRow['id'];
                $blogGalleryRepo->createData($data);
            }
            return redirect()->action('AdminController@getBlog')->with('message','You added partners');
        }
    }

    /**
     * @param $id
     * @param BlogInterface $blogRepo
     * @param BlogGalleryInterface $blogGalleryRepo
     * @return View
     */
    public function getEditBlog($id,BlogInterface $blogRepo,BlogGalleryInterface $blogGalleryRepo)
    {
        $blog = $blogRepo->getOne($id);
        $blogGallery = $blogGalleryRepo->getBlog($id);
        $data = [
            'blog' => $blog,
            'gallerys' => $blogGallery,
            'blogactive' => 1
        ];
        return view('admin.blog.edit-blog',$data);
    }

    /**
     * @param Request $request
     * @param BlogInterface $blogRepo
     * @param BlogGalleryInterface $blogGalleryRepo
     * @return mixed
     */
    public function postEditBlog(request $request,BlogInterface $blogRepo,BlogGalleryInterface $blogGalleryRepo)
    {
        $result = $request->all();
        if(isset($result['images_gallery'])){
            $data = [];
            foreach ($result['images_gallery'] as $img){
                $logoFile = $img->getClientOriginalExtension();
                $name = str_random(12);
                $path = public_path() . '/assets/images/blog-images';
                $result_move = $img->move($path, $name.'.'.$logoFile);
                $article_images = $name.'.'.$logoFile;
                $img = $article_images;
                $data['images_gallery'] = $article_images;
                $data['blog_id'] = $result['id'];
                $blogGalleryRepo->createData($data);
            }
        }
        if(isset($result['images'])){
            $row = $blogRepo->getOne($result['id']);
            $path = public_path() . '/assets/images/blog-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/images/blog-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $blogRepo->getUpdateData($result['id'],$result);
        }else{
            $blogRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->action('AdminController@getBlog')->with('message','Edit was succesfully');
    }

    /**
     * @param $id
     * @param BlogInterface $blogRepo
     * @param BlogGalleryInterface $blogGalleryRepo
     * @return mixed
     */
    public function getBlogDelete($id,BlogInterface $blogRepo,BlogGalleryInterface $blogGalleryRepo)
    {
        $file = $blogRepo->getOne($id);
        $filename = public_path() . '/assets/images/blog-images/' . $file['images'];
        File::delete($filename);
        $blogRepo->deleteData($id);
        $gallery_images = $blogGalleryRepo->getBlog($id);
        foreach ($gallery_images as $gallery_image){
            $filename = public_path() . '/assets/images/blog-images/' . $gallery_image['images_gallery'];
            File::delete($filename);
            $blogGalleryRepo->deleteData($gallery_image['id']);
        }
        return redirect()->back()->with('message','Deleted Successfully');
    }

    /**
     * @param $id
     * @param BlogGalleryInterface $blogGalleryRepo
     * @return View
     */
    public function getViewBlogGallery($id,BlogGalleryInterface $blogGalleryRepo)
    {
        $result = $blogGalleryRepo->getBlog($id);
        $data = [
            'blogactive' => 1,
            'gallerys' => $result
        ];
        return view('admin.blog.view-blog-gallery',$data);
    }

    /**
     * @param $id
     * @param BlogGalleryInterface $blogGalleryRepo
     * @return mixed
     */
    public function getBlogGalleryDelete($id,BlogGalleryInterface $blogGalleryRepo)
    {
        $result = $blogGalleryRepo->getOne($id);
        $filename = public_path() . '/assets/images/blog-images/' . $result['images_gallery'];
        File::delete($filename);
        $blogGalleryRepo->deleteData($id);
        return redirect()->back()->with('message','Deleted Successfully');
    }

    /**
     * @param SaleInterface $saleRepo
     * @return View
     */
    public function getSaleHome(SaleInterface $saleRepo)
    {
        $result = $saleRepo->getAllPaginate();


        $data = [
            'salesHomes' => $result,
            'saleHomeActive' => 1
        ];
        return view('admin.sale.sale-home.sale-home',$data);
    }

    /**
     * @return View
     */
    public function getAddSaleHome(SaleInterface $saleRepo)
    {

        $data = [
            'saleHomeActive' => 1
        ];
        return view('admin.sale.sale-home.sale-add-home',$data);
    }

    /**
     * @param Request $request
     * @param SaleInterface $saleRepo
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postAddSaleHome(request $request,SaleInterface $saleRepo)
    {
        $result = $request->all();

        $validator = Validator::make($result, [
            'area' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        if(isset($result['images'])){
            $logoFile = $result['images']->getClientOriginalExtension();

            $name = str_random(12);
            $path = public_path() . '/assets/images/home-images/';

            $result_move = $result['images']->move($path, $name.'.'.$logoFile);

            $home = $name.'.'.$logoFile;
            $result['images'] = $home;
        }

        unset($result['_token']);

        $saleRepo->createData($result);
        return redirect()->action('AdminController@getSaleHome')->with('message','adding was succesfully');
    }

    /**
     * @param $id
     * @param SaleInterface $saleRepo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteSaleHome($id,SaleInterface $saleRepo)
    {
        $result = $saleRepo->getOne($id);
        $filename = public_path() . '/assets/images/home-images/' . $result['images'];
        File::delete($filename);
        $saleRepo->deleteData($id);
        return redirect()->back()->with('message','Deleted Successfully');
    }

    /**
     * @param $id
     * @param SaleInterface $saleRepo
     * @return View
     */
    public function getEditSalesHome($id,SaleInterface $saleRepo)
    {
        $result = $saleRepo->getOne($id);
        $data = [
            'salesHome' => $result,
            'saleHomeActive' => 1
        ];
        return view('admin.sale.sale-home.sale-edit-home',$data);

    }

    /**
     * @param Request $request
     * @param SaleInterface $saleRepo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditSaleHome(request $request,SaleInterface $saleRepo)
    {
        $result = $request->all();

        if(isset($result['images'])){
            $row = $saleRepo->getOne($result['id']);
            $path = public_path() . '/assets/images/home-images/' . $row['images'];
            File::delete($path);
            $logoFile = $result['images']->getClientOriginalExtension();
            $name = str_random(12);
            $path = public_path() . '/assets/images/home-images';
            $result_move = $result['images']->move($path, $name.'.'.$logoFile);
            $gallery_images = $name.'.'.$logoFile;
            $result['images'] = $gallery_images;
            $saleRepo->getUpdateData($result['id'],$result);
        }else{
            $saleRepo->getUpdateData($result['id'],$result);
        }
        return redirect()->action('AdminController@getSaleHome')->with('message','Չեր փոփոխությունը հաջողությամբ կատարված է');

    }

    /**
     * @return View
     */
    public function getAddGalleryHomeSales()
    {
        $data = [
            'saleHomeActive' => 1
        ];
        return view('admin.sale.sale-home.gallery-home-sales',$data);
    }
    


}
