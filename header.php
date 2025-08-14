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

    <?php
    require_once get_template_directory() . '/article-data.php';
    require_once get_template_directory() . '/services_data.php'; // Include services data
    
    $current_article_for_meta = null;
    if (isset($_GET['slug'])) {
        $all_articles_data_for_meta = get_articles_data();
        $current_article_slug_for_meta = sanitize_text_field($_GET['slug']);
        if (isset($all_articles_data_for_meta[$current_article_slug_for_meta])) {
            $current_article_for_meta = $all_articles_data_for_meta[$current_article_slug_for_meta];
        }
    }

    $current_service_for_meta = null;
    $is_single_service_page = false;
    if (is_page_template('our-services-page.php') && isset($_GET['service_id'])) {
        $all_services_data_for_meta = get_services_data();
        $current_service_id_for_meta = sanitize_text_field($_GET['service_id']);
        if (isset($all_services_data_for_meta[$current_service_id_for_meta])) {
            $current_service_for_meta = $all_services_data_for_meta[$current_service_id_for_meta];
            $is_single_service_page = true;
        }
    }

    // Determine title
    $page_title = get_bloginfo('name');
    $current_page_id = get_the_ID(); // Отримуємо ID поточної сторінки
    
    if (!is_null($current_article_for_meta)) {
        $page_title = esc_html($current_article_for_meta['title']) . ' | ' . $page_title;
    } elseif ($is_single_service_page && !is_null($current_service_for_meta)) {
        $page_title = esc_html($current_service_for_meta['meta_title']) . ' | ' . $page_title;
    } elseif (is_front_page() || is_home()) {
        $page_title = 'Написання студентських робіт на замовлення: Курсові, Дипломні, Реферати | ' . $page_title;
    } elseif (is_page_template('blog-template.php')) {
        $page_title = 'Блог Kursach.net.ua: Корисні Статті та Поради для Студентів | ' . $page_title;
    } elseif (is_page_template('our-services-page.php')) {
        $page_title = 'Наші послуги: Курсові, Дипломні, Магістерські роботи на замовлення | ' . $page_title;
    } elseif (is_page_template('guarantees.php') && $current_page_id) {
        $page_title = get_the_title($current_page_id) . ' | ' . $page_title;
    } elseif (is_page_template('cooperation.php') && $current_page_id) {
        $page_title = get_the_title($current_page_id) . ' | ' . $page_title;
    } elseif (is_page_template('contacts.php') && $current_page_id) { // Припускаємо, що у вас є шаблон contacts.php
        $page_title = get_the_title($current_page_id) . ' | ' . $page_title;
    } elseif (is_singular() && $current_page_id) { // Для будь-якої іншої окремої сторінки/запису
        $page_title = get_the_title($current_page_id) . ' | ' . $page_title;
    } else {
        // Запасний варіант, якщо жодна з умов не спрацювала, використовуємо загальний заголовок WordPress
        $page_title = wp_get_document_title() . ' | ' . $page_title;
    }

    // Determine description
    $page_description = get_bloginfo('description');
    if (!is_null($current_article_for_meta)) {
        $page_description = esc_attr($current_article_for_meta['description']);
    } elseif ($is_single_service_page && !is_null($current_service_for_meta)) {
        $page_description = esc_attr($current_service_for_meta['meta_description']);
    } elseif (is_front_page() || is_home()) {
        $page_description = 'Професійне написання курсових, дипломних, магістерських робіт та рефератів на замовлення в Україні. Гарантуємо унікальність, якість та супровід до захисту. Замовте роботу онлайн!';
    } elseif (is_page_template('blog-template.php')) {
        $page_description = 'Читайте корисні статті та поради для студентів від Kursach.net.ua. Все про написання курсових, дипломних, рефератів, уникнення плагіату та ефективне навчання.';
    } elseif (is_page_template('our-services-page.php')) {
        $page_description = 'Повний перелік послуг з написання студентських робіт: курсові, дипломні, магістерські, реферати, звіти з практики та мотиваційні листи. Якісно, швидко, конфіденційно.';
    } elseif (is_singular()) {
        if (has_excerpt()) {
            $page_description = wp_strip_all_tags(get_the_excerpt());
        } else {
            $page_description = wp_trim_words(wp_strip_all_tags(get_the_content()), 30);
        }
    }

    // Determine image for Open Graph/Twitter
    $og_image = get_template_directory_uri() . '/assets/hero-student.png'; // Default image
    if (!is_null($current_article_for_meta) && isset($current_article_for_meta['image'])) {
        $og_image = esc_url($current_article_for_meta['image']);
    } elseif ($is_single_service_page && !is_null($current_service_for_meta) && isset($current_service_for_meta['hero_image_url'])) {
        $og_image = esc_url($current_service_for_meta['hero_image_url']);
    }
    ?>

    <title><?php echo $page_title; ?></title>
    <meta name="description" content="<?php echo esc_attr($page_description); ?>">
    <link rel="canonical" href="<?php echo esc_url(get_canonical_url()); ?>">

    <meta property="og:title" content="<?php echo esc_attr($page_title); ?>">
    <meta property="og:description" content="<?php echo esc_attr($page_description); ?>">
    <meta property="og:url" content="<?php echo esc_url(get_canonical_url()); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:type" content="<?php echo (!is_null($current_article_for_meta) || $is_single_service_page) ? 'article' : 'website'; ?>">
    <meta property="og:image" content="<?php echo $og_image; ?>">
    <meta property="og:locale" content="uk_UA">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr($page_title); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($page_description); ?>">
    <meta name="twitter:image" content="<?php echo $og_image; ?>">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

    <?php wp_head(); ?>

    <style>
        .hero-text-left::before {
            content: url('<?php echo get_template_directory_uri(); ?>/assets/quote.png');
        }
    </style>

    <script type="application/ld+json">
    <?php
    $schema_data = [];

    if ($is_single_service_page && !is_null($current_service_for_meta)) {
        // Schema for a single service page
        $schema_data = [
            "@context" => "https://schema.org",
            "@type" => "Service",
            "name" => esc_html($current_service_for_meta['name']),
            "description" => esc_html($current_service_for_meta['full_description']),
            "url" => esc_url(get_canonical_url()),
            "image" => esc_url($current_service_for_meta['hero_image_url']),
            "provider" => [
                "@type" => "LocalBusiness",
                "name" => "Написання Студентських Робіт на Замовлення",
                "url" => home_url('/'),
                "logo" => get_template_directory_uri() . "/assets/logo.png",
                "contactPoint" => [
                    "@type" => "ContactPoint",
                    "telephone" => "+380-ХХ-ХХХ-ХХХХ",
                    "contactType" => "customer service",
                    "email" => "info@yourwebsite.com"
                ]
            ],
            "offers" => [
                "@type" => "Offer",
                "priceCurrency" => "UAH",
                "price" => esc_html($current_service_for_meta['price_from']),
                "availability" => "https://schema.org/InStock",
                "url" => esc_url(get_canonical_url())
            ],
            "serviceType" => "Academic Writing Service",
            "areaServed" => [
                "@type" => "Country",
                "name" => "UA"
            ]
        ];
    } elseif (is_page_template('our-services-page.php')) {
        // Schema for the main services page (OfferCatalog)
        $offer_list_elements = [];
        foreach (get_services_data() as $service_id => $service) {
            $offer_list_elements[] = [
                "@type" => "Offer",
                "itemOffered" => [
                    "@type" => "Service",
                    "name" => esc_html($service['name']),
                    "description" => esc_html($service['short_description']),
                    "serviceType" => "Academic Writing Service",
                    "areaServed" => [
                        "@type" => "Country",
                        "name" => "UA"
                    ]
                ],
                "offers" => [
                    "@type" => "Offer",
                    "priceCurrency" => "UAH",
                    "price" => esc_html($service['price_from']),
                    "availability" => "https://schema.org/InStock",
                    "url" => esc_url(add_query_arg('service_id', $service_id, home_url('/services/')))
                ]
            ];
        }

        $schema_data = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => "WebPage",
                    "@id" => home_url('/services/#webpage'),
                    "url" => home_url('/services/'),
                    "name" => "Наші послуги: Курсові, Дипломні, Магістерські роботи на замовлення",
                    "description" => "Повний перелік послуг з написання студентських робіт: курсові, дипломні, магістерські, реферати, звіти з практики та мотиваційні листи. Якісно, швидко, конфіденційно.",
                    "inLanguage" => "uk-UA",
                    "breadcrumb" => [
                        "@type" => "BreadcrumbList",
                        "itemListElement" => [
                            [
                                "@type" => "ListItem",
                                "position" => 1,
                                "name" => "Головна",
                                "item" => home_url('/')
                            ],
                            [
                                "@type" => "ListItem",
                                "position" => 2,
                                "name" => "Наші послуги",
                                "item" => home_url('/services/')
                            ]
                        ]
                    ],
                    "mainEntity" => [
                        "@type" => "OfferCatalog",
                        "name" => "Каталог послуг з написання робіт",
                        "itemListElement" => $offer_list_elements
                    ]
                ],
                [
                    "@type" => "LocalBusiness",
                    "@id" => home_url('/#organization'),
                    "name" => "Написання Студентських Робіт на Замовлення",
                    "url" => home_url('/'),
                    "logo" => get_template_directory_uri() . "/assets/logo.png",
                    "image" => get_template_directory_uri() . "/assets/hero-student.png",
                    "description" => "Сервіс професійного написання студентських робіт: курсових, дипломних, магістерських, рефератів та звітів з практики. Гарантуємо високу якість, унікальність та супровід до захисту.",
                    "address" => [
                        "@type" => "PostalAddress",
                        "streetAddress" => "Ваша вулиця",
                        "addressLocality" => "Ваше місто",
                        "addressRegion" => "Ваша область",
                        "postalCode" => "Ваш індекс",
                        "addressCountry" => "UA"
                    ],
                    "contactPoint" => [
                        "@type" => "ContactPoint",
                        "telephone" => "+380-ХХ-ХХХ-ХХХХ",
                        "contactType" => "customer service",
                        "email" => "info@yourwebsite.com"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "5",
                        "reviewCount" => "25000"
                    ]
                ]
            ]
        ];
    } else {
        // Existing schema for homepage, blog, etc.
        $schema_data = [
            "@context" => "https://schema.org",
            "@graph" => [
                [
                    "@type" => "WebSite",
                    "@id" => home_url('/#website'),
                    "url" => home_url('/'),
                    "name" => "Написання Студентських Робіт на Замовлення",
                    "description" => "Професійне написання курсових, дипломних, магістерських робіт та рефератів з гарантією якості та унікальності.",
                    "publisher" => [
                        "@id" => home_url('/#organization')
                    ],
                    "potentialAction" => [
                        "@type" => "SearchAction",
                        "target" => [
                            "@type" => "EntryPoint",
                            "urlTemplate" => home_url('/?s={search_term_string}')
                        ],
                        "query-input" => "required name=search_term_string"
                    ],
                    "inLanguage" => "uk-UA"
                ],
                [
                    "@type" => "LocalBusiness",
                    "@id" => home_url('/#organization'),
                    "name" => "Написання Студентських Робіт на Замовлення",
                    "url" => home_url('/'),
                    "logo" => get_template_directory_uri() . "/assets/logo.png",
                    "image" => get_template_directory_uri() . "/assets/hero-student.png",
                    "description" => "Сервіс професійного написання студентських робіт: курсових, дипломних, магістерських, рефератів та звітів з практики. Гарантуємо високу якість, унікальність та супровід до захисту.",
                    "address" => [
                        "@type" => "PostalAddress",
                        "streetAddress" => "Ваша вулиця",
                        "addressLocality" => "Ваше місто",
                        "addressRegion" => "Ваша область",
                        "postalCode" => "Ваш індекс",
                        "addressCountry" => "UA"
                    ],
                    "contactPoint" => [
                        "@type" => "ContactPoint",
                        "telephone" => "+380-ХХ-ХХХ-ХХХХ",
                        "contactType" => "customer service",
                        "email" => "info@yourwebsite.com"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "5",
                        "reviewCount" => "25000"
                    ],
                    "hasOfferCatalog" => [
                        "@type" => "OfferCatalog",
                        "name" => "Каталог послуг з написання робіт",
                        "itemListElement" => [
                            [
                                "@type" => "OfferCatalog",
                                "name" => "Курсові роботи",
                                "itemListElement" => [
                                    [
                                        "@type" => "Offer",
                                        "itemOffered" => [
                                            "@type" => "Service",
                                            "name" => "Написання курсової роботи",
                                            "description" => "Професійне написання курсових робіт від 1 дня, унікальність від 80%, безкоштовні правки 1 місяць. Включає план, консультації, звіт антиплагіату.",
                                            "serviceType" => "Academic Writing Service",
                                            "areaServed" => [
                                                "@type" => "Country",
                                                "name" => "UA"
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            [
                                "@type" => "OfferCatalog",
                                "name" => "Дипломні роботи",
                                "itemListElement" => [
                                    [
                                        "@type" => "Offer",
                                        "itemOffered" => [
                                            "@type" => "Service",
                                            "name" => "Написання дипломної роботи",
                                            "description" => "Написання дипломних робіт від 3 днів, унікальність від 80%, безкоштовні правки 1 місяць. Включає план, консультації, звіт антиплагіату.",
                                            "serviceType" => "Academic Writing Service",
                                            "areaServed" => [
                                                "@type" => "Country",
                                                "name" => "UA"
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            [
                                "@type" => "OfferCatalog",
                                "name" => "Магістерські роботи",
                                "itemListElement" => [
                                    [
                                        "@type" => "Offer",
                                        "itemOffered" => [
                                            "@type" => "Service",
                                            "name" => "Написання магістерської роботи",
                                            "description" => "Написання магістерських робіт від 10 днів, унікальність від 80%, безкоштовні правки 1 місяць. Включає план, консультації, звіт антиплагіату.",
                                            "serviceType" => "Academic Writing Service",
                                            "areaServed" => [
                                                "@type" => "Country",
                                                "name" => "UA"
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            [
                                "@type" => "OfferCatalog",
                                "name" => "Реферати",
                                "itemListElement" => [
                                    [
                                        "@type" => "Offer",
                                        "itemOffered" => [
                                            "@type" => "Service",
                                            "name" => "Написання реферату",
                                            "description" => "Написання рефератів від 1 дня, унікальність від 70%, безкоштовні правки 1 тиждень. Включає оформлення згідно стандартів, список літератури.",
                                            "serviceType" => "Academic Writing Service",
                                            "areaServed" => [
                                                "@type" => "Country",
                                                "name" => "UA"
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            [
                                "@type" => "OfferCatalog",
                                "name" => "Звіти з практики",
                                "itemListElement" => [
                                    [
                                        "@type" => "Offer",
                                        "itemOffered" => [
                                            "@type" => "Service",
                                            "name" => "Написання звіту з практики",
                                            "description" => "Написання звітів з практики від 2 днів, унікальність від 65%, безкоштовні правки 1 місяць. Включає опис підприємства, практичні завдання, щоденник практики.",
                                            "serviceType" => "Academic Writing Service",
                                            "areaServed" => [
                                                "@type" => "Country",
                                                "name" => "UA"
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            [
                                "@type" => "OfferCatalog",
                                "name" => "Мотиваційні листи",
                                "itemListElement" => [
                                    [
                                        "@type" => "Offer",
                                        "itemOffered" => [
                                            "@type" => "Service",
                                            "name" => "Написання мотиваційного листа",
                                            "description" => "Написання мотиваційних листів за 1 день, унікальність 100%, безкоштовні правки 3 дні. Індивідуальний підхід, відповідність вимогам ВНЗ.",
                                            "serviceType" => "Academic Writing Service",
                                            "areaServed" => [
                                                "@type" => "Country",
                                                "name" => "UA"
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            [
                                "@type" => "OfferCatalog",
                                "name" => "Інші види робіт",
                                "itemListElement" => [
                                    [
                                        "@type" => "Offer",
                                        "itemOffered" => [
                                            "@type" => "Service",
                                            "name" => "Написання інших видів студентських робіт",
                                            "description" => "Написання рефератів, контрольних, презентацій, індивідуальних завдань. Терміни та ціна за домовленістю, унікальність від 60%.",
                                            "serviceType" => "Academic Writing Service",
                                            "areaServed" => [
                                                "@type" => "Country",
                                                "name" => "UA"
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
    echo json_encode($schema_data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    ?>
    </script>

</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="Логотип КУРСАЧ - професійне написання студентських робіт"
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
                            <a href="#" class="nav-link" aria-haspopup="true" aria-expanded="false">UA <span class="nav-arrow">▼</span></a>
                        </li>
                    </ul>
                </nav>
                <div class="header-actions">
                    <div class="social-icons">
                        <a href="https://t.me/Kursach_manager" target="_blank" aria-label="Telegram">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/tg_icon.svg"
                                alt="Іконка Telegram для зв'язку з менеджером">
                        </a>
                        <a href="https://www.instagram.com/kursach.net.ua/" target="_blank" aria-label="Instagram">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/instagram_icon.svg"
                                alt="Іконка Instagram для переходу на сторінку Kursach.net.ua">
                        </a>
                    </div>
                    <a href="#orderForm" class="btn btn-secondary header-cta">РОЗРАХУВАТИ ЦІНУ</a>
                </div>
                <button class="mobile-menu-toggle" aria-label="Відкрити мобільне меню" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
    </div>
    <div class="mobile-menu-overlay" aria-hidden="true">
        <div class="mobile-menu-content">
            <div class="mobile-menu-header">
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="Логотип КУРСАЧ"
                        class="logo-img">
                </a>
                <button class="mobile-menu-close" aria-label="Закрити мобільне меню">
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
                    <a href="https://www.instagram.com/kursach.net.ua/" target="_blank" aria-label="Instagram"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/instagram_icon.svg"
                            alt="Іконка Instagram"></a>
                    <a href="https://www.tiktok.com/@kursach.net_ua?_t=ZM-8vDjQ0YuFlv&_r=1" target="_blank" aria-label="TikTok"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/tiktok_icon.svg" alt="Іконка TikTok"></a>
                    <a href="https://t.me/Kursach_manager" target="_blank" aria-label="Telegram"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/tg_icon.svg" alt="Іконка Telegram"></a>
                </div>
            </div>
            <div class="mobile-working-hours">
                <h3>Ми працюємо:</h3>
                <p>ПН-НД: з 10.00 - 22.00</p>
            </div>
        </div>
    </div>
