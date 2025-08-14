<?php
/*Template Name: Single Article Page*/
get_header();
require_once get_template_directory() . '/article-data.php';

$all_articles_data = get_articles_data();
$current_article_slug = isset($_GET['slug']) ? sanitize_text_field($_GET['slug']) : null;
$current_article = null;

if ($current_article_slug && isset($all_articles_data[$current_article_slug])) {
    $current_article = $all_articles_data[$current_article_slug];
}

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
    return;
}

$related_articles = [];
$current_article_index = array_search($current_article_slug, array_keys($all_articles_data));
if ($current_article_index !== false) {
    $article_keys = array_keys($all_articles_data);
    $count = 0;
    $i = 1;
    while ($count < 2 && $i < count($article_keys)) {
        $next_index = ($current_article_index + $i) % count($article_keys);
        $related_slug = $article_keys[$next_index];
        if ($related_slug !== $current_article_slug) {
            $related_articles[$related_slug] = $all_articles_data[$related_slug];
            $count++;
        }
        $i++;
    }
}
?>
<main class="main-content">
    <section class="single-article-section" itemscope itemtype="https://schema.org/BlogPosting">
        <meta itemprop="mainEntityOfPage" content="<?php echo esc_url(get_canonical_url()); ?>">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a> /
                <a href="<?php echo home_url('/blog/'); ?>">Блог</a> /
                <span><?php echo esc_html($current_article['title']); ?></span>
            </div>
            <h1 class="article-title" itemprop="headline"><?php echo esc_html($current_article['title']); ?></h1>
            <div class="article-meta">
                <span class="article-date" itemprop="datePublished"
                    content="<?php echo date('Y-m-d', strtotime(str_replace('.', '-', $current_article['date']))); ?>"><?php echo esc_html($current_article['date']); ?></span>
                <span class="article-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <span itemprop="name"><?php echo esc_html($current_article['author']); ?></span>
                </span>
                <meta itemprop="dateModified"
                    content="<?php echo date('Y-m-d', strtotime(str_replace('.', '-', $current_article['date_modified']))); ?>">
            </div>
            <div class="article-hero-image">
                <img src="<?php echo esc_url($current_article['image']); ?>"
                    alt="<?php echo esc_attr($current_article['title']); ?>" itemprop="image">
            </div>
            <div class="article-content" itemprop="articleBody">
                <?php echo $current_article['full_content']; ?>
            </div>
            <div class="back-to-blog">
                <a href="<?php echo home_url('/blog/'); ?>" class="btn btn-primary">Всі статті</a>
            </div>
        </div>
        <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
            <meta itemprop="name" content="Kursach.net.ua">
            <meta itemprop="url" content="<?php echo home_url(); ?>">
            <link itemprop="logo" href="<?php echo get_template_directory_uri(); ?>/assets/logo.png">
        </div>
    </section>
    <?php if (!empty($related_articles)): ?>
        <section class="related-articles-section">
            <div class="container">
                <h2 class="section-title">Прочитайте також</h2>
                <div class="related-articles-grid">
                    <?php foreach ($related_articles as $slug => $article): ?>
                        <div class="blog-card" itemscope itemtype="https://schema.org/BlogPosting">
                            <meta itemprop="mainEntityOfPage"
                                content="<?php echo esc_url(home_url('/single-article/?slug=' . $slug)); ?>">
                            <img src="<?php echo esc_url($article['image']); ?>"
                                alt="<?php echo esc_attr($article['title']); ?>" class="blog-card-image" itemprop="image">
                            <div class="blog-card-content">
                                <p class="blog-card-date" itemprop="datePublished"
                                    content="<?php echo date('Y-m-d', strtotime(str_replace('.', '-', $article['date']))); ?>">
                                    <?php echo esc_html($article['date']); ?></p>
                                <h3 class="blog-card-title" itemprop="headline"><?php echo esc_html($article['title']); ?></h3>
                                <p class="blog-card-description" itemprop="description">
                                    <?php echo esc_html($article['description']); ?></p>
                                <a href="<?php echo esc_url(home_url('/single-article/?slug=' . $slug)); ?>"
                                    class="blog-card-button" itemprop="url">ЧИТАТИ ДАЛІ</a>
                            </div>
                            <div itemprop="author" itemscope itemtype="https://schema.org/Person">
                                <meta itemprop="name" content="<?php echo esc_attr($article['author']); ?>">
                            </div>
                            <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                                <meta itemprop="name" content="Kursach.net.ua">
                                <meta itemprop="url" content="<?php echo home_url(); ?>">
                                <link itemprop="logo" href="<?php echo get_template_directory_uri(); ?>/assets/logo.png">
                            </div>
                            <meta itemprop="dateModified"
                                content="<?php echo date('Y-m-d', strtotime(str_replace('.', '-', $article['date_modified']))); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="order-form">
        <div class="container">
            <div class="order-content">
                <div class="order-text">
                    <h2 class="order-title">Зробіть замовлення прямо зараз</h2>
                    <p class="order-description">
                        Ви отримаєте якісну та унікальну роботу, яка відповідатиме всім методичним
                        рекомендаціям та побажанням викладача. Нашу роботу ви без проблем здасте
                        та захистите на високу оцінку.
                    </p>
                    <div class="order-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/book.svg"
                            alt="Ілюстрація книг та олівця, що символізує навчання та написання робіт">
                    </div>
                </div>
                <div class="order-form-container">
                    <form class="form" id="orderForm" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="Ім'я" name="user_name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-input" placeholder="E-mail" name="user_email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="tel" class="form-input" placeholder="Номер телефону" name="user_phone"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="@Нік телеграму" name="telegram_nick">
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-select" id="type-work" name="work_type" required>
                                <option value="">Тип роботи</option>
                                <option value="coursework">Курсова робота</option>
                                <option value="diploma">Дипломна робота</option>
                                <option value="master">Магістерська робота</option>
                                <option value="other">Інше</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="form-input" placeholder="Тема роботи" name="work_topic">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-input" placeholder="Дата виконання" name="due_date"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="uniqueness-slider">
                                <label for="uniqueness">Бажана унікальність роботи: <span
                                        class="slider-value">80%</span></label>
                                <input type="range" id="uniqueness" min="60" max="100" value="80" class="slider"
                                    name="uniqueness" aria-valuemin="60" aria-valuemax="100" aria-valuenow="80"
                                    aria-valuetext="80 відсотків">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-textarea"
                                placeholder="Опис роботи: наприклад, кількість сторінок, особливі вимоги" rows="3"
                                name="work_description"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="file-upload">
                                <input type="file" id="fileUpload" class="file-input" name="uploaded_files[]" multiple
                                    aria-describedby="file-upload-instructions">
                                <label for="fileUpload" class="file-label">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10 5v10M5 10h10" stroke="currentColor" stroke-width="2" />
                                    </svg>
                                    Додати файли
                                </label>
                                <p id="file-upload-instructions" class="sr-only">Ви можете завантажити кілька файлів,
                                    таких як методичні рекомендації або приклади.</p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-large form-submit">
                            ЗАМОВИТИ РОБОТУ
                        </button>
                        <div id="form-message" style="margin-top: 15px; text-align: center; font-weight: bold;"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>