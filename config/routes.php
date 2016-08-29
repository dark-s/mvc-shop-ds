<?php
return array(
    //Авторизация, регистрация, выход
    'user/register'                     => 'users/register',
    'user/logout'                     	=> 'users/logout',
    'user/login'                     	=> 'users/login',
    //Детальный просмотр товара
    'product/([0-9]+)'                  => 'product/view/$1',
    //Корзина
    'cart/addAjax/([0-9]+)'             => 'cart/addAjax/$1',
    'cart/delete/([0-9]+)'              => 'cart/delete/$1',
    'cart/checkout'                     => 'cart/checkout',
    'cart'                 				=> 'cart/index',
    //Каталог
    'catalog'                           => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)'   => 'catalog/category/$1/$2',
    'category/([0-9]+)'                 => 'catalog/category/$1',
    //Личный кабинет
    'account/orders/view/([0-9]+)'      => 'account/view/$1',
    'account/orders'                    => 'account/orders',
    'account/edit'			            => 'account/edit',
    'account'			                => 'account/index',
    //Контакты
    'contact'                           => 'shop/contact',
    //Управление товарами
    'admin/product/create'              => 'adminProduct/create',
    'admin/product/delete/([0-9]+)'     => 'adminProduct/delete/$1',
    'admin/product/update/([0-9]+)'     => 'adminProduct/update/$1',
    'admin/product'                     => 'adminProduct/index',
    //Управление категориями
    'admin/category/create'             => 'adminCategory/create',
    'admin/category/delete/([0-9]+)'    => 'adminCategory/delete/$1',
    'admin/category/update/([0-9]+)'    => 'adminCategory/update/$1',
    'admin/category'                    => 'adminCategory/index',
    //Управление заказами
    'admin/order/view/([0-9]+)'         => 'adminOrder/view/$1',
    'admin/order/delete/([0-9]+)'       => 'adminOrder/delete/$1',
    'admin/order/update/([0-9]+)'       => 'adminOrder/update/$1',
    'admin/order'                       => 'adminOrder/index',
    //Админ-панель
    'admin'                             => 'admin/index',
    //Корень сайта
    ''                                  => 'shop/index',
);