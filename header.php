<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kursach_Help
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right');
    bloginfo('name'); ?></title>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        .hero-text-left::before {
            content: url('<?php echo get_template_directory_uri(); ?>/assets/quote.png');
            z-index: -1;
            width: 20px;
            height: 20px;
            position: absolute;
            top: 6%;
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="КУРСАЧ логотип"
                        class="logo-img">
                </a>
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="<?php echo home_url('/services/'); ?>" class="nav-link">Наші послуги <span
                                    class="nav-arrow">▼</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo home_url('/quarantees/'); ?>" class="nav-link">Гарантії</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo home_url('/cooperation/'); ?>" class="nav-link">Співпраця</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo home_url('/blog/'); ?>" class="nav-link">Блог</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo home_url('/contacts/'); ?>" class="nav-link">Контакти</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">UA <span class="nav-arrow">▼</span></a>
                        </li>
                    </ul>
                </nav>
                <div class="header-actions">
                    <div class="social-icons">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/tg_icon.svg"
                                alt="telegram icon">
                        </a>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/viber_icon.svg"
                                alt="viber icon">
                        </a>
                    </div>
                    <button class="btn btn-secondary header-cta">РОЗРАХУВАТИ ЦІНУ</button>
                </div>
                <button class="mobile-menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">

    </div>