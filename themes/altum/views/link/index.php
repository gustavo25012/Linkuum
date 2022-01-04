<?php defined('ALTUMCODE') || die() ?>

<input type="hidden" id="base_controller_url" name="base_controller_url" value="<?= url('link/' . $data->link->link_id) ?>" />
<input type="hidden" name="link_base" value="<?= $this->link->domain ? $this->link->domain->url : url() ?>" />

<header class="header">
    
</header>

<?php require THEME_PATH . 'views/partials/ads_header.php' ?>

<section class="container">

    <?php display_notifications() ?>

    <?= $this->views['method'] ?>

</section>

<?php ob_start() ?>
<link href="<?= SITE_URL . ASSETS_URL_PATH . 'css/pickr.min.css' ?>" rel="stylesheet" media="screen">
<link href="<?= SITE_URL . ASSETS_URL_PATH . 'css/daterangepicker.min.css' ?>" rel="stylesheet" media="screen,print">
<?php \Altum\Event::add_content(ob_get_clean(), 'head') ?>

<?php ob_start() ?>


<script>
    let clipboard = new ClipboardJS('[data-clipboard-text]');

    /* Delete handler for the notification */
    $('[data-delete]').on('click', event => {
        let message = $(event.currentTarget).attr('data-delete');

        if(!confirm(message)) return false;

        /* Continue with the deletion */
        ajax_call_helper(event, 'link-ajax', 'delete', (event, data) => {
            fade_out_redirect({ url: data.details.url, full: true });
        });

    });

    /* Copy full url handler */
    $('#link_full_url_copy').on('click', event => {
        let copy = $(event.currentTarget).data('copy');
        let copied = $(event.currentTarget).data('copied');

        $(event.currentTarget).attr('data-original-title', copied).tooltip('show');

        setTimeout(() => {
            $(event.currentTarget).attr('data-original-title', copy);
        }, 500);
    });
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>
