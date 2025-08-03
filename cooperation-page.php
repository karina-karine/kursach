<?php
/*
Template Name: Cooperation Page
*/
get_header();
?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="collaboration-hero">
        <div class="container coop">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a> <!-- In WordPress, use <?php echo home_url(); ?> -->
                / <span>Співпраця</span>
            </div>
            <h1 class="section-title">Запрошуємо вас до співпраці з нами</h1>
            <div class="collaboration-images">
                <div class="collab-image-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/coop1.svg" alt="Дівчина з ноутбуком"
                        class="collab-img">
                </div>
                <div class="collab-image-item center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/coop2.svg" alt="Дівчина працює"
                        class="collab-img">
                    <div class="collab-clock">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/black-circle.svg">
                    </div>

                </div>
                <div class="collab-image-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/coop3.svg" alt="Дівчина з навушниками"
                        class="collab-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Collaboration Options -->
    <section class="collaboration-options">
        <div class="container">
            <div class="collab-options-content">
                <div class="guarantees-image">
                    <div class="guarantees-image-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/coop-student.svg"
                            alt="Жінка працює за ноутбуком" class="guarantees-img">
                        <div class="book-icon">
                            <img class="coop-book"
                                src="<?php echo get_template_directory_uri(); ?>/assets/coop-book.svg">
                        </div>
                    </div>
                </div>
                <div class="collab-options-list">
                    <div class="collab-option-item">
                        <div class="collab-option-icon">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                                <circle cx="30" cy="30" r="25" fill="#4A90E2" />
                                <path d="M20 30h20M30 20v20" stroke="white" stroke-width="3" />
                            </svg>
                        </div>
                        <div class="collab-option-content">
                            <h3 class="collab-option-title">Авторам</h3>
                            <p class="collab-option-text">
                                Якщо ви автор з написання студентських робіт, вам буде вигідно працювати з нами. Ми
                                надаємо великий спектр замовлень, і гарному спеціалісту виплати!
                            </p>
                            <p class="collab-option-contact">
                                Надсилайте своє резюме нам на <a href="kursach.net.ua@gmail.com"
                                    class="contact-link">пошту</a>,
                                і ми його розглянемо і зв'яжемось з вами!
                            </p>
                        </div>
                    </div>
                    <div class="collab-option-item">
                        <div class="collab-option-icon">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                                <circle cx="30" cy="30" r="25" fill="#4A90E2" />
                                <path d="M20 25h20v15H20z" stroke="white" stroke-width="2" fill="none" />
                                <path d="M25 20v5M35 20v5" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="collab-option-content">
                            <h3 class="collab-option-title">Студентам</h3>
                            <p class="collab-option-text">
                                Ти студент і шукаєш додатковий заробіток? Пропонуйте наші послуги в вашому вузі
                                знайомим і отримуйте відсоток від наведених клієнтів. Це дуже легко і дуже прибутково!
                            </p>
                            <p class="collab-option-contact">
                                Пиши нам на <a href="kursach.net.ua@gmail.com" class="contact-link">пошту</a> або на
                                <a href="https://viber.com" class="contact-link">Viber</a>, і ми обговоримо деталі!
                            </p>
                        </div>
                    </div>
                    <div class="collab-option-item">
                        <div class="collab-option-icon">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                                <circle cx="30" cy="30" r="25" fill="#4A90E2" />
                                <rect x="20" y="22" width="20" height="16" rx="2" stroke="white" stroke-width="2"
                                    fill="none" />
                                <path d="M25 30h10M25 34h8" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="collab-option-content">
                            <h3 class="collab-option-title">Агентствам з написання</h3>
                            <p class="collab-option-text">
                                У вас багато замовлень, але не вистачає авторів, і доводиться відмовляти клієнтам?
                                У нас є штат авторів які зможуть взяти виконання на себе.
                            </p>
                            <p class="collab-option-contact">
                                Пиши нам на <a href="kursach.net.ua@gmail.com" class="contact-link">пошту</a> або на
                                <a href="https://viber.com" class="contact-link">Viber</a>, і ми обговоримо деталі!
                            </p>
                        </div>
                    </div>
                    <div class="collab-option-item">
                        <div class="collab-option-icon">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
                                <circle cx="30" cy="30" r="25" fill="#4A90E2" />
                                <circle cx="30" cy="25" r="8" stroke="white" stroke-width="2" fill="none" />
                                <path d="M18 45c0-8 5.5-12 12-12s12 4 12 12" stroke="white" stroke-width="2"
                                    fill="none" />
                            </svg>
                        </div>
                        <div class="collab-option-content">
                            <h3 class="collab-option-title">Блогер</h3>
                            <p class="collab-option-text">
                                У вас є велика аудиторія віком від 17 до 23 років? Рекламуйте наші послуги, і
                                отримуйте прибуток за наведених клієнтів за вашим промокодом!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="contact-form-content">
                <div class="contact-form-info">
                    <div class="contact-question-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/question.svg" alt="Іконка питання">
                    </div>
                    <h2 class="contact-form-title">Залишились питання?</h2>
                    <p class="contact-form-description">
                        Якщо у вас залишилися якісь питання, заповніть форму, або пишіть нам на
                        <a href="mailto:kursach.net.ua@gmail.com" class="contact-link">пошту</a> чи
                        <a href="https://viber.com" class="contact-link">Viber</a>!
                    </p>
                </div>
                <div class="contact-form-container">
                    <form class="contact-form" id="contactForm" method="post">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="user_name" placeholder="Ім'я*" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="user_email" placeholder="E-mail*" class="form-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="user_message" placeholder="Напишіть Ваше питання" class="form-textarea"
                                rows="4"></textarea>
                        </div>
                        <button type="submit" class="form-submit-btn">ПОСТАВИТИ ПИТАННЯ</button>
                        <div id="contact-form-message" style="margin-top: 15px; text-align: center; font-weight: bold;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>