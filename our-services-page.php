<?php
/**
 * Template Name: Our Services Page
 * Description: A custom page template for displaying a list of services or a single service detail.
 *
 * @package Kursach_Help
 */
get_header();
require_once get_template_directory() . '/services_data.php';

$services = get_services_data();
$current_service_id_from_url = isset($_GET['service_id']) ? sanitize_text_field($_GET['service_id']) : null;
$is_valid_service_id = ($current_service_id_from_url && isset($services[$current_service_id_from_url]));
$is_single_service_view = $is_valid_service_id;
$service_to_display = null;

if ($is_single_service_view) {
    $service_to_display = $services[$current_service_id_from_url];
} else {
    // If no valid service_id, display the grid of all services.
    // No need to set a default service_to_display here, as the grid iterates through all $services.
}

// Fallback if somehow no service is found (e.g., empty services_data.php)
if (empty($services)) {
    ?>
    <main class="main-content">
        <section class="container">
            <p>Послуги не знайдено або виникла помилка.</p>
        </section>
    </main>
    <?php
    get_footer();
    return;
}
?>
<main class="main-content" itemscope itemtype="https://schema.org/WebPage">
    <?php if (!$is_single_service_view): // Display all services grid ?>
        <section class="services-list-section" id="all-services-grid" itemscope itemtype="https://schema.org/OfferCatalog">
            <div class="container">
                <div class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo home_url(); ?>">
                            <span itemprop="name">Головна</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </span>
                    /
                    <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <span itemprop="name">Наші послуги</span>
                        <meta itemprop="position" content="2" />
                    </span>
                </div>
                <h1 class="section-title">Наші послуги з написання студентських робіт</h1>
                <p class="services-intro">
                    Ми пропонуємо широкий спектр академічних послуг для студентів всіх рівнів навчання.
                    Наша команда досвідчених фахівців готова допомогти вам з будь-якими академічними завданнями.
                </p>
                <div class="services-grid">
                    <?php foreach ($services as $service_id => $service): ?>
                        <a href="<?php echo esc_url(add_query_arg('service_id', $service_id, home_url('/services/'))); ?>"
                            class="service-card" itemprop="itemOffered" itemscope itemtype="https://schema.org/Service">
                            <div class="service-card-icon">
                                <span class="icon-emoji"><?php echo esc_html($service['icon']); ?></span>
                            </div>
                            <div class="service-card-content">
                                <h2 class="service-card-title" itemprop="name"><?php echo esc_html($service['name']); ?></h2>
                                <p class="service-card-description" itemprop="description">
                                    <?php echo esc_html($service['short_description']); ?>
                                </p>
                            </div>
                            <div class="service-card-bottom">
                                <div class="service-card-meta" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                    <span class="service-card-price">від <span
                                            itemprop="price"><?php echo esc_html($service['price_from']); ?></span> <span
                                            itemprop="priceCurrency" content="UAH">грн</span></span>
                                    <span class="service-card-time">Термін:
                                        <?php echo esc_html($service['delivery_time']); ?></span>
                                </div>
                                <div class="service-card-footer">
                                    <span class="service-card-link">Детальніше <span class="arrow">&rarr;</span></span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="services-cta">
                    <h2>Не знайшли потрібну послугу?</h2>
                    <p>Зв'яжіться з нами, і ми обов'язково знайдемо рішення для вашого завдання!</p>
                    <a href="https://t.me/Kursach_manager" target="_blank" class="btn btn-primary">
                        Зв'язатися з нами
                    </a>
                </div>
            </div>
        </section>
    <?php else: // Display single service details ?>
        <section class="service-details-section" id="single-service-details" itemscope
            itemtype="https://schema.org/Service">
            <meta itemprop="name" content="<?php echo esc_attr($service_to_display['name']); ?>">
            <meta itemprop="description" content="<?php echo esc_attr($service_to_display['short_description']); ?>">
            <meta itemprop="url" content="<?php echo esc_url(get_canonical_url()); ?>">
            <meta itemprop="image" content="<?php echo esc_url($service_to_display['hero_image_url']); ?>">
            <div class="container">
                <div class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo home_url(); ?>">
                            <span itemprop="name">Головна</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </span>
                    /
                    <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo home_url('/services/'); ?>" id="breadcrumb-services-link">
                            <span itemprop="name">Наші послуги</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </span>
                    /
                    <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <span itemprop="name"
                            id="detail-breadcrumb-title"><?php echo esc_html($service_to_display['name']); ?></span>
                        <meta itemprop="position" content="3" />
                    </span>
                </div>
                <div class="service-details-hero-wrapper">
                    <h1 class="service-details-hero-main-title" id="detail-title">
                        <?php echo esc_html($service_to_display['name']); ?>
                    </h1>
                    <div class="service-details-hero-content">
                        <div class="service-details-hero-text-left">
                            <p class="service-details-hero-description" id="detail-short-description">
                                <?php echo esc_html($service_to_display['short_description']); ?>
                            </p>
                        </div>
                        <div class="service-details-hero-image-center">
                            <div class="service-details-hero-circles-background">
                                <div class="circle-outer">
                                    <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.15)"
                                            stroke="rgba(59, 130, 246, 0.3)" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="circle-middle">
                                    <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.25)"
                                            stroke="rgba(59, 130, 246, 0.4)" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="circle-inner">
                                    <svg viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M 0 200 A 200 200 0 0 1 400 200 Z" fill="rgba(59, 130, 246, 0.4)"
                                            stroke="rgba(59, 130, 246, 0.6)" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="service-details-hero-image-container">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/hero-student.png"
                                    alt="<?php echo esc_attr($service_to_display['name']); ?>"
                                    class="service-details-hero-img" itemprop="image">
                            </div>
                            <div class="service-details-hero-actions-overlay">
                                <a href="#orderForm" class="btn btn-primary order-service-btn">ЗАМОВИТИ РОБОТУ</a>
                            </div>
                        </div>
                        <div class="service-details-hero-rating-right">
                            <div class="rating-stars">★★★★★</div>
                            <p class="rating-text"><strong>25 000+</strong> позитивних відгуків</p>
                        </div>
                    </div>
                </div>
                <div class="service-details-content">
                    <div class="service-details-sidebar">
                        <h3 class="sidebar-title">Інші послуги</h3>
                        <ul class="service-nav-list">
                            <?php foreach ($services as $id => $service): ?>
                                <li>
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
                                    id="detail-icon-summary"><?php echo esc_html($service_to_display['icon']); ?></span>
                            </div>
                            <div class="service-details-summary" itemprop="offers" itemscope
                                itemtype="https://schema.org/Offer">
                                <p class="service-details-price" id="detail-price-summary">Ціна від:
                                    <span itemprop="price"><?php echo esc_html($service_to_display['price_from']); ?></span>
                                    <span itemprop="priceCurrency" content="UAH">грн</span>
                                </p>
                                <p class="service-details-delivery-time" id="detail-delivery-time-summary">Термін виконання:
                                    <?php echo esc_html($service_to_display['delivery_time']); ?>
                                </p>
                            </div>
                        </div>
                        <div class="service-details-full-description" id="detail-full-description">
                            <h3>Повний опис</h3>
                            <p itemprop="description">
                                <?php echo nl2br(esc_html($service_to_display['full_description'])); ?>
                            </p>
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
    <?php endif; ?>
</main>
<?php get_footer(); ?>