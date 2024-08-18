<?php
class Controller
{
    public function homepg()
    {
        include __DIR__ . "../../home/pages/homepg.php";
    }


    public function header($page)
    {
        include __DIR__ . '/../home/layout/navbar.php'; ;
    }
    public function footer()
    {
        include __DIR__ . '/../home/layout/footer.php';
    }
    public function home()
    {
        include __DIR__ . "../../home/menu/homepg.php";
    }
    public function aboutUs()
    {
        include __DIR__ . "../../home/menu/aboutUs.php";
    }
    public function products()
    {
        include __DIR__ . "../../home/menu/products.php";
    }
    public function form()
    {
        include __DIR__ . "../../home/pages/ form.php";
    }
    public function appointment()
    {
        include __DIR__ . "../../home/pages/appointment.php";
    }
    public function adAppointment()
    {
        include __DIR__ . "../../home/admin/appointments.php";
    }
    public function dashboard()
    {
        include __DIR__ . "../../home/admin/dashboard.php";
    }
    public function inventory()
    {
        include __DIR__ . "../../home/admin/inventory.php";
    }
    public function menu()
    {
        include __DIR__ . "../../home/admin/menu.php";

    }
    public function nav()
    {
        include __DIR__ . "../../home/admin/ nav.php";
    }
    public function reviews()
    {
        include __DIR__ . "../../home/admin/ reviews.php";
    }
    public function settings()
    {
        include __DIR__ . "../../home/admin/settings.php";
    }






}
