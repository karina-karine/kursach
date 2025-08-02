<?php
/*
Template Name: Single Article Page
*/
get_header();
require_once get_template_directory() . '/article-data.php'; // Підключаємо файл з даними статей
$all_articles_data = get_articles_data();

// Отримуємо slug статті з URL
$current_article_slug = isset($_GET['slug']) ? sanitize_text_field($_GET['slug']) : null;

$current_article = null;
if ($current_article_slug && isset($all_articles_data[$current_article_slug])) {
    $current_article = $all_articles_data[$current_article_slug];
}

// Якщо статтю не знайдено, відображаємо повідомлення та зупиняємо виконання
if (is_null($current_article)) {
    ?>
    <main class="main-content">
        <section class="single-article-section">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo home_url(); ?>">Головна</a> /
                    <a href="<?php echo home_url('/blog/'); ?>">Блог</a> /
                    <span>Статтю не знайдено</span>
                </div>
                <h1 class="article-title">Статтю не знайдено.</h1>
                <div class="article-content">
                    <p>На жаль, стаття, яку ви шукаєте, не існує або була видалена.</p>
                </div>
                <div class="back-to-blog">
                    <a href="<?php echo home_url('/blog/'); ?>" class="btn btn-primary">Повернутися до блогу</a>
                </div>
            </div>
        </section>
    </main>
    <?php
    get_footer();
    return; // Зупиняємо подальше виконання цього шаблону
}

// Якщо статтю знайдено, продовжуємо відображення її вмісту
// Для секції "Прочитайте також"
$related_articles = [];
$current_article_index = array_search($current_article_slug, array_keys($all_articles_data));

if ($current_article_index !== false) {
    $article_keys = array_keys($all_articles_data);
    $count = 0;
    $i = 1;
    while ($count < 2 && $i < count($article_keys)) { // Беремо 2 статті
        $next_index = ($current_article_index + $i) % count($article_keys);
        $related_slug = $article_keys[$next_index];
        if ($related_slug !== $current_article_slug) { // Перевіряємо, щоб не була поточна стаття
            $related_articles[$related_slug] = $all_articles_data[$related_slug];
            $count++;
        }
        $i++;
    }
}
?>

<main class="main-content">
    <section class="single-article-section">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a> /
                <a href="<?php echo home_url('/blog/'); ?>">Блог</a> /
                <span><?php echo esc_html($current_article['title']); ?></span>
            </div>
            <h1 class="article-title"><?php echo esc_html($current_article['title']); ?></h1>
            <div class="article-hero-image">
                <img src="<?php echo esc_url($current_article['image']); ?>"
                    alt="<?php echo esc_attr($current_article['title']); ?>">
            </div>
            <div class="article-content">
                <?php echo $current_article['full_content']; // Виводимо HTML-контент ?>
            </div>
            <div class="back-to-blog">
                <a href="<?php echo home_url('/blog/'); ?>" class="btn btn-primary">Всі статті</a>
            </div>
        </div>
    </section>

    <?php if (!empty($related_articles)): ?>
        <section class="related-articles-section">
            <div class="container">
                <h2 class="section-title">Прочитайте також</h2>
                <div class="related-articles-grid">
                    <?php foreach ($related_articles as $slug => $article): ?>
                        <div class="blog-card">
                            <img src="<?php echo esc_url($article['image']); ?>"
                                alt="<?php echo esc_attr($article['title']); ?>" class="blog-card-image">
                            <div class="blog-card-content">
                                <p class="blog-card-date"><?php echo esc_html($article['date']); ?></p>
                                <h3 class="blog-card-title"><?php echo esc_html($article['title']); ?></h3>
                                <p class="blog-card-description"><?php echo esc_html($article['description']); ?></p>
                                <a href="<?php echo esc_url(home_url('/single-article/?slug=' . $slug)); ?>"
                                    class="blog-card-button">ЧИТАТИ ДАЛІ</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Навігаційні стрілки, якщо буде реалізовано карусель -->
                <!-- <div class="related-articles-nav">
                    <button class="nav-arrow prev-arrow" aria-label="Previous related article">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-left">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                    </button>
                    <button class="nav-arrow next-arrow" aria-label="Next related article">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-right">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </div> -->
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>