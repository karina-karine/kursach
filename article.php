<?php
/**
 * Template Name: Single Article Template
 * Description: A custom page template for displaying a single blog article.
 *
 * @package YourThemeName
 */

get_header(); // Включає header.php вашої теми

// Включаємо централізовані дані статей
require_once get_template_directory() . '/article-data.php';

// Отримуємо slug статті з URL-параметра
$current_slug = isset($_GET['slug']) ? sanitize_text_field($_GET['slug']) : '';
$article = $all_articles_data[$current_slug] ?? null;

// Якщо статтю не знайдено, виводимо повідомлення та посилання назад до блогу
if (!$article) {
    ?>
    <main class="container py-5xl">
        <p class="no-posts-message">Статтю не знайдено.</p>
        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-primary mt-lg">Повернутися до блогу</a>
    </main>
    <?php
    get_footer(); // Включає footer.php вашої теми
    return;
}

// Підготовка пов'язаних статей (виключаючи поточну)
$related_articles = [];
$all_slugs = array_keys($all_articles_data);

// Збираємо до 3 інших статей
$count = 0;
foreach ($all_slugs as $slug) {
    if ($slug !== $current_slug) {
        $related_articles[$slug] = $all_articles_data[$slug];
        $count++;
        if ($count >= 3) {
            break;
        }
    }
}

?>

<main class="container">
    <section class="page-header">
        <p class="breadcrumb">
            <a href="<?php echo esc_url(home_url()); ?>">Головна</a> /
            <a href="<?php echo esc_url(home_url('/blog/')); ?>">Блог</a> /
            <?php echo esc_html($article['title']); ?>
        </p>
        <h1><?php echo esc_html($article['title']); ?></h1>
    </section>

    <article class="article-content">
        <img src="<?php echo esc_url($article['image']); ?>" alt="<?php echo esc_attr($article['title']); ?>"
            class="article-cover-image">
        <p class="article-description"><?php echo esc_html($article['description']); ?></p>

        <?php
        // Виводимо вміст статті відповідно до її структури
        foreach ($article['content'] as $block):
            if ($block['type'] === 'heading'): ?>
                <h2 class="article-section-heading"><?php echo esc_html($block['text']); ?></h2>
            <?php elseif ($block['type'] === 'subheading'): ?>
                <h3 class="article-subsection-heading"><?php echo esc_html($block['text']); ?></h3>
            <?php elseif ($block['type'] === 'paragraph'): ?>
                <p><?php echo esc_html($block['text']); ?></p>
            <?php elseif ($block['type'] === 'list'): ?>
                <ul class="article-list">
                    <?php foreach ($block['items'] as $item): ?>
                        <li><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;
        endforeach;
        ?>

        <div class="back-to-blog-link">
            <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-left">
                    <path d="m15 18-6-6 6-6" />
                </svg>
                Всі статті
            </a>
        </div>
    </article>

    <?php if (!empty($related_articles)): ?>
        <section class="read-also-section">
            <h2 class="read-also-title">Прочитайте також</h2>
            <div class="read-also-slider-wrapper">
                <button class="slider-arrow prev-arrow" aria-label="Previous related article">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-left">
                        <path d="m15 18-6-6 6-6" />
                    </svg>
                </button>
                <div class="read-also-grid">
                    <?php foreach ($related_articles as $slug => $related_post_data): ?>
                        <div class="blog-card">
                            <img src="<?php echo esc_url($related_post_data['image']); ?>"
                                alt="<?php echo esc_attr($related_post_data['title']); ?>" class="blog-card-image">
                            <div class="blog-card-content">
                                <p class="blog-card-date"><?php echo esc_html($related_post_data['date']); ?></p>
                                <h3 class="blog-card-title"><?php echo esc_html($related_post_data['title']); ?></h3>
                                <p class="blog-card-description"><?php echo esc_html($related_post_data['description']); ?></p>
                                <a href="<?php echo esc_url(home_url('/single.php?slug=' . $slug)); ?>"
                                    class="blog-card-button">ЧИТАТИ ДАЛІ</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="slider-arrow next-arrow" aria-label="Next related article">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-right">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); // Включає footer.php вашої теми ?>