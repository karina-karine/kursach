<?php
/**
 * Template Name: Blog Template
 * Description: A custom page template for displaying blog posts with pagination and an order form.
 *
 * @package YourThemeName
 */

get_header();
require_once get_template_directory() . '/article-data.php'; // Include the centralized article data

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
        'question' => 'Lorem ipsum dolor sit amet consectetur?',
        'answer' => 'Lorem ipsum dolor sit amet consectetur. Faucibus duis praesent at facilisis condimentum leo. Nibh eu amet scelerisque odio lacus semper. Diam mattis vitae nullam semper parturient. Consectetur ut imperdiet mattis pellentesque placerat turpis quis cras libero. Metus rutrum quam habitant id. Aliquam libero vel ornare posuere at lorem sed varius nibh. Lorem semper lectus tincidunt in proin nisl in. Est facilisis tortor semper ornare sit consequat diam eget pretium. Sed augue egestas sed non. Risus netus ullamcorper amet tempor elit. In aliquet arcu egestas lacus lacus eu cras aliquet. Ultrices iaculis eu eget nunc lobortis. Quam ante enim elit nunc quam id felis nisl. Ultrices ut auctor tellus eu.',
    ],
    [
        'question' => 'Lorem ipsum dolor sit amet consectetur?',
        'answer' => 'Lorem ipsum dolor sit amet consectetur. Faucibus duis praesent at facilisis condimentum leo. Nibh eu amet scelerisque odio lacus semper. Diam mattis vitae nullam semper parturient. Consectetur ut imperdiet mattis pellentesque placerat turpis quis cras libero. Metus rutrum quam habitant id. Aliquam libero vel ornare posuere at lorem sed varius nibh. Lorem semper lectus tincidunt in proin nisl in. Est facilisis tortor semper ornare sit consequat diam eget pretium. Sed augue egestas sed non. Risus netus ullamcorper amet tempor elit. In aliquet arcu egestas lacus lacus eu cras aliquet. Ultrices iaculis eu eget nunc lobortis. Quam ante enim elit nunc quam id felis nisl. Ultrices ut auctor tellus eu.',
    ],
    [
        'question' => 'Lorem ipsum dolor sit amet consectetur?',
        'answer' => 'Lorem ipsum dolor sit amet consectetur. Faucibus duis praesent at facilisis condimentum leo. Nibh eu amet scelerisque odio lacus semper. Diam mattis vitae nullam semper parturient. Consectetur ut imperdiet mattis pellentesque placerat turpis quis cras libero. Metus rutrum quam habitant id. Aliquam libero vel ornare posuere at lorem sed varius nibh. Lorem semper lectus tincidunt in proin nisl in. Est facilisis tortor semper ornare sit consequat diam eget pretium. Sed augue egestas sed non. Risus netus ullamcorper amet tempor elit. In aliquet arcu egestas lacus lacus eu cras aliquet. Ultrices iaculis eu eget nunc lobortis. Quam ante enim elit nunc quam id felis nisl. Ultrices ut auctor tellus eu.',
    ],
    [
        'question' => 'Lorem ipsum dolor sit amet consectetur?',
        'answer' => 'Lorem ipsum dolor sit amet consectetur. Faucibus duis praesent at facilisis condimentum leo. Nibh eu amet scelerisque odio lacus semper. Diam mattis vitae nullam semper parturient. Consectetur ut imperdiet mattis pellentesque placerat turpis quis cras libero. Metus rutrum quam habitant id. Aliquam libero vel ornare posuere at lorem sed varius nibh. Lorem semper lectus tincidunt in proin nisl in. Est facilisis tortor semper ornare sit consequat diam eget pretium. Sed augue egestas sed non. Risus netus ullamcorper amet tempor elit. In aliquet arcu egestas lacus lacus eu cras aliquet. Ultrices iaculis eu eget nunc lobortis. Quam ante enim elit nunc quam id felis nisl. Ultrices ut auctor tellus eu.',
    ],
    [
        'question' => 'Lorem ipsum dolor sit amet consectetur?',
        'answer' => 'Lorem ipsum dolor sit amet consectetur. Faucibus duis praesent at facilisis condimentum leo. Nibh eu amet scelerisque odio lacus semper. Diam mattis vitae nullam semper parturient. Consectetur ut imperdiet mattis pellentesque placerat turpis quis cras libero. Metus rutrum quam habitant id. Aliquam libero vel ornare posuere at lorem sed varius nibh. Lorem semper lectus tincidunt in proin nisl in. Est facilisis tortor semper ornare sit consequat diam eget pretium. Sed augue egestas sed non. Risus netus ullamcorper amet tempor elit. In aliquet arcu egestas lacus lacus eu cras aliquet. Ultrices iaculis eu eget nunc lobortis. Quam ante enim elit nunc quam id felis nisl. Ultrices ut auctor tellus eu.',
    ],
];
?>
<main class="container">
    <section class="page-header">
        <p class="breadcrumb">Головна / Блог</p>
        <h1>Блог</h1>
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
            $article_link = esc_url(home_url('/single.php?slug=' . $current_slug));
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

</main>
<?php get_footer(); ?>