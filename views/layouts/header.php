<!-- templatemo 367 shoes -->
<!-- 
Shoes Template 
http://www.templatemo.com/preview/templatemo_367_shoes 
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shoes Store - Product Detail</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="utf-8" />
    <link href="/template/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="/template/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="//code.jquery.com/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/template/css/ddsmoothmenu.css" />

    <script type="text/javascript" src="/template/js/ddsmoothmenu.js">

        /***********************************************
         * Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
         * This notice MUST stay intact for legal use
         * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
         ***********************************************/

    </script>

    <script type="text/javascript">

        ddsmoothmenu.init({
            mainmenuid: "top_nav", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

    </script>

    
    <link rel="stylesheet" href="/template/css/slimbox2.css" type="text/css" media="screen" />
    <script type="text/JavaScript" src="/template/js/slimbox2.js"></script>
    
    <!-- arcticModal theme -->
    <script type="text/JavaScript" src="/template/libs/jquery.arcticmodal/jquery.arcticmodal-0.3.min.js"></script>
    <link rel="stylesheet" href="/template/libs/jquery.arcticmodal/jquery.arcticmodal-0.3.css">
    <link rel="stylesheet" href="/template/libs/jquery.arcticmodal/themes/simple.css">




</head>

<body>

<div id="templatemo_body_wrapper">
    <div id="templatemo_wrapper">

        <div id="templatemo_header">
            <div id="site_title"><h1><a href="/">Online Shoes Store</a></h1></div>
            <div id="header_right">
                <span style="float:right"> 
                <? if(Users::isGuest()): ?>
                	<a href="/user/register/">Регистрация</a> | <a href='/user/login/'>Войти</a>
                <? else: ?>
                	<a href="/account/">Кабинет</a> | <a href="/user/logout/">Выйти</a>
                <? endif; ?>
                </span>
                <br>
                <p style="float:left">
                    В корзене: <strong><span id="cart-quantity"><?=Cart::countItems()?></span> товаров</strong> ( <a href="/cart/">Перейти в корзину</a> )
                </p>
            </div>
            <div class="cleaner"></div>
        </div> <!-- END of templatemo_header -->

        <div id="templatemo_menubar">
            <div id="top_nav" class="ddsmoothmenu">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/catalog/">Каталог товаров</a></li>
                    <li><a href="/about/">О нас</a></li>
                    <li><a href="/cart/">Корзина</a></li>
                    <li><a href="/contact/">Контакты</a></li>
                </ul>
                <br style="clear: left" />
            </div> <!-- end of ddsmoothmenu -->
            <div id="templatemo_search">
                <form action="#" method="get">
                    <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                    <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
        </div> <!-- END of templatemo_menubar -->

        <div id="templatemo_main">
        <? if(isset($categories)): ?>
            <div id="sidebar" class="float_l">
                <div class="sidebar_box"><span class="bottom"></span>
                    <h3>Categories</h3>
                    <div class="content">
                        <ul class="sidebar_list">
                            <? foreach($categories as $category): ?>
                                <li><a href="/category/<?=$category['id']?>" style="<?=($categoryId==$category['id'])?'font-weight:bold':''?>"><?=$category['name']?></a></li>
                            <? endforeach; ?>
                        </ul>
                    </div>
                </div>
            <? if(isset($recommendedProducts) && count($recommendedProducts) > 0): ?>
                <div class="sidebar_box"><span class="bottom"></span>
                    <h3>Рекоммендуем </h3>
                <? foreach($recommendedProducts as $rec_product): ?>
                    <div class="content">
                        <div class="bs_box">
                            <a href="/product/<?=$rec_product['id']?>"><img src="<?=Products::getImage($rec_product['id'])?>" alt="image" /></a>
                            <h4><a href="/product/<?=$rec_product['id']?>"><?=$rec_product['name']?></a></h4>
                            <p class="price"><?=$rec_product['price']?> грн.</p>
                            <div class="cleaner"></div>
                        </div>
                    </div>
                <? endforeach; ?>
                </div>
            <? endif; ?>
            </div>
        <? endif ?>