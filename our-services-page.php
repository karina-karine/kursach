<?php
/*
Template Name: Our Services Page
*/
get_header();
require_once get_template_directory() . '/services_data.php'; // Підключаємо файл з даними
$services = get_services_data();

// Отримуємо ID послуги з URL
$current_service_id_from_url = isset($_GET['service_id']) ? sanitize_text_field($_GET['service_id']) : null;

// Перевіряємо, чи існує послуга з таким ID
$is_valid_service_id = ($current_service_id_from_url && isset($services[$current_service_id_from_url]));

// Визначаємо, чи потрібно відображати деталі однієї послуги
$is_single_service_view = $is_valid_service_id;

// Визначаємо, яка послуга буде відображена за замовчуванням, якщо service_id недійсний або відсутній
$service_to_display = null;
if ($is_single_service_view) {
    $service_to_display = $services[$current_service_id_from_url];
} else {
    // Якщо service_id недійсний або відсутній, беремо першу послугу для ініціалізації JS
    $first_service_id = array_key_first($services);
    $service_to_display = $services[$first_service_id];
    $current_service_id_from_url = $first_service_id; // Встановлюємо для JS
}

// Ensure $service_to_display is not null before proceeding with HTML output
if (is_null($service_to_display)) {
    echo '<p>Послуги не знайдено або виникла помилка.</p>';
    get_footer();
    return; // Stop execution
}

?>

<main class="main-content">
    <!-- Секція для відображення сітки всіх послуг -->
    <section class="services-list-section" id="all-services-grid"
        style="display: <?php echo $is_single_service_view ? 'none' : 'block'; ?>;">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a>
                / <span>Наші послуги</span>
            </div>
            <h1 class="section-title">Наші послуги</h1>
            <p class="services-intro">
                Ми пропонуємо широкий спектр академічних послуг для студентів всіх рівнів навчання.
                Наша команда досвідчених фахівців готова допомогти вам з будь-якими академічними завданнями.
            </p>
            <div class="services-grid">
                <?php foreach ($services as $service_id => $service): ?>
                    <a href="<?php echo esc_url(add_query_arg('service_id', $service_id, home_url('/services/'))); ?>"
                        class="service-card">
                        <div class="service-card-icon">
                            <span class="icon-emoji"><?php echo esc_html($service['icon']); ?></span>
                        </div>
                        <div class="service-card-content">
                            <h2 class="service-card-title"><?php echo esc_html($service['name']); ?></h2>
                            <p class="service-card-description"><?php echo esc_html($service['short_description']); ?></p>
                            <div class="service-card-meta">
                                <span class="service-card-price">від <?php echo esc_html($service['price_from']); ?>
                                    грн</span>
                                <span class="service-card-time"><?php echo esc_html($service['delivery_time']); ?></span>
                            </div>
                        </div>
                        <div class="service-card-footer">
                            <span class="service-card-link">Детальніше <span class="arrow">&rarr;</span></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="services-cta">
                <h2>Не знайшли потрібну послугу?</h2>
                <p>Зв'яжіться з нами, і ми обов'язково знайдемо рішення для вашого завдання!</p>
                <a href="<?php echo home_url('/contacts/'); ?>" class="btn btn-primary">Зв'язатися з нами</a>
            </div>
        </div>
    </section>

    <!-- Секція для відображення деталей однієї послуги -->
    <section class="service-details-section" id="single-service-details"
        style="display: <?php echo $is_single_service_view ? 'block' : 'none'; ?>;">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a>
                / <a href="<?php echo home_url('/services/'); ?>" id="breadcrumb-services-link">Наші послуги</a>
                / <span id="detail-breadcrumb-title"><?php echo esc_html($service_to_display['name']); ?></span>
            </div>
            <h1 class="section-title" id="detail-title"><?php echo esc_html($service_to_display['name']); ?></h1>
            <div class="service-details-content">
                <div class="service-details-sidebar">
                    <h3 class="sidebar-title">Інші послуги</h3>
                    <ul class="service-nav-list">
                        <?php foreach ($services as $id => $service): ?>
                            <li>
                                <!-- Змінено href на повний URL, щоб уникнути # -->
                                <a href="<?php echo esc_url(add_query_arg('service_id', $id, home_url('/services/'))); ?>"
                                    class="service-nav-item <?php echo ($id === $current_service_id_from_url) ? 'active' : ''; ?>"
                                    data-service-id="<?php echo esc_attr($id); ?>">
                                    <?php echo esc_html($service['name']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="service-details-main">
                    <div class="service-details-header">
                        <div class="service-details-icon" id="detail-icon-container">
                            <span class="icon-emoji"
                                id="detail-icon"><?php echo esc_html($service_to_display['icon']); ?></span>
                        </div>
                        <div class="service-details-summary">
                            <p class="service-details-short-description" id="detail-short-description">
                                <?php echo esc_html($service_to_display['short_description']); ?>
                            </p>
                            <p class="service-details-price" id="detail-price">Ціна від:
                                <?php echo esc_html($service_to_display['price_from']); ?> грн
                            </p>
                            <p class="service-details-delivery-time" id="detail-delivery-time">Термін виконання:
                                <?php echo esc_html($service_to_display['delivery_time']); ?>
                            </p>
                        </div>
                    </div>
                    <div class="service-details-full-description" id="detail-full-description">
                        <h3>Повний опис</h3>
                        <p><?php echo nl2br(esc_html($service_to_display['full_description'])); ?></p>
                    </div>
                    <?php if (!empty($service_to_display['features'])): ?>
                        <div class="service-details-features">
                            <h3>Особливості послуги</h3>
                            <ul id="detail-features">
                                <?php foreach ($service_to_display['features'] as $feature): ?>
                                    <li><span class="feature-icon">&#10003;</span> <?php echo esc_html($feature); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($service_to_display['requirements'])): ?>
                        <div class="service-details-requirements">
                            <h3>Що потрібно від вас</h3>
                            <ul id="detail-requirements">
                                <?php foreach ($service_to_display['requirements'] as $requirement): ?>
                                    <li><span class="requirement-icon">&#9679;</span> <?php echo esc_html($requirement); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($service_to_display['process'])): ?>
                        <div class="service-details-process">
                            <h3>Процес виконання</h3>
                            <ol id="detail-process">
                                <?php foreach ($service_to_display['process'] as $step): ?>
                                    <li><?php echo esc_html($step); ?></li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    <?php endif; ?>
                    <a href="<?php echo home_url('#orderForm'); ?>" class="btn btn-primary order-service-btn">Замовити
                        послугу</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>