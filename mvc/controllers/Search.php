<?php
class Search extends Controller
{
    private $CategoriesModel;
    private $BrandModel;
    private $SearchModel;

    public function __construct()
    {
        $this->CategoriesModel = $this->Model("CategoriesModel");
        $this->SearchModel = $this->Model("SearchModel");
        $this->BrandModel = $this->Model("BrandModel");
    }
    function index($current_page = 1) {}
    function Search_live($current_page = 1)
    {
        if (isset($_POST['Live_Search'])) {
            $_SESSION['Live_Search'] = $_POST['Live_Search'];
        }

        $keySearch = $_SESSION['Live_Search'];

        $limit = 8;

        $start = ($current_page - 1) * $limit;

        $SearchProduct = $this->SearchModel->KeySearch($keySearch, $start, $limit);

        $CountSearch = $this->SearchModel->CountSearch($keySearch);

        // $total_records = count($CountSearch);

        $total_page = ceil($CountSearch / $limit);

        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }

        $brands = $this->BrandModel->getAllBrands();

        $this->View(
            "SearchView",
            [
                "page" => "Search",
                "currentPage" => $current_page,
                "totalPage" => $total_page,
                "products" => $SearchProduct,
                "brands" => $brands
            ]
        );
    }
}
