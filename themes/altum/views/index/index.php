<?php defined('ALTUMCODE') || die() ?>

    <div class="inicio">
        <div class="text-container">
            <!-- <h1 class="text-init"><?= $this->language->inicio->init?></h1> -->
            <h1 class="text-container"><?= $this->language->inicio->title?><span class="txt-type" data-wait="3000" data-words='["Instagram", "Facebook", "Dibbble", "Youtube", "Spotify"]'></span></h1>
            <p class="subtitle-container"><?= $this->language->inicio->statshome?></p>

            <div class="btns">
                <a href="<?= url('login') ?>">
                    <button class="newstart">Começar Agora</button>
                </a>
                <h1 class="free"><?= $this->language->inicio->free?></h1> 
            </div>
        </div>

        <div class="image-container">
            <img class="abstratc" src="<?= SITE_URL . ASSETS_URL_PATH . 'images/02.png' ?>"" />
        </div>

    </div>

    <div class="infos-dashboard">
        <div class="image-container-info">
            <img class="abstratc" src="<?= SITE_URL . ASSETS_URL_PATH . 'images/10.png' ?>"" />
        </div>
        <div class="text-infos">
                <h1 class="infos"><?= $this->language->inicio->info?><span class="txt-type" data-wait="3000" data-words='["Instagram", "Facebook", "Dibble", "Youtube", "Spotify"]'></span></h1>
                <p class="infos1"><?= $this->language->inicio->info1?></p>
                <div class="btns">
                    <button class="dashboard">Dashboard</button>
                    <h1 class="acess"><?= $this->language->inicio->acess?></h1> 
                </div>
        </div>
    </div>

    <div class="infos-dashboard">
        <div class="text-infos">
                <h1 class="infos"><?= $this->language->inicio->ergn?><span class="txt-type" data-wait="3000" data-words='["Instagram", "Facebook", "Dibble", "Youtube", "Spotify"]'></span></h1>
                <p class="infos1"><?= $this->language->inicio->ergn1?></p>
                <div class="btns">
                    <button class="dashboard">Criar Link</button>
                    <h1 class="linkcre"><?= $this->language->inicio->linkcre?></h1> 
                </div>
        </div>
        <div class="image-container-info">
            <img class="abstratc" src="<?= SITE_URL . ASSETS_URL_PATH . 'images/11.png' ?>"" />
        </div>
    </div>

    <div class="cards-abstact">


        <div class="cards-abs">
            <div class="text-car">
                <p class="p1"><?= $this->language->inicio->p1?></p>
            </div>
            <div class="character">
                <div class="avatar"></div>
                <p class="names"><?= $this->language->inicio->name1?></p>
            </div>
        </div>

        <div class="cards-abs">
            <div class="text-car">
                <p class="p1"><?= $this->language->inicio->p1?></p>
            </div>
            <div class="character">
                <div class="avatar"></div>
                <p class="names"><?= $this->language->inicio->name1?></p>
            </div>
        </div>

        <div class="cards-abs">
            <div class="text-car">
                <p class="p1"><?= $this->language->inicio->p1?></p>
            </div>
            <div class="character">
                <div class="avatar"></div>
                <p class="names"><?= $this->language->inicio->name1?></p>
            </div>
        </div>

        <div class="cards-abs">
            <div class="text-car">
                <p class="p1"><?= $this->language->inicio->p1?></p>
            </div>
            <div class="character">
                <div class="avatar"></div>
                <p class="names"><?= $this->language->inicio->name1?></p>
            </div>
        </div>

        <div class="cards-abs">
            <div class="text-car">
                <p class="p1"><?= $this->language->inicio->p1?></p>
            </div>
            <div class="character">
                <div class="avatar"></div>
                <p class="names"><?= $this->language->inicio->name1?></p>
            </div>
        </div>

        <div class="cards-abs">
            <div class="text-car">
                <p class="p1"><?= $this->language->inicio->p1?></p>
            </div>
            <div class="character">
                <div class="avatar"></div>
                <p class="names"><?= $this->language->inicio->name1?></p>
            </div>
        </div>
    </div>
    
    <!-- <div class="teste"></div> -->

    <div class="container mt-10">
        <div class="planos">
            <h2><?= $this->language->index->pricing->header ?></h2>

            <p class="textos"><?= $this->language->index->pricing->subheader ?></p>
        </div>

        <?= $this->views['plans'] ?>
    </div> 

    <div class="email">
    
        <div class="image-email">
            <img class="abstratc" src="<?= SITE_URL . ASSETS_URL_PATH . 'images/06.png' ?>"" />
            <div class="text-email">
                <h1 class="msgemail"><?= $this->language->inicio->email?></h1>
                <p class="msgemail1"><?= $this->language->inicio->email1?></p>
            </div>
        </div>

        <div class="form-div">
            <button class="emailbtn">Acessar Email</button>
        </div>

    </div>

<div class="rodape">
    <h1 class="rodape-text"><?= $this->language->inicio->rodape?></h1>

            <div class="rodapenew">

                <div class="mb-2">
                    <?php foreach(require APP_PATH . 'includes/admin_socials.php' as $key => $value): ?>

                        <?php if(isset($this->settings->socials->{$key}) && !empty($this->settings->socials->{$key})): ?>
                            <span class="mr-2">
                                <a target="_blank" href="<?= sprintf($value['format'], $this->settings->socials->{$key}) ?>" title="<?= $value['name'] ?>" class="no-underline">
                                    <i class="<?= $value['icon'] ?> fa-fw fa-lg"></i>
                                </a>
                            </span>
                        <?php endif ?>

                    <?php endforeach ?>
                </div>

                <?php if(count(\Altum\Language::$languages) > 1): ?>
                    <div class="dropdown mb-2">
                        <a class="dropdown-toggle clickable" id="language_switch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-language text-muted"></i> <?= $this->language->global->language ?></a>

                        <div class="dropdown-menu" aria-labelledby="language_switch">
                            <h6 class="dropdown-header"><?= $this->language->global->choose_language ?></h6>
                            <?php foreach(\Altum\Language::$languages as $language_name): ?>
                                <a class="dropdown-item" href="<?= url((\Altum\Routing\Router::$controller_key == 'index' ? 'index' : $_GET['altum']) . '?language=' . $language_name) ?>">
                                    <?php if($language_name == \Altum\Language::$language): ?>
                                        <i class="fa fa-fw fa-sm fa-check mr-1 text-success"></i>
                                    <?php else: ?>
                                        <i class="fa fa-fw fa-sm fa-circle-notch mr-1 text-muted"></i>
                                    <?php endif ?>

                                    <?= $language_name ?>
                                </a>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <script>
                        document.querySelectorAll('[data-choose-theme-style]').forEach(theme => {

                            theme.addEventListener('click', event => {

                                let chosen_theme_style = event.currentTarget.getAttribute('data-choose-theme-style');

                                /* Set a cookie with the new theme style */
                                set_cookie('theme_style', chosen_theme_style, 30);

                                /* Change the css and button on the page */
                                let css = document.querySelector(`#css_theme_style`);

                                document.querySelector(`[data-theme-style]`).setAttribute('data-theme-style', chosen_theme_style);

                                switch(chosen_theme_style) {
                                    case 'dark':
                                        css.setAttribute('href', <?= json_encode(SITE_URL . ASSETS_URL_PATH . 'css/' . \Altum\ThemeStyle::$themes['dark']['file'] . '?v=' . PRODUCT_CODE) ?>);
                                        document.querySelector(`[data-choose-theme-style="dark"]`).classList.add('d-none');
                                        document.querySelector(`[data-choose-theme-style="light"]`).classList.remove('d-none');
                                        break;

                                    case 'light':
                                        css.setAttribute('href', <?= json_encode(SITE_URL . ASSETS_URL_PATH . 'css/' . \Altum\ThemeStyle::$themes['light']['file'] . '?v=' . PRODUCT_CODE) ?>);
                                        document.querySelector(`[data-choose-theme-style="dark"]`).classList.remove('d-none');
                                        document.querySelector(`[data-choose-theme-style="light"]`).classList.add('d-none');
                                        break;
                                }

                                event.preventDefault();
                            });

                        })

                        class TypeWriter {
                        constructor(txtElement, words, wait = 3000) {
                            this.txtElement = txtElement;
                            this.words = words;
                            this.txt = '';
                            this.wordIndex = 0;
                            this.wait = parseInt(wait, 10);
                            this.type();
                            this.isDeleting = false;
                        }

                        type() {
                            // Current index of word
                            const current = this.wordIndex % this.words.length;
                            // Get full text of current word
                            const fullTxt = this.words[current];

                            // Check if deleting
                            if(this.isDeleting) {
                            // Remove char
                            this.txt = fullTxt.substring(0, this.txt.length - 1);
                            } else {
                            // Add char
                            this.txt = fullTxt.substring(0, this.txt.length + 1);
                            }

                            // Insert txt into element
                            this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

                            // Initial Type Speed
                            let typeSpeed = 200;

                            if(this.isDeleting) {
                            typeSpeed /= 2;
                            }

                            // If word is complete
                            if(!this.isDeleting && this.txt === fullTxt) {
                            // Make pause at end
                            typeSpeed = this.wait;
                            // Set delete to true
                            this.isDeleting = true;
                            } else if(this.isDeleting && this.txt === '') {
                            this.isDeleting = false;
                            // Move to next word
                            this.wordIndex++;
                            // Pause before start typing
                            typeSpeed = 500;
                            }

                            setTimeout(() => this.type(), typeSpeed);
                        }
                        }


                        // Init On DOM Load
                        document.addEventListener('DOMContentLoaded', init);

                        // Init App
                        function init() {
                        const txtElement = document.querySelector('.txt-type');
                        const words = JSON.parse(txtElement.getAttribute('data-words'));
                        const wait = txtElement.getAttribute('data-wait');
                        // Init TypeWriter
                        new TypeWriter(txtElement, words, wait);
                        }
                    </script>
                    <?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>

                <?php endif ?>
            </div>
        </div>
</div>


<!-- <script type="text/javascript" charset="UTF-8" src="//cdn.cookie-script.com/s/0d78709fa8d7397e66a54e2f56060ae0.js"></script> -->
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
