<?php
class Controller
{

    public function header($page)
    {
        include __DIR__ . "serenity\home\layout\header.php";
    }
    public function footer()
    {
        include __DIR__ . "serenity\home\layout\ footer.php";
    }
    public function home()
    {
        include __DIR__ . "serenity/home/menu/home.php";
    }
    public function aboutUs()
    {
        include __DIR__ . "serenity\home\menu\aboutUs.php";
    }
    public function products()
    {
        include __DIR__ . "serenity\home\menu\products.php";
    }
    public function form()
    {
        include __DIR__ . "serenity\home\pages\ form.php";
    }
    public function appointment()
    {
        include __DIR__ . "serenity\home\pages\appointment.php";
    }
    public function adAppointment()
    {
        include __DIR__ . "serenity\home\admin\appointments.php";
    }
    public function dashboard()
    {
        include __DIR__ . "serenity\home\admin\dashboard.php";
    }
    public function inventory()
    {
        include __DIR__ . "serenity\home\admin\inventory.php";
    }
    public function menu()
    {
        include __DIR__ . "serenity\home\admin\menu.php";

    }
    public function nav()
    {
        include __DIR__ . "serenity\home\admin\ nav.php";
    }
    public function reviews()
    {
        include __DIR__ . "serenity\home\admin\ reviews.php";
    }
    public function settings()
    {
        include __DIR__ . "serenity\home\admin\settings.php";
    }






}
