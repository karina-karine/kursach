<?php
/*Template Name: Contacts Page*/
get_header();
?>
<main class="main-content">
    <section class="contacts-hero-section">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a>
                / <span>Контакти</span>
            </div>
            <h1 class="section-title">Зв'яжіться з нами для замовлення студентських робіт</h1>
            <p class="page-description">
                Маєте питання щодо написання курсової, дипломної, магістерської роботи чи реферату? Потрібна
                консультація або хочете обговорити деталі замовлення? Зв'яжіться з нами зручним для вас способом! Наша
                команда готова надати професійну допомогу та відповісти на всі ваші запитання.
            </p>
        </div>
        <div class="contacts-content-wrapper">
            <div class="contacts-background-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/contacts.svg"
                    alt="Зв'яжіться з Kursach.net.ua: людина пише в блокноті, символізуючи комунікацію та замовлення робіт"
                    class="background-img" loading="eager">
            </div>
            <div class="container contacts-cards-container">
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="25" fill="#4A90E2" />
                            <path
                                d="M22 18C22 16.9 22.9 16 24 16H36C37.1 16 38 16.9 38 18V42C38 43.1 37.1 44 36 44H24C22.9 44 22 43.1 22 42V18Z"
                                stroke="white" stroke-width="2" fill="none" />
                            <rect x="25" y="20" width="10" height="16" rx="1" stroke="white" stroke-width="1.5"
                                fill="none" />
                            <circle cx="30" cy="40" r="1.5" fill="white" />
                        </svg>
                    </div>
                    <div class="contact-card-content">
                        <h2 class="contact-card-title">Телефони для зв'язку</h2>
                        <p class="contact-card-text">Наші менеджери готові відповісти на ваші дзвінки:</p>
                        <p class="contact-card-text">(063) 267 73 71</p>
                        <p class="contact-card-text">(095) 438 73 68</p>
                        <p class="contact-card-text">Працюємо: ПН-НД з 10:00 до 22:00</p>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="25" fill="#4A90E2" />
                            <path d="M20 25L30 35L40 25" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M20 25H40V35H20V25Z" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="contact-card-content">
                        <h2 class="contact-card-title">Електронна пошта</h2>
                        <p class="contact-card-text">Надсилайте ваші запитання та деталі замовлень на нашу пошту:</p>
                        <p class="contact-card-text"><a
                                href="mailto:kursach.net.ua@gmail.com">kursach.net.ua@gmail.com</a></p>
                        <p class="contact-card-text">Ми відповідаємо протягом 24 годин.</p>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="25" fill="#4A90E2" />
                            <path d="M20 30C20 25 25 20 30 20C35 20 40 25 40 30C40 35 35 40 30 40C25 40 20 35 20 30Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M25 30L35 30" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M30 25L30 35" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="contact-card-content">
                        <h2 class="contact-card-title">Соціальні мережі та месенджери</h2>
                        <p class="contact-card-text">Слідкуйте за новинами та зв'язуйтесь з нами у зручних месенджерах:
                        </p>
                        <div class="footer-social">
                            <a href="https://t.me/Kursach_manager" target="_blank" aria-label="Telegram Kursach.net.ua"
                                class="footer-social-link telegram">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/tg_icon.svg"
                                    alt="Іконка Telegram">
                            </a>
                            <a href="https://www.instagram.com/kursach.net.ua/" target="_blank"
                                aria-label="Instagram Kursach.net.ua" class="footer-social-link instagram">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/instagram_icon.svg"
                                    alt="Іконка Instagram">
                            </a>
                            <a href="https://www.tiktok.com/@kursach.net_ua?_t=ZM-8vDjQ0YuFlv&_r=1" target="_blank"
                                aria-label="TikTok Kursach.net.ua" class="footer-social-link tiktok">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/tiktok_icon.svg"
                                    alt="Іконка TikTok">
                            </a>
                        </div>
                        <p class="contact-card-text">Ми завжди на зв'язку!</p>
                    </div>
                </div>
            </div>
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