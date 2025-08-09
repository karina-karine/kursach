<?php // components/order-modal.php - Модальне вікно форми замовлення для WordPress ?>
<div id="orderFormModal" class="modal-overlay" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="modal-content">
        <button class="modal-close-btn" aria-label="Закрити форму замовлення">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-x">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
        <div class="order-form-container">
            <form class="form" id="modalOrderForm" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" class="form-input" placeholder="Ім'я" name="user_name" required
                            autocomplete="name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" placeholder="E-mail" name="user_email" required
                            autocomplete="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="tel" class="form-input" placeholder="Номер телефону" name="user_phone" required
                            autocomplete="tel">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" placeholder="@Нік телеграму" name="telegram_nick"
                            autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-select" id="type-work-modal" name="work_type" required aria-label="Тип роботи">
                        <option value="">Тип роботи</option>
                        <option value="coursework">Курсова робота</option>
                        <option value="diploma">Дипломна робота</option>
                        <option value="master">Магістерська робота</option>
                        <option value="other">Інше</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" class="form-input" placeholder="Тема роботи" name="work_topic"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-input" placeholder="Дата виконання" name="due_date" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="uniqueness-slider">
                        <div class="label-and-value">
                            <label for="uniquenessModal">Унікальність роботи</label>
                            <div class="slider-value">80%</div>
                        </div>
                        <input type="range" id="uniquenessModal" min="60" max="100" value="80" class="slider"
                            name="uniqueness">
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-textarea" placeholder="Опис сторінок: 21" rows="3"
                        name="work_description"></textarea>
                </div>
                <div class="form-group">
                    <div class="file-upload">
                        <input type="file" id="fileUploadModal" class="file-input" name="uploaded_files[]" multiple>
                        <label for="fileUploadModal" class="file-label">
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
                <div id="modal-form-message" style="margin-top: 15px; text-align: center; font-weight: bold;">
                </div>
            </form>
        </div>
    </div>
</div>