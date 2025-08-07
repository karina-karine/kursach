<?php
// functions.php
// Author: karina-karine

/**
 * Додавання назви теми в meta тег для інформації.
 */
function kursach_help_theme_info()
{
    echo '<meta name="theme" content="Kursach Help theme">' . "\n";
}
add_action('wp_head', 'kursach_help_theme_info');

/**
 * Додавання класу теми до body.
 */
function kursach_help_body_classes($classes)
{
    $classes[] = 'kursach-help-theme';
    return $classes;
}
add_filter('body_class', 'kursach_help_body_classes');

/**
 * Додавання підтримки теми (title-tag, post-thumbnails, HTML5).
 */
function kursach_help_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'kursach_help_theme_setup');

/**
 * Основна функція для підключення скриптів і стилів.
 */
function kursach_help_enqueue_assets()
{
    wp_enqueue_script('jquery');
    // Підключення основних стилів
    wp_enqueue_style('kursach-help-style', get_stylesheet_uri(), array(), '1.0.0', 'all');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/styles.css', array(), '1.0.0', 'all');
    wp_enqueue_style('services-styles', get_template_directory_uri() . '/css/services-styles.css', array(), '1.0.0', 'all');
    wp_enqueue_style('single-article-styles', get_template_directory_uri() . '/css/single-article-styles.css', array(), '1.0.0', 'all');
    wp_enqueue_style('media-style', get_template_directory_uri() . '/css/media.css', array(), '1.0.0', 'all');

    // Оновлений шлях до script.js
    wp_enqueue_script('kursach-help-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);

    // Локалізація даних для JavaScript (AJAX URL, nonce, Home URL, servicesData)
    // Переконайтеся, що файл services_data.php існує та містить функцію get_services_data()
    if (file_exists(get_template_directory() . '/services_data.php')) {
        require_once get_template_directory() . '/services_data.php';
        $services = get_services_data();
    } else {
        $services = []; // Порожній масив, якщо файл не знайдено
    }

    // --- НОВА ЛОГІКА ДЛЯ ВИЗНАЧЕННЯ ПОЧАТКОВОГО СТАНУ ПОСЛУГ ---
    $current_service_id_from_url = isset($_GET['service_id']) ? sanitize_text_field($_GET['service_id']) : null;
    $is_valid_service_id = ($current_service_id_from_url && isset($services[$current_service_id_from_url]));

    $first_service_id = array_key_first($services);
    $service_to_display_id = $is_valid_service_id ? $current_service_id_from_url : $first_service_id;
    // --- КІНЕЦЬ НОВОЇ ЛОГІКИ ---

    wp_localize_script('kursach-help-script', 'kursachHelpAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'order_form_nonce' => wp_create_nonce('order_form_nonce'),
        'contact_form_nonce' => wp_create_nonce('contact_form_nonce'),
        'homeUrl' => home_url('/'),
        'servicesData' => $services, // Передача даних послуг
        'initialServiceIdFromPHP' => $service_to_display_id, // Передача початкового ID послуги
        'isSingleServiceViewFromPHP' => $is_valid_service_id, // Передача стану відображення
    ));
}
// Залишаємо лише один виклик add_action для wp_enqueue_scripts
add_action('wp_enqueue_scripts', 'kursach_help_enqueue_assets');

/**
 * AJAX обробник для відправки форми замовлення.
 */
function submit_order_form_ajax_handler()
{
    // Перевірка nonce для безпеки
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'order_form_nonce')) {
        wp_send_json_error('Помилка безпеки: недійсний токен форми замовлення.');
    }
    // Санітизація та валідація даних форми
    $name = sanitize_text_field($_POST['user_name']);
    $email = sanitize_email($_POST['user_email']);
    $phone = sanitize_text_field($_POST['user_phone']);
    $study_program = sanitize_text_field($_POST['study_program']);
    $work_type = sanitize_text_field($_POST['work_type']);
    $work_topic = sanitize_text_field($_POST['work_topic']);
    $due_date = sanitize_text_field($_POST['due_date']);
    $uniqueness = sanitize_text_field($_POST['uniqueness']);
    $description = sanitize_textarea_field($_POST['work_description']);
    // Базова валідація
    if (empty($name) || empty($email) || empty($phone) || empty($work_type) || empty($due_date)) {
        wp_send_json_error('Будь ласка, заповніть всі обов\'язкові поля форми замовлення.');
    }
    if (!is_email($email)) {
        wp_send_json_error('Будь ласка, введіть дійсну адресу електронної пошти у формі замовлення.');
    }
    // Формування HTML тіла електронного листа з таблицею
    $message_html = '
        <p>Отримано нове замовлення роботи з сайту:</p>
        <table style="width:100%; border-collapse: collapse; border: 1px solid #ddd; font-family: Arial, sans-serif;">
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; width: 30%; font-weight: bold;">Ім\'я:</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . esc_html($name) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">E-mail:</td>
                <td style="padding: 10px; border: 1px solid #ddd;"><a href="mailto:' . esc_attr($email) . '" style="color: #007bff; text-decoration: none;">' . esc_html($email) . '</a></td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">Телефон:</td>
                <td style="padding: 10px; border: 1px solid #ddd;"><a href="tel:' . esc_attr(preg_replace('/[^0-9+]/', '', $phone)) . '" style="color: #007bff; text-decoration: none;">' . esc_html($phone) . '</a></td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">Навчальна програма:</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . (!empty($study_program) ? esc_html($study_program) : 'Не вказано') . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">Тип роботи:</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . esc_html($work_type) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">Тема роботи:</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . (!empty($work_topic) ? esc_html($work_topic) : 'Не вказано') . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">Дата виконання:</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . esc_html($due_date) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">Унікальність:</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . esc_html($uniqueness) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">Опис:</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . nl2br(esc_html($description)) . '</td>
            </tr>
    ';
    $attachments = array();
    $uploaded_file_names = array();
    // Обробка завантажених файлів
    if (!empty($_FILES['uploaded_files']['name'][0])) {
        $files = $_FILES['uploaded_files'];
        foreach ($files['name'] as $key => $value) {
            if ($files['error'][$key] == UPLOAD_ERR_OK) {
                // Переміщуємо тимчасовий файл у тимчасову директорію WordPress
                // Це необхідно, оскільки wp_mail() очікує шлях до файлу, а не його вміст
                $temp_file = wp_tempnam($value); // Створює унікальне ім'я файлу в тимчасовій директорії
                if (move_uploaded_file($files['tmp_name'][$key], $temp_file)) {
                    $attachments[] = $temp_file;
                    $uploaded_file_names[] = basename($value); // Зберігаємо оригінальне ім'я для повідомлення
                }
            }
        }
        if (!empty($uploaded_file_names)) {
            $message_html .= '<tr>
                                        <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">Прикріплені файли:</td>
                                        <td style="padding: 10px; border: 1px solid #ddd;">' . esc_html(implode(', ', $uploaded_file_names)) . '</td>
                                    </tr>';
        }
    }
    $message_html .= '</table>';

    // Адреса отримувача для форми замовлення
    $to = 'ketrinstil71@gmail.com';
    $subject = 'Нове замовлення роботи з сайту: ' . $work_type;

    // Заголовки електронного листа для HTML
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email,
    );

    // Відправка електронного листа через wp_mail (буде перехоплено WP Mail SMTP, якщо встановлено)
    $mail_sent = wp_mail($to, $subject, $message_html, $headers, $attachments);

    // Видаляємо тимчасові файли після відправки
    foreach ($attachments as $file_path) {
        @unlink($file_path);
    }

    if ($mail_sent) {
        wp_send_json_success('Ваше замовлення успішно відправлено! Ми зв\'яжемося з вами найближчим часом.');
    } else {
        wp_send_json_error('Виникла помилка при відправці замовлення. Будь ласка, спробуйте ще раз.');
    }
}
add_action('wp_ajax_submit_order_form', 'submit_order_form_ajax_handler');
add_action('wp_ajax_nopriv_submit_order_form', 'submit_order_form_ajax_handler');

/**
 * AJAX обробник для відправки контактної форми.
 */
function submit_contact_form_ajax_handler()
{
    // Перевірка nonce для безпеки
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'contact_form_nonce')) {
        wp_send_json_error('Помилка безпеки: недійсний токен контактної форми.');
    }

    // Санітизація та валідація даних форми
    $name = sanitize_text_field($_POST['user_name']);
    $email = sanitize_email($_POST['user_email']);
    $message = sanitize_textarea_field($_POST['user_message']);

    // Базова валідація
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Будь ласка, заповніть всі обов\'язкові поля контактної форми.');
    }
    if (!is_email($email)) {
        wp_send_json_error('Будь ласка, введіть дійсну адресу електронної пошти у контактній формі.');
    }

    // Формування HTML тіла електронного листа з таблицею
    $email_body_html = '
        <p>Отримано нове питання з контактної форми сайту:</p>
        <table style="width:100%; border-collapse: collapse; border: 1px solid #ddd; font-family: Arial, sans-serif;">
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; width: 30%; font-weight: bold;">Ім\'я:</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . esc_html($name) . '</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">E-mail:</td>
                <td style="padding: 10px; border: 1px solid #ddd;"><a href="mailto:' . esc_attr($email) . '" style="color: #007bff; text-decoration: none;">' . esc_html($email) . '</a></td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; font-weight: bold;">Повідомлення:</td>
                <td style="padding: 10px; border: 1px solid #ddd;">' . nl2br(esc_html($message)) . '</td>
            </tr>
        </table>
    ';

    // Адреса отримувача для контактної форми
    $to = 'ketrinstil71@gmail.com';
    $subject = 'Нове питання з контактної форми сайту';

    // Заголовки електронного листа для HTML
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email,
    );

    // Відправка електронного листа через wp_mail (буде перехоплено WP Mail SMTP, якщо встановлено)
    $mail_sent = wp_mail($to, $subject, $email_body_html, $headers);

    if ($mail_sent) {
        wp_send_json_success('Ваше питання успішно відправлено! Ми зв\'яжемося з вами найближчим часом.');
    } else {
        wp_send_json_error('Виникла помилка при відправці питання. Будь ласка, спробуйте ще раз.');
    }
}
add_action('wp_ajax_submit_contact_form', 'submit_contact_form_ajax_handler');
add_action('wp_ajax_nopriv_submit_contact_form', 'submit_contact_form_ajax_handler');
?>