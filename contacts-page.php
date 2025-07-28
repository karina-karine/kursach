<?php
/*
Template Name: Contacts Page
*/
get_header();
?>

<main class="main-content">
    <section class="contacts-hero-section">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo home_url(); ?>">Головна</a> <!-- In WordPress, use <?php echo home_url(); ?> -->
                / <span>Контакти</span>
            </div>
            <h1 class="section-title">Контакти</h1>
        </div>
        <div class="contacts-content-wrapper">
            <div class="contacts-background-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/contacts.svg" alt="Людина пише в блокноті"
                    class="background-img">
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
                    <h2 class="contact-card-title">Телефони</h2>
                    <p class="contact-card-text">(063) 267 73 71</p>
                    <p class="contact-card-text">(095) 438 73 68</p>
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
                    <h2 class="contact-card-title">Пошта</h2>
                    <p class="contact-card-text">kursach.net.ua@gmail.com</p>
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
                    <h2 class="contact-card-title">Соціальні мережі</h2>
                    <p class="contact-card-text">Долучайтесь до нас:</p>
                    <div class="footer-social">
                        <a href="#" class="footer-social-link telegram">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/tg_icon.svg" alt="Telegram">
                        </a>
                        <a href="#" class="footer-social-link viber">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/viber_icon.svg" alt="Viber">
                        </a>
                        <a href="#" class="footer-social-link instagram">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/instagram_icon.svg"
                                alt="Instagram">
                        </a>
                        <a href="#" class="footer-social-link tiktok">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/tiktok_icon.svg" alt="TikTok">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>