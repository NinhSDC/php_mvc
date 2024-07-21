<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller
{
    public $CategoriesModel;
    public $ProductModel;

    public function __construct()
    {
        $this->CategoriesModel = $this->Model("CategoriesModel");
        $this->ProductModel = $this->Model("ProductsModel");
    }

    public function index()
    {
        $this->view(
            "homeView",
            [
                "page" => "homepage",
                "Categories" => $this->CategoriesModel->categorys(),
                "ProductNewHome" => $this->ProductModel->ProductNewHome(),
            ]
        );
    }
}
