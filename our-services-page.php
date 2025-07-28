<?php
/*
Template Name: Our Services Page
*/
get_header();
require_once get_template_directory() . '/services_data.php'; // Підключаємо файл з даними
$services = get_services_data();
?>

<main class="main-content">
    <section class="services-list-section">
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
                    <a href="<?php echo esc_url(add_query_arg('service_id', $service_id, home_url('/service-details/'))); ?>"
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
</main>

<?php get_footer(); ?>