<?php
/*
Template Name: Service Details Page
*/
get_header();
require_once get_template_directory() . '/services_data.php'; // Підключаємо файл з даними
$services = get_services_data();

// Отримуємо ID послуги з URL
$current_service_id = isset($_GET['service_id']) ? sanitize_text_field($_GET['service_id']) : null;

// Знаходимо послугу за ID
$current_service = null;
if ($current_service_id && isset($services[$current_service_id])) {
    $current_service = $services[$current_service_id];
} else {
    // Fallback to the first service if ID is not found or not provided
    $first_service_id = array_key_first($services);
    $current_service = $services[$first_service_id];
    $current_service_id = $first_service_id;
}
?>

<main class="main-content">

    <section class="service-details-section">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a> <!-- In WordPress, use <?php echo home_url(); ?> -->
                / <a href="<?php echo home_url('/services/'); ?>">Наші послуги</a>
                <!-- Посилання на сторінку, якщо вона буде, або просто текст -->
                / <span id="detail-breadcrumb-title"><?php echo esc_html($current_service['name']); ?></span>
            </div>
            <h1 class="section-title" id="detail-title"><?php echo esc_html($current_service['name']); ?></h1>

            <div class="service-details-content">
                <div class="service-details-sidebar">
                    <h3 class="sidebar-title">Інші послуги</h3>
                    <ul class="service-nav-list">
                        <?php foreach ($services as $id => $service): ?>
                            <li>
                                <a href="#"
                                    class="service-nav-item <?php echo ($id === $current_service_id) ? 'active' : ''; ?>"
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
                                id="detail-icon"><?php echo esc_html($current_service['icon']); ?></span>
                        </div>
                        <div class="service-details-summary">
                            <p class="service-details-short-description" id="detail-short-description">
                                <?php echo esc_html($current_service['short_description']); ?>
                            </p>
                            <p class="service-details-price" id="detail-price">Ціна від:
                                <?php echo esc_html($current_service['price_from']); ?> грн
                            </p>
                            <p class="service-details-delivery-time" id="detail-delivery-time">Термін виконання:
                                <?php echo esc_html($current_service['delivery_time']); ?>
                            </p>
                        </div>
                    </div>

                    <div class="service-details-full-description" id="detail-full-description">
                        <h3>Повний опис</h3>
                        <p><?php echo nl2br(esc_html($current_service['full_description'])); ?></p>
                    </div>

                    <?php if (!empty($current_service['features'])): ?>
                        <div class="service-details-features">
                            <h3>Особливості послуги</h3>
                            <ul id="detail-features">
                                <?php foreach ($current_service['features'] as $feature): ?>
                                    <li><span class="feature-icon">&#10003;</span> <?php echo esc_html($feature); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($current_service['requirements'])): ?>
                        <div class="service-details-requirements">
                            <h3>Що потрібно від вас</h3>
                            <ul id="detail-requirements">
                                <?php foreach ($current_service['requirements'] as $requirement): ?>
                                    <li><span class="requirement-icon">&#9679;</span> <?php echo esc_html($requirement); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($current_service['process'])): ?>
                        <div class="service-details-process">
                            <h3>Процес виконання</h3>
                            <ol id="detail-process">
                                <?php foreach ($current_service['process'] as $step): ?>
                                    <li><?php echo esc_html($step); ?></li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    <?php endif; ?>

                    <button class="btn btn-primary order-service-btn">Замовити послугу</button>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

<script>
    // Передаємо дані послуг у JavaScript
    const servicesData = <?php echo json_encode($services); ?>;
</script>