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
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css"> -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        .hero-text-left::before {
            content: url('<?php echo get_template_directory_uri(); ?>/assets/quote.png');
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
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/instagram_icon.svg"
                                alt="Instagram">
                        </a>
                    </div>
                    <a href="<?php echo home_url('#orderForm'); ?>" class="btn btn-secondary header-cta">РОЗРАХУВАТИ
                        ЦІНУ</a>
                </div>
                <button class="mobile-menu-toggle" aria-label="Toggle mobile menu" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" aria-hidden="true">
        <div class="mobile-menu-content">
            <div class="mobile-menu-header">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="КУРСАЧ логотип"
                        class="logo-img">
                </a>
                <div class="mobile-social-icons">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/tg_icon.svg"
                            alt="telegram icon"></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/instagram_icon.svg"
                            alt="Instagram"></a>
                </div>
                <button class="mobile-menu-close" aria-label="Close mobile menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
            <a href="<?php echo home_url('#orderForm'); ?>" class="btn btn-secondary mobile-header-cta">РОЗРАХУВАТИ
                ЦІНУ</a>
            <nav class="mobile-nav">
                <ul class="mobile-nav-list">
                    <li class="mobile-nav-item">
                        <a href="<?php echo home_url('/services/'); ?>" class="mobile-nav-link">Наші послуги</a>
                    </li>
                    <li class="mobile-nav-item"><a href="<?php echo home_url('/quarantees/'); ?>"
                            class="mobile-nav-link">Гарантії</a></li>
                    <li class="mobile-nav-item"><a href="<?php echo home_url('/cooperation/'); ?>"
                            class="mobile-nav-link">Співпраця</a></li>
                    <li class="mobile-nav-item"><a href="<?php echo home_url('/blog/'); ?>"
                            class="mobile-nav-link">Блог</a></li>
                    <li class="mobile-nav-item"><a href="<?php echo home_url('/contacts/'); ?>"
                            class="mobile-nav-link">Контакти</a></li>
                    <li class="mobile-nav-item has-dropdown">
                        <a href="#" class="mobile-nav-link" aria-haspopup="true" aria-expanded="false">UA <span
                                class="mobile-nav-arrow">▼</span></a>
                        <ul class="mobile-submenu">
                            <li><a href="#">EN</a></li>
                            <li><a href="#">RU</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="mobile-contact-info">
                <h3>Контакти</h3>
                <p>(063) 267 73 71</p>
                <p>(095) 438 73 68</p>
                <p>kursach.net.ua@gmail.com</p>
                <div class="mobile-social-media">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/instagram_icon.svg"
                            alt="Instagram"></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/tiktok_icon.svg"
                            alt="TikTok"></a>
                </div>
            </div>
            <div class="mobile-working-hours">
                <h3>Ми працюємо:</h3>
                <p>ПН-НД: з 10.00 - 22.00</p>
            </div>
        </div>
    </div>
    <!-- End Mobile Menu Overlay -->