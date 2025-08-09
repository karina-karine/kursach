<?php
/**
 * Template Name: Blog Template
 * Description: A custom page template for displaying blog posts with pagination and an order form.
 *
 * @package YourThemeName
 */
get_header();
require_once get_template_directory() . '/article-data.php'; // Include the centralized article data

$all_articles_data = get_articles_data(); // Отримуємо всі статті
// Convert associative array to indexed array for pagination
// This is crucial because array_slice works with numeric indices.
$all_articles_values = array_values($all_articles_data);

$posts_per_page = 6;
$current_page = get_query_var('paged') ? get_query_var('paged') : 1;
$total_posts = count($all_articles_values); // Use the count of the centralized data
$total_pages = ceil($total_posts / $posts_per_page);
$offset = ($current_page - 1) * $posts_per_page;
$paged_posts_values = array_slice($all_articles_values, $offset, $posts_per_page);

$faq_items = [
    [
        'question' => 'Чи можу я замовляти роботу частинами?',
        'answer' => 'Так, ви можете замовити роботу поетапно. Наприклад, спочатку план, потім теоретичну частину, а згодом повний текст. Оплата також може здійснюватися частинами, залежно від обраного пакету.',
    ],
    [
        'question' => 'Як перевіряється унікальність роботи?',
        'answer' => 'Унікальність перевіряється за допомогою професійних сервісів перевірки на плагіат (Unicheck, StrikePlagiarism, PlagScan). Ви отримуєте звіт з результатами перевірки разом з роботою.',
    ],
    [
        'question' => 'Чи вносяться безкоштовні правки?',
        'answer' => 'Так, ми надаємо безкоштовні правки протягом гарантійного терміну, якщо вони відповідають початковим вимогам замовлення. Усі умови описані у розділі "Гарантії".',
    ],
    [
        'question' => 'Чи надаєте ви знижки?',
        'answer' => 'Так, ми пропонуємо систему знижок для постійних клієнтів, а також акційні пропозиції. Крім того, є реферальна програма, що дозволяє отримати бонуси за рекомендації друзям.',
    ],
    [
        'question' => 'Які гарантії ви надаєте?',
        'answer' => 'Ми гарантуємо виконання роботи у зазначені терміни, відповідність вимогам замовлення, дотримання рівня унікальності та безкоштовні правки протягом гарантійного періоду.',
    ],
    [
        'question' => 'Чи можу я бути впевненим у конфіденційності?',
        'answer' => 'Абсолютно! Ми гарантуємо повну конфіденційність – ваші дані не передаються третім особам, а готові роботи залишаються лише у вас.',
    ],
    [
        'question' => 'Чи можна замовити термінове виконання роботи?',
        'answer' => 'Так, є можливість термінового виконання. У цьому випадку термін та вартість узгоджуються індивідуально.',
    ],
];
?>
<main class="container">
    <section class="page-header">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a> <!-- In WordPress, use <?php echo home_url(); ?> -->
                / <span>Блог</span>
            </div>
            <h1 class="section-title">Блог</h1>
        </div>

    </section>
    <section class="blog-posts-grid"> <?php
    if (!empty($paged_posts_values)) {
        foreach ($paged_posts_values as $post_data) {
            // Find the slug for the current post_data by searching in $all_articles_data
            // This is necessary because $paged_posts_values is an indexed array, not associative by slug.
            $current_slug = array_search($post_data, $all_articles_data);
            if ($current_slug === false) {
                $current_slug = ''; // Fallback
            }
            // Оновлене посилання на single-article-page.php
            $article_link = esc_url(home_url('/single-article/?slug=' . $current_slug));
            ?>
                <div class="blog-card">
                    <img src=" <?php echo esc_url($post_data['image']); ?>" alt="
                    <?php echo esc_attr($post_data['title']); ?>" class="blog-card-image">
                    <div class="blog-card-content">
                        <p class="blog-card-date"><?php echo esc_html($post_data['date']); ?></p>
                        <h3 class="blog-card-title"><?php echo esc_html($post_data['title']); ?></h3>
                        <p class="blog-card-description"><?php echo esc_html($post_data['description']); ?></p>
                        <a href="<?php echo $article_link; ?>" class="blog-card-button">ЧИТАТИ ДАЛІ</a>
                    </div>
                </div>
                <?php
        }
    } else {
        echo '<p class="no-posts-message">Статей не знайдено.</p>';
    }
    ?>
    </section>
    <nav class="pagination" aria-label="Pagination"> <?php
    $pagination_args = array(
        'base' => add_query_arg('paged', '%#%'),
        'format' => '',
        'total' => $total_pages,
        'current' => $current_page,
        'show_all' => false,
        'end_size' => 1,
        'mid_size' => 2,
        'prev_next' => true,
        'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>',
        'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>',
        'type' => 'array',
        'add_args' => false,
        'add_fragment' => '',
    );
    $paginate_links = paginate_links($pagination_args);
    if ($paginate_links) {
        // Use home_url() for previous/next links to ensure they point to the blog page
        // Assuming this template is assigned to a page, get its permalink
        $blog_page_id = get_option('page_for_posts'); // If set as posts page
        if (!$blog_page_id && is_page_template('blog-template.php')) {
            $blog_page_id = get_the_ID(); // If it's just a page using this template
        }
        $base_url_for_pagination = $blog_page_id ? get_permalink($blog_page_id) : home_url('/blog/'); // Fallback to /blog/
    
        echo '<a href="' . esc_url(add_query_arg('paged', max(1, $current_page - 1), $base_url_for_pagination)) . '" class="pagination-arrow ' . ($current_page === 1 ? 'disabled' : '') . '" aria-label="Previous page" ' . ($current_page === 1 ? 'aria-disabled="true"' : '') . '>';
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>';
        echo '</a>';
        echo '<div class="pagination-numbers">';
        foreach ($paginate_links as $link) {
            // Пропускаємо порожні елементи, трикрапки та елементи без контенту
            if (
                empty($link) ||
                strpos($link, '&hellip;') !== false ||
                strpos($link, '...') !== false ||
                trim(strip_tags($link)) === ''
            ) {
                continue;
            }
            // Замінюємо класи без зміни структури
            $link = str_replace('page-numbers', 'pagination-button', $link);
            $link = str_replace('current', 'active', $link);
            echo $link;
        }
        echo '</div>';
        echo '<a href="' . esc_url(add_query_arg('paged', min($total_pages, $current_page + 1), $base_url_for_pagination)) . '" class="pagination-arrow ' . ($current_page === $total_pages ? 'disabled' : '') . '" aria-label="Next page" ' . ($current_page === $total_pages ? 'aria-disabled="true"' : '') . '>';
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>';
        echo '</a>';
    }
    ?>
    </nav>
    <section class="faq-section">
        <h2 class="faq-title">Ваші питання - наші відповіді</h2>
        <div class="faq-accordion">
            <?php foreach ($faq_items as $index => $item): ?>
                <div class="faq-item">
                    <button class="faq-trigger" aria-expanded="false" aria-controls="faq-content-
                                <?php echo $index + 1; ?>">
                        <?php echo esc_html($item['question']); ?>
                        <span class="faq-icon">+</span>
                    </button>
                    <div id="faq-content-<?php echo $index + 1; ?>" class="faq-content" role="region"
                        aria-labelledby="faq-trigger-<?php echo $index + 1; ?>">
                        <p>
                            <?php echo esc_html($item['answer']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- Order Form Section -->
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
                        <!-- Використовуємо get_template_directory_uri() для коректного шляху в WordPress -->
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/book.svg"
                            alt="Ілюстрація книг та олівця">
                    </div>
                </div>
                <div class="order-form-container">
                    <!-- Змінюємо action форми на шлях до нашого PHP-скрипта -->
                    <!-- Важливо: action буде оброблятися JavaScript через fetch, тому можна залишити порожнім або вказати # -->
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
                                <input type="text" class="form-input" placeholder="@Нік телеграму" name="study_program">
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
                                <label for="uniqueness">Унікальність роботи</label>
                                <input type="range" id="uniqueness" min="60" max="100" value="80" class="slider"
                                    name="uniqueness">
                                <div class="slider-value">80%</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-textarea" placeholder="Опис сторінок: 21" rows="3"
                                name="work_description"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="file-upload">
                                <input type="file" id="fileUpload" class="file-input" name="uploaded_files[]" multiple>
                                <label for="fileUpload" class="file-label">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10 5v10M5 10h10" stroke="currentColor" stroke-width="2" />
                                    </svg>
                                    Додати файли
                                </label>
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