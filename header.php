<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/mytheme-font.css" type="text/css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/mytheme-ui.css" type="text/css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/mytheme-site.css" type="text/css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/mytheme-color2.css" type="text/css" name="default" />
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/mytheme-color0.css" type="text/css" name="skin" disabled />
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/mytheme-color2.css" type="text/css" name="skin" disabled />
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/layer.css" type="text/css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/custom.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js" integrity="sha512-f0VlzJbcEB6KiW8ZVtL+5HWPDyW1+nJEjguZ5IVnSQkvZbwBt2RfCBY0CBO1PsMAqxxrG4Di6TfsCPP3ZRwKpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/layer/layer.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/mytheme-site.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/mytheme-ui.js"></script>
</head>
<body>
<?php include_once THEME_URL.'/templates/header.php' ?>
<script type="text/javascript">
    MyTheme.Other.Headroom();
</script>
<?php if(get_option('ophim_is_ads') == 'on') { ?>
<div id=top_addd style="text-align: center"></div>
<?php } ?>