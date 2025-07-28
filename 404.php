<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package YourTheme
 */

get_header(); ?>

<style>
    .error-404-page {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
        padding: var(--space-2xl) var(--space-md);
    }

    .error-404-container {
        max-width: 600px;
        text-align: center;
        background: var(--white);
        padding: var(--space-3xl) var(--space-xl);
        border-radius: var(--radius-card);
        box-shadow: var(--shadow-lg);
    }

    .error-404-number {
        font-size: clamp(4rem, 8vw, 8rem);
        font-weight: var(--font-weight-extrabold);
        color: var(--primary-color);
        line-height: var(--line-height-tight);
        margin-bottom: var(--space-md);
        font-family: var(--font-family-heading);
    }

    .error-404-title {
        font-size: var(--font-size-2xl);
        font-weight: var(--font-weight-bold);
        color: var(--gray-800);
        margin-bottom: var(--space-md);
        font-family: var(--font-family-heading);
    }

    .error-404-description {
        font-size: var(--font-size-lg);
        color: var(--gray-600);
        line-height: var(--line-height-relaxed);
        margin-bottom: var(--space-xl);
    }

    .error-404-actions {
        display: flex;
        flex-direction: column;
        gap: var(--space-md);
        align-items: center;
    }

    .error-404-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: var(--space-md) var(--space-xl);
        background: var(--primary-color);
        color: var(--white);
        text-decoration: none;
        border-radius: var(--radius-button);
        font-weight: var(--font-weight-semibold);
        font-size: var(--font-size-base);
        transition: var(--transition-normal);
        box-shadow: var(--shadow-md);
        min-width: 200px;
    }

    .error-404-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: var(--white);
    }

    .error-404-btn.secondary {
        background: var(--white);
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .error-404-btn.secondary:hover {
        background: var(--primary-color);
        color: var(--white);
    }

    .error-404-search {
        width: 100%;
        max-width: 400px;
        margin-top: var(--space-lg);
    }

    .error-404-search input {
        width: 100%;
        padding: var(--space-md);
        border: 2px solid var(--gray-200);
        border-radius: var(--radius-form-input);
        font-size: var(--font-size-base);
        font-family: var(--font-family-primary);
    }

    .error-404-search input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: var(--shadow-focus-ring);
    }

    .error-404-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto var(--space-lg);
        background: var(--gray-100);
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--gray-400);
    }

    @media (max-width: 768px) {
        .error-404-container {
            padding: var(--space-xl) var(--space-lg);
            margin: var(--space-md);
        }

        .error-404-actions {
            flex-direction: column;
        }
    }
</style>

<main class="error-404-page">
    <div class="error-404-container">
        <div class="error-404-icon">
            🔍
        </div>

        <div class="error-404-number">404</div>

        <h1 class="error-404-title">Сторінку не знайдено</h1>

        <p class="error-404-description">
            Вибачте, але сторінка, яку ви шукаете, не існує або була переміщена.
            Можливо, ви перейшли за застарілим посиланням або неправильно ввели адресу.
        </p>

        <div class="error-404-actions">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="error-404-btn">
                🏠 На головну
            </a>

            <a href="javascript:history.back()" class="error-404-btn secondary">
                ← Повернутися назад
            </a>
        </div>


    </div>
</main>

<script>
    // Додаткова функціональність для кращого UX
    document.addEventListener('DOMContentLoaded', function () {
        // Автофокус на пошуковому полі
        const searchInput = document.querySelector('.error-404-search input[type="search"]');
        if (searchInput) {
            setTimeout(() => searchInput.focus(), 500);
        }

        // Анімація появи
        const container = document.querySelector('.error-404-container');
        if (container) {
            container.style.opacity = '0';
            container.style.transform = 'translateY(20px)';

            setTimeout(() => {
                container.style.transition = 'all 0.6s ease-out';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 100);
        }
    });
</script>

<?php get_footer(); ?>