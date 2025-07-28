<?php
// Додавання назви теми в meta тег
function kursach_help_theme_info()
{
    echo '<meta name="theme" content="Kursach Help theme">' . "\n";
    echo '<!-- Theme: Kursach Help theme -->' . "\n";
}
add_action('wp_head', 'kursach_help_theme_info');

// Основна функція для підключення скриптів і стилів
function kursach_help_scripts()
{
    wp_enqueue_style('kursach-help-style', get_stylesheet_uri());
    wp_enqueue_script('kursach-help-script', get_template_directory_uri() . '/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'kursach_help_scripts');

// Розширена функція для підключення стилів і скриптів
function theme_enqueue_styles_and_scripts()
{
    // Підключення загальних стилів (якщо вони не підключені іншим способом)
    // wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/styles.css', array(), '1.0.0', 'all' ); // Ваш існуючий styles.css

    // Підключення стилів для сторінок послуг та хедера
    wp_enqueue_style('services-styles', get_template_directory_uri() . '/css/services-styles.css', array(), '1.0.0', 'all');

    // Підключення стилів для сторінки окремої статті
    wp_enqueue_style('single-article-styles', get_template_directory_uri() . '/css/single-article-styles.css', array(), '1.0.0', 'all');


    // Підключення скрипту для сторінки деталей послуги
    if (is_page_template('service-details-page.php')) {
        wp_enqueue_script('service-details-script', get_template_directory_uri() . '/js/service-details.js', array('jquery'), '1.0.0', true); // true для завантаження в футері
        // Дані послуг тепер вбудовуються безпосередньо в service-details-page.php за допомогою json_encode
    }

    // Підключення скрипту для функціоналу випадаючого списку в хедері
    // Цей скрипт повинен бути підключений після jQuery, якщо він використовується
    wp_enqueue_script('header-dropdown-script', get_template_directory_uri() . '/js/header-dropdown.js', array('jquery'), '1.0.0', true);

    // Передача даних послуг та home_url до JavaScript
    require_once get_template_directory() . '/services_data.php'; // Підключаємо файл з даними
    wp_localize_script(
        'header-dropdown-script',
        'kursachHelpData', // Назва об'єкта в JS
        array(
            'servicesData' => get_services_data(),
            'homeUrl' => home_url('/')
        )
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles_and_scripts');

// Альтернативний спосіб: додавання назви теми до body class
function kursach_help_body_classes($classes)
{
    $classes[] = 'kursach-help-theme';
    return $classes;
}
add_filter('body_class', 'kursach_help_body_classes');

// Додавання підтримки теми
function kursach_help_theme_setup()
{
    // Додавання підтримки заголовка сайту
    add_theme_support('title-tag');
    // Додавання підтримки міні-зображень постів
    add_theme_support('post-thumbnails');
    // Додавання підтримки HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'kursach_help_theme_setup');
