<?php
/**
 * Template Name: Blog Template
 * Description: SEO-оптимізований шаблон блогу з пагінацією та FAQ.
 */

get_header();
require_once get_template_directory() . '/article-data.php';

$all_articles_data = get_articles_data();
$all_articles_values = array_values($all_articles_data);

$posts_per_page = 6;
$current_page = get_query_var('paged') ? get_query_var('paged') : 1;
$total_posts = count($all_articles_values);
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
<!-- SEO meta -->
<meta name="description" content="Читайте корисні статті в блозі про освіту, дослідження, наукові роботи та поради.">
<meta property="og:title" content="Блог | <?php bloginfo('name'); ?>">
<meta property="og:description" content="Корисні матеріали, поради та дослідження для студентів і викладачів.">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
<meta property="og:image" content="<?php echo esc_url(get_template_directory_uri() . '/images/og-image.jpg'); ?>">

<main class="container" itemscope itemtype="https://schema.org/Blog">
    <section class="page-header">
        <div class=" container">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a> / <span>Блог</span>
            </nav>
            <h1 class=" section-title" itemprop="headline">Блог</h1>
        </div>
    </section>

    <section class="blog-posts-grid">
        <?php if (!empty($paged_posts_values)):
            foreach ($paged_posts_values as $post_data):
                $current_slug = array_search($post_data, $all_articles_data);
                $article_link = esc_url(home_url('/single-article/?slug=' . $current_slug));
                ?>
                <article class="blog-card" itemscope itemtype="https://schema.org/BlogPosting">
                    <a href="<?php echo $article_link; ?>" itemprop="url">
                        <img src="<?php echo esc_url($post_data['image']); ?>"
                            alt="<?php echo esc_attr($post_data['title']); ?>" class="blog-card-image" itemprop="image">
                    </a>
                    <div class="blog-card-content">
                        <time class="blog-card-date" datetime="<?php echo date('Y-m-d', strtotime($post_data['date'])); ?>"
                            itemprop="datePublished">
                            <?php echo esc_html($post_data['date']); ?>
                        </time>
                        <h2 class="blog-card-title" itemprop="headline">
                            <a href="<?php echo $article_link; ?>" itemprop="url">
                                <?php echo esc_html($post_data['title']); ?>
                            </a>
                        </h2>
                        <p class="blog-card-description" itemprop="description">
                            <?php echo esc_html($post_data['description']); ?>
                        </p>
                        <a href="<?php echo $article_link; ?>" class="blog-card-button" itemprop="mainEntityOfPage">ЧИТАТИ
                            ДАЛІ</a>
                    </div>
                </article>
            <?php endforeach; else: ?>
            <p class="no-posts-message">Статей не знайдено.</p>
        <?php endif; ?>
    </section>

    <!-- Пагінація -->
    <nav class="pagination" aria-label="Pagination">
        <div class="flex items-center space-x-2">
            <?php
            $blog_page_id = get_option('page_for_posts') ?: get_the_ID();
            $base_url_for_pagination = $blog_page_id ? get_permalink($blog_page_id) : home_url('/blog/');

            // Попередня сторінка
            if ($current_page > 1) {
                echo '<a rel="prev" href="' . esc_url(add_query_arg('paged', $current_page - 1, $base_url_for_pagination)) . '" class="pagination-arrow" aria-label="Previous Page">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left h-5 w-5"><path d="m15 18-6-6 6-6"/></svg>';
                echo '</a>';
            }

            // Номери сторінок
            $pagination_args = [
                'base' => add_query_arg('paged', '%#%', $base_url_for_pagination), // Використовуйте base_url_for_pagination тут
                'format' => '',
                'total' => $total_pages,
                'current' => $current_page,
                'type' => 'array',
                'prev_next' => false, // Вимкнути автоматичні кнопки Prev/Next
            ];
            $links = paginate_links($pagination_args);

            if ($links) {
                echo '<div class="pagination-numbers">';
                foreach ($links as $link) {
                    // Замінюємо стандартні класи WordPress на наші
                    $link = str_replace('page-numbers', 'pagination-button', $link);
                    $link = str_replace('current', 'active', $link);
                    echo $link;
                }
                echo '</div>';
            }

            // Наступна сторінка
            if ($current_page < $total_pages) {
                echo '<a rel="next" href="' . esc_url(add_query_arg('paged', $current_page + 1, $base_url_for_pagination)) . '" class="pagination-arrow next-button" aria-label="Next Page">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-1 h-5 w-5"><path d="m9 18 6-6-6-6"/></svg>';
                echo '</a>';
            }
            ?>
        </div>
    </nav>
    <!-- FAQ -->
    <section class="faq-section" itemscope itemtype="https://schema.org/FAQPage">
        <h2 class="faq-title">Ваші питання - наші відповіді</h2>
        <div class="faq-accordion">
            <?php foreach ($faq_items as $index => $item): ?>
                <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button class="faq-trigger" aria-expanded="false">
                        <span itemprop="name">
                            <?php echo esc_html($item['question']); ?>
                        </span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">
                            <?php echo esc_html($item['answer']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="order-form" id="orderForm">
        <div class="container">
            <div class="order-content">
                <div class="order-text">
                    <h2 class="order-title">Зробіть замовлення прямо зараз: швидко та зручно</h2>
                    <p class="order-description">
                        Ви отримаєте якісну та унікальну роботу, яка відповідатиме всім методичним
                        рекомендаціям та побажанням викладача. Нашу роботу ви без проблем здасте
                        та захистите на високу оцінку. Заповніть форму, щоб розпочати співпрацю!
                    </p>
                    <div class="order-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/book.svg"
                            alt="Ілюстрація книг та олівця, що символізує навчання та написання робіт" loading="lazy">
                    </div>
                </div>
                <div class="order-form-container">
                    <form class="form" id="orderForm" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="user_name" class="sr-only">Ваше ім'я</label>
                                <input type="text" id="user_name" class="form-input" placeholder="Ім'я" name="user_name"
                                    required aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="user_email" class="sr-only">Ваш E-mail</label>
                                <input type="email" id="user_email" class="form-input" placeholder="E-mail"
                                    name="user_email" required aria-required="true">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="user_phone" class="sr-only">Номер телефону</label>
                                <input type="tel" id="user_phone" class="form-input" placeholder="Номер телефону"
                                    name="user_phone" required aria-required="true">
                            </div>
                            <div class="form-group">
                                <label for="telegram_nick" class="sr-only">Нік телеграму</label>
                                <input type="text" id="telegram_nick" class="form-input" placeholder="@Нік телеграму"
                                    name="telegram_nick">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type-work" class="sr-only">Тип роботи</label>
                            <select class="form-select" id="type-work" name="work_type" required aria-required="true">
                                <option value="">Тип роботи</option>
                                <option value="coursework">Курсова робота</option>
                                <option value="diploma">Дипломна робота</option>
                                <option value="master">Магістерська робота</option>
                                <option value="other">Інше</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="work_topic" class="sr-only">Тема роботи</label>
                                <input type="text" id="work_topic" class="form-input" placeholder="Тема роботи"
                                    name="work_topic">
                            </div>
                            <div class="form-group">
                                <label for="due_date" class="sr-only">Дата виконання</label>
                                <input type="date" id="due_date" class="form-input" placeholder="Дата виконання"
                                    name="due_date" required aria-required="true">
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
                            <label for="work_description" class="sr-only">Опис роботи (наприклад, кількість сторінок,
                                особливі вимоги)</label>
                            <textarea class="form-textarea" id="work_description"
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