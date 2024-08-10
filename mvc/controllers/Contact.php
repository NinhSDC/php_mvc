<?php
class Contact extends Controller
{
    public function __construct() {}
    function index()
    {
        $this->View(
            "ContactView",
            [
                "page" => "ContactDetail",
            ]
        );
    }
}
