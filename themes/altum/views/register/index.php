<?php defined('ALTUMCODE') || die() ?>

<?php require THEME_PATH . 'views/partials/ads_header.php' ?>

<div class="newdiv">
    <div class="d-flex flex-column align-items-center">
        <div class="arrumar">
            <?php display_notifications() ?>
            <h4 class="card-title"><?= $this->language->register->header ?><lord-icon
                        src="https://cdn.lordicon.com/eszyyflr.json"
                        trigger="loop"
                        delay="1000"
                        colors="primary:#121331,secondary:#EC7791"
                        style="width:40px;height:40px">
                    </lord-icon></h4>

                    <form action="" method="post" class="mt-4" role="form">
                        <div class="form-group">
                            <label><?= $this->language->register->form->name ?></label>
                            <input type="text" name="name" class="form-control" value="<?= $data->values['name'] ?>" placeholder="<?= $this->language->register->form->name_placeholder ?>" required="required" />
                        </div>

                        <div class="form-group">
                            <label><?= $this->language->register->form->email ?></label>
                            <input type="text" name="email" class="form-control" value="<?= $data->values['email'] ?>" placeholder="<?= $this->language->register->form->email_placeholder ?>" required="required" />
                        </div>

                        <div class="form-group">
                            <label><?= $this->language->register->form->password ?></label>
                            <input type="password" name="password" class="form-control" value="<?= $data->values['password'] ?>" placeholder="<?= $this->language->register->form->password_placeholder ?>" required="required" />
                        </div>

                        <!-- <div class="form-group">
                            <?php $data->captcha->display() ?>
                        </div> -->

                        <div class="formsche">
                            <label class="aaaa">
                                <input class="chacks" name="accept" type="checkbox" required="required">
                                <small class="fortext">
                                    <?= sprintf(
                                        $this->language->register->form->accept,
                                        '<a href="' . $this->settings->terms_and_conditions_url . '" target="_blank">' . $this->language->global->terms_and_conditions . '</a>',
                                        '<a href="' . $this->settings->privacy_policy_url . '" target="_blank">' . $this->language->global->privacy_policy . '</a>'
                                    ) ?>
                                </small>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" name="submit" class="criarconta"><?= $this->language->register->form->register ?></button>
                        </div>

                        <div class="row">
                            <?php if($this->settings->facebook->is_enabled): ?>
                                <div class="col-sm mt-1">
                                    <a href="<?= $data->facebook_login_url ?>" class="btn btn-light btn-block"><?= sprintf($this->language->login->display->facebook, "<i class=\"fab fa-fw fa-facebook\"></i>") ?></a>
                                </div>
                            <?php endif ?>
                        </div>
                    </form>
        </div>

        <div class="text-center mt-4">
            <small><a href="login" class="text-muted" role="button"><?= $this->language->register->login ?></a></small>
        </div>
    </div>
</div>

<div class="background-imagem">
    <h1 class="login-context"><?= $this->language->inicio->registrarconta?><span class="txt-type" data-wait="3000" data-words='["Instagram", "Facebook", "Dibbble", "Youtube", "Spotify"]'></span></h1>
</div>

<?php ob_start() ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php \Altum\Event::add_content(ob_get_clean(), 'head') ?>

<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>

