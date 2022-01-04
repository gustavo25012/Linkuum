<?php defined('ALTUMCODE') || die() ?>

<?php require THEME_PATH . 'views/partials/ads_header.php' ?>

<div class="novadiv">
    <div class="centralizar">
        <div class="arrumar">

            <h4 class="card-title"><?= $this->language->login->header ?> <lord-icon
                        src="https://cdn.lordicon.com/rjzlnunf.json"
                        trigger="loop"
                        colors="primary:#121331,secondary:#EC7791"
                        style="width:40px;height:40px">
                    </lord-icon></h4>

                    <?php display_notifications() ?>

                    <form action="" method="post" class="mt-4" role="form">
                        <div class="form-group">
                            <label><?= $this->language->login->form->email ?></label>
                            <input type="text" name="email" class="form-control" placeholder="<?= $this->language->login->form->email_placeholder ?>" value="<?= $data->values['email'] ?>" required="required" />
                        </div>

                        <div class="form-group">
                            <label><?= $this->language->login->form->password ?></label>
                            <input type="password" name="password" class="form-control" placeholder="<?= $this->language->login->form->password_placeholder ?>" <?= $data->login_account ? 'value="' . $data->values['password'] . '"' : null ?> required="required" />
                        </div>

                        <?php if($data->login_account && $data->login_account->twofa_secret && $data->login_account->active): ?>
                            <div class="form-group">
                                <label><?= $this->language->login->form->twofa_token ?></label>
                                <input type="text" name="twofa_token" class="form-control" placeholder="<?= $this->language->login->form->twofa_token_placeholder ?>" required="required" autocomplete="off" />
                            </div>
                        <?php endif ?>

                        <!-- <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="rememberme">
                                <small class="form-text text-muted"><?= $this->language->login->form->remember_me ?></small>
                            </label>
                        </div> -->

                        <div class="abaixar">
                            <button type="submit" name="submit" class="logarconta"><?= $this->language->login->form->login ?></button>
                        </div>

                        <div class="row">
                            <?php if($this->settings->facebook->is_enabled): ?>
                                <div class="col-sm mt-1">
                                    <a href="<?= $data->facebook_login_url ?>" class="btn btn-light btn-block"><?= sprintf($this->language->login->display->facebook, "<i class=\"fab fa-fw fa-facebook\"></i>") ?></a>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="under">
                            <small><a href="lost-password" class="text-muted" role="button"><?= $this->language->login->display->lost_password ?></a> / <a href="resend-activation" class="text-muted" role="button"><?= $this->language->login->display->resend_activation ?></a></small>
                        </div>
                    </form>
        </div>

        <?php if($this->settings->register_is_enabled): ?>
            <div class="subir">
                <?= sprintf($this->language->login->display->register, '<a href="' . url('register') . '" class="font-weight-bold">' . $this->language->login->display->register_help . '</a>') ?></a>
            </div>
        <?php endif ?>
    </div>
</div>

<div class="background-imagem">
    <h1 class="login-context"><?= $this->language->inicio->login?><span class="txt-type" data-wait="3000" data-words='["Instagram", "Facebook", "Dibbble", "Youtube", "Spotify"]'></span></h1>
</div>

<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<!-- <script type="text/javascript" charset="UTF-8" src="//cdn.cookie-script.com/s/0d78709fa8d7397e66a54e2f56060ae0.js"></script> -->
<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
