<style>
    #result{
        margin-top: 20px;
        background-color: #333333;
        list-style-type: none;
        width: 400px;
        position: absolute;
        top: 32px;
        z-index: 100;
        padding-left: 0;
    }
    .column {
        float: left;
        padding: 10px;
    }
    .left {
        width: 20%;
    }
    .right {
        width: 80%;
    }

    .rowsearch:after {
        content: "";
        display: table;
        clear: both;
    }
    .rowsearch:hover {
        background-color: #282222;
    }
</style>
<header class="myui-header__top clearfix" id="header-top">
    <div class="container">
        <div class="row">
            <div class="myui-header_bd clearfix">
                <div class="myui-header__logo">
                    <a class="logo" href="/">
                        <?php op_the_logo('max-width:50px') ?>
                    </a>
                </div>
                <ul class="myui-header__menu nav-menu">
                    <?php
                    $menu_items = wp_get_menu_array('primary-menu');
                    foreach ($menu_items as $key => $item) : ?>
                        <?php if (empty($item['children'])) { ?>
                            <li class=" hidden-sm hidden-xs"><a href="<?= $item['url'] ?>"><?= $item['title'] ?></a></li>
                        <?php } else { ?>
                            <li class="dropdown-hover hidden-sm hidden-xs"><a href="<?= $item['url'] ?>"><?= $item['title'] ?> <i class="fa fa-angle-down"></i></a>
                                <div class="dropdown-box bottom fadeInDown clearfix">
                                    <ul class="item nav-list clearfix">
                                    <?php foreach ($item['children'] as $k => $child): ?>
                    <li class="col-lg-5 col-md-5 col-sm-5 col-xs-3"><a class="btn btn-sm btn-block btn-default" href="<?= $child['url'] ?>"><?= $child['title'] ?></a></li>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                    <?php endforeach; ?>
                    <li class="dropdown-hover visible-sm visible-xs"><a href="javascript:;"><i class="fa fa-bars fa-xl"></i></a>
                        <div class="dropdown-box bottom fadeInDown clearfix">
                            <ul class="item nav-list clearfix">
                                <?php
                                $menu_items = wp_get_menu_array('primary-menu');
                                foreach ($menu_items as $key => $item) : ?>
                                    <?php if (empty($item['children'])) { ?>
                                        <li class="col-lg-5 col-md-5 col-sm-5 col-xs-3"><a class="btn btn-sm btn-block btn-default" href="<?= $item['url'] ?>"><?= $item['title'] ?></a></li>
                                    <?php } else { ?>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="myui-header__search search-box">
                    <form id="search-form" method="get" action="/">
                        <input type="text" id="search" name="s" class="search_wd form-control" onkeyup="fetch()"  value="<?php echo "$s"; ?>" placeholder="Tìm kiếm phim..." autocomplete="off" />
                        <button class="submit search_submit" id="searchbutton" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div id="result"></div>
                    <a class="search-close visible-xs" href="javascript:;"><i class="fa fa-close"></i></a>
                </div>
                <ul class="myui-header__user">
                    <li class="visible-xs"><a class="open-search" href="javascript:;"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

