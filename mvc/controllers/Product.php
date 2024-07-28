<?php
class Product extends Controller
{
    public $ProductsModel;

    public function __construct()
    {
        $this->ProductsModel = $this->Model("ProductsModel");
    }

    function index()
    {
    }

    function ProductDetail($IdProduct)
    {
        $this->view(
            "ProductView",
            [
                "page" => "ProductDetailView",
                "Detailproduct" => $this->ProductsModel->Detailproduct($IdProduct),
                "getImgDetailproduct" => $this->ProductsModel->getImgDetailproduct($IdProduct),
                "getProductDetailedConfigs" => $this->ProductsModel->getProductDetailedConfigs($IdProduct)
            ]
        );
    }
}
