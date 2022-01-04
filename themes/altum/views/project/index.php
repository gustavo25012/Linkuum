<?php defined('ALTUMCODE') || die() ?>

<input type="hidden" id="base_controller_url" name="base_controller_url" value="<?= url('project/' . $data->project->project_id) ?>" />

<header class="header">
    <div class="container">

        <nav aria-label="breadcrumb">
            <small>
                <ol class="custom-breadcrumbs">
                    <li><a href="<?= url('dashboard') ?>"><?= $this->language->dashboard->breadcrumb ?></a> <i class="fa fa-fw fa-angle-right"></i></li>
                    <li class="active" aria-current="page"><?= $this->language->project->breadcrumb ?></li>
                </ol>
            </small>
        </nav>

        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="d-flex align-items-center">
                <h1 class="h3 mr-3"><?= sprintf($this->language->project->header->header, $data->project->name) ?></h1>

                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" class="text-secondary dropdown-toggle dropdown-toggle-simple">
                        <i class="fa fa-ellipsis-v"></i>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" data-toggle="modal" data-target="#project_update" data-project-id="<?= $data->project->project_id ?>" data-name="<?= $data->project->name ?>" class="dropdown-item"><i class="fa fa-fw fa-pencil-alt"></i> <?= $this->language->global->edit ?></a>
                            <a href="#" data-toggle="modal" data-target="#project_delete" data-project-id="<?= $data->project->project_id ?>" class="dropdown-item"><i class="fa fa-fw fa-times"></i> <?= $this->language->global->delete ?></a>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-auto p-0"></div>
        </div>

        <p class="text-muted"><?= $this->language->project->header->subheader ?></p>

    </div>
</header>

<?php require THEME_PATH . 'views/partials/ads_header.php' ?>

<section class="container">

    <?php display_notifications() ?>

    <?php if($data->links_chart): ?>
    <div class="chart-container">
        <canvas id="clicks_chart"></canvas>
    </div>
    <?php endif ?>

    <?php ob_start() ?>
    <?php if($this->settings->links->shortener_is_enabled): ?>
        <div class="dropdown">
            <button type="button" data-toggle="dropdown" class="principal">
                <i class="fa fa-fw fa-plus-circle"></i> <?= $this->language->project->links->create ?>
            </button>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#create_biolink">
                    <i class="fa fa-fw fa-circle fa-sm mr-1" style="color: <?= $this->language->link->biolink->color ?>"></i>

                    <?= $this->language->link->biolink->name ?>
                </a>

                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#create_link">
                    <i class="fa fa-fw fa-circle fa-sm mr-1" style="color: <?= $this->language->link->link->color ?>"></i>

                    <?= $this->language->link->link->name ?>
                </a>
            </div>
        </div>
    <?php else: ?>
        <button type="button" data-toggle="modal" data-target="#create_biolink" class="btn btn-primary rounded-pill">
            <i class="fa fa-fw fa-plus-circle"></i> <?= $this->language->project->links->create ?>
        </button>
    <?php endif ?>
    <?php $create_link_button = ob_get_clean(); ?>

    <div class="mt-5 d-flex justify-content-between">
        <h2 class="h4"><?= $this->language->project->links->header ?></h2>

        <?php if(count($data->links)): ?>
        <div class="col-auto p-0 d-flex">
            <div>
                <?= $create_link_button ?>
            </div>

            <div class="ml-3">
                <div class="dropdown">
                    <button type="button" class="btn <?= count($data->filters->get) ? 'btn-outline-primary' : 'btn-outline-secondary' ?> rounded-pill filters-button dropdown-toggle-simple" data-toggle="dropdown"><i class="fa fa-fw fa-sm fa-filter"></i></button>

                    <div class="dropdown-menu dropdown-menu-right filters-dropdown">
                        <div class="dropdown-header d-flex justify-content-between">
                            <span class="h6 m-0"><?= $this->language->global->filters->header ?></span>

                            <?php if(count($data->filters->get)): ?>
                                <a href="<?= url('project/' . $data->project->project_id) ?>" class="text-muted"><?= $this->language->global->filters->reset ?></a>
                            <?php endif ?>
                        </div>

                        <div class="dropdown-divider"></div>

                        <form action="" method="get" role="form">
                            <div class="form-group px-4">
                                <label for="search" class="small"><?= $this->language->global->filters->search ?></label>
                                <input type="text" name="search" id="search" class="form-control form-control-sm" value="<?= $data->filters->search ?>" />
                            </div>

                            <div class="form-group px-4">
                                <label for="search_by" class="small"><?= $this->language->global->filters->search_by ?></label>
                                <select name="search_by" id="search_by" class="form-control form-control-sm">
                                    <option value="url" <?= $data->filters->search_by == 'url' ? 'selected="selected"' : null ?>><?= $this->language->project->filters->search_by_url ?></option>
                                </select>
                            </div>

                            <div class="form-group px-4">
                                <label for="is_enabled" class="small"><?= $this->language->global->filters->status ?></label>
                                <select name="is_enabled" id="is_enabled" class="form-control form-control-sm">
                                    <option value=""><?= $this->language->global->filters->all ?></option>
                                    <option value="1" <?= isset($data->filters->filters['is_enabled']) && $data->filters->filters['is_enabled'] == '1' ? 'selected="selected"' : null ?>><?= $this->language->global->active ?></option>
                                    <option value="0" <?= isset($data->filters->filters['is_enabled']) && $data->filters->filters['is_enabled'] == '0' ? 'selected="selected"' : null ?>><?= $this->language->global->disabled ?></option>
                                </select>
                            </div>

                            <div class="form-group px-4">
                                <label for="type" class="small"><?= $this->language->project->filters->type ?></label>
                                <select name="type" id="type" class="form-control form-control-sm">
                                    <option value=""><?= $this->language->global->filters->all ?></option>
                                    <option value="biolink" <?= isset($data->filters->filters['type']) && $data->filters->filters['type'] == 'biolink' ? 'selected="selected"' : null ?>><?= $this->language->project->filters->type_biolink ?></option>
                                    <option value="link" <?= isset($data->filters->filters['type']) && $data->filters->filters['type'] == 'link' ? 'selected="selected"' : null ?>><?= $this->language->project->filters->type_link ?></option>
                                </select>
                            </div>

                            <div class="form-group px-4">
                                <label for="order_by" class="small"><?= $this->language->global->filters->order_by ?></label>
                                <select name="order_by" id="order_by" class="form-control form-control-sm">
                                    <option value="date" <?= $data->filters->order_by == 'date' ? 'selected="selected"' : null ?>><?= $this->language->global->filters->order_by_datetime ?></option>
                                    <option value="clicks" <?= $data->filters->order_by == 'clicks' ? 'selected="selected"' : null ?>><?= $this->language->project->filters->order_by_clicks ?></option>
                                    <option value="url" <?= $data->filters->order_by == 'url' ? 'selected="selected"' : null ?>><?= $this->language->project->filters->order_by_url ?></option>
                                </select>
                            </div>

                            <div class="form-group px-4">
                                <label for="order_type" class="small"><?= $this->language->global->filters->order_type ?></label>
                                <select name="order_type" id="order_type" class="form-control form-control-sm">
                                    <option value="ASC" <?= $data->filters->order_type == 'ASC' ? 'selected="selected"' : null ?>><?= $this->language->global->filters->order_type_asc ?></option>
                                    <option value="DESC" <?= $data->filters->order_type == 'DESC' ? 'selected="selected"' : null ?>><?= $this->language->global->filters->order_type_desc ?></option>
                                </select>
                            </div>

                            <div class="form-group px-4 mt-4">
                                <button type="submit" class="principal"><?= $this->language->global->submit ?></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
    </div>

    <?php if(count($data->links)): ?>

        <?php foreach($data->links as $row): ?>

        <div class="d-flex custom-row align-items-center my-4 <?= $row->is_enabled ? null : 'custom-row-inactive' ?>">

            <div class="col-8 col-md-5 text-truncate">
                <div class="d-flex align-items-center">
                    <div class="mr-3 d-none d-md-inline-block">
                        <span class="fa-stack fa-1x" data-toggle="tooltip" title="<?= $this->language->link->{$row->type}->name ?>">
                            <i class="fa fa-circle fa-stack-2x" style="color: <?= $this->language->link->{$row->type}->color ?>"></i>
                            <i class="fas <?= $this->language->link->{$row->type}->icon ?> fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>

                    <div class="d-flex flex-column" style="min-width: 0;">
                        <a href="<?= url('link/' . $row->link_id) ?>" class="font-weight-bold"><?= $row->url ?></a>
                        <span class="d-flex align-items-center">
                            <span class="d-inline-block text-truncate">
                            <?php if(!empty($row->location_url)): ?>
                                <img src="https://external-content.duckduckgo.com/ip3/<?= parse_url($row->location_url)['host'] ?>.ico" class="img-fluid icon-favicon mr-1" />
                                <a href="<?= $row->location_url ?>" class="text-muted align-middle"><?= $row->location_url ?></a>
                            <?php else: ?>
                                <img src="https://external-content.duckduckgo.com/ip3/<?= parse_url($row->full_url)['host'] ?>.ico" class="img-fluid icon-favicon mr-1" />
                                <a href="<?= $row->full_url ?>" class="text-muted align-middle"><?= $row->full_url ?></a>
                            <?php endif ?>
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col d-none d-md-block">
                <a href="<?= url('link/' . $row->link_id . '/statistics') ?>">
                    <span data-toggle="tooltip" title="<?= $this->language->project->links->clicks ?>"><span class="badge badge-primary"><i class="fa fa-fw fa-chart-bar mr-1"></i> <?= nr($row->clicks) ?></span></span>
                </a>
            </div>

            <div class="col d-none d-md-block">
                <span class="text-muted" data-toggle="tooltip" title="<?= $this->language->project->links->date ?>"><i class="fa fa-fw fa-calendar-alt fa-sm mr-1"></i> <span class="align-middle"><?= \Altum\Date::get($row->date, 2) ?></span></span>
            </div>

            <div class="col-2 col-md-auto">
                <div class="custom-control custom-switch" data-toggle="tooltip" title="<?= $this->language->project->links->is_enabled_tooltip ?>">
                    <input
                            type="checkbox"
                            class="custom-control-input"
                            id="link_is_enabled_<?= $row->link_id ?>"
                            data-row-id="<?= $row->link_id ?>"
                            onchange="ajax_call_helper(event, 'link-ajax', 'is_enabled_toggle')"
                        <?= $row->is_enabled ? 'checked="checked"' : null ?>
                    >
                    <label class="custom-control-label clickable" for="link_is_enabled_<?= $row->link_id ?>"></label>
                </div>
            </div>

            <div class="col-2 d-flex justify-content-end col-md-auto">
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" class="text-secondary dropdown-toggle dropdown-toggle-simple">
                        <i class="fa fa-ellipsis-v"></i>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= url('link/' . $row->link_id) ?>" class="dropdown-item"><i class="fa fa-fw fa-pencil-alt"></i> <?= $this->language->global->edit ?></a>
                            <a href="<?= url('link/' . $row->link_id . '/statistics') ?>" class="dropdown-item"><i class="fa fa-fw fa-chart-bar"></i> <?= $this->language->link->statistics->link ?></a>
                            <a href="<?= $row->full_url . '/qr' ?>" target="_blank" class="dropdown-item"><i class="fa fa-fw fa-qrcode"></i> <?= $this->language->link->qr->link ?></a>
                            <a href="#" class="dropdown-item" data-delete="<?= $this->language->global->info_message->confirm_delete ?>" data-row-id="<?= $row->link_id ?>"><i class="fa fa-fw fa-times"></i> <?= $this->language->global->delete ?></a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach ?>

        <div class="mt-3"><?= $data->pagination ?></div>

    <?php else: ?>

        <div class="d-flex flex-column align-items-center justify-content-center mt-5">
        <img class="nocontent" src="<?= SITE_URL . ASSETS_URL_PATH . 'images/01.png' ?>"" />
            <h2 class="h4 text-muted mb-4"><?= $this->language->project->links->no_data ?></h2>
            <?= $create_link_button ?>
        </div>

    <?php endif ?>

</section>

<?php ob_start() ?>
<script src="<?= SITE_URL . ASSETS_URL_PATH . 'js/libraries/Chart.bundle.min.js' ?>"></script>
<script>
    /* Charts */
    Chart.defaults.global.elements.line.borderWidth = 4;
    Chart.defaults.global.elements.point.radius = 3;
    Chart.defaults.global.elements.point.borderWidth = 7;

    let clicks_chart = document.getElementById('clicks_chart').getContext('2d');

    let gradient = clicks_chart.createLinearGradient(0, 0, 0, 250);
    gradient.addColorStop(0, 'rgba(56, 178, 172, 0.6)');
    gradient.addColorStop(1, 'rgba(56, 178, 172, 0.05)');

    let gradient_white = clicks_chart.createLinearGradient(0, 0, 0, 250);
    gradient_white.addColorStop(0, 'rgba(255, 255, 255, 0.6)');
    gradient_white.addColorStop(1, 'rgba(255, 255, 255, 0.05)');

    new Chart(clicks_chart, {
        type: 'line',
        data: {
            labels: <?= $data->links_chart['labels'] ?>,
            datasets: [{
                label: <?= json_encode($this->language->link->statistics->impressions) ?>,
                data: <?= $data->links_chart['impressions'] ?? '[]' ?>,
                backgroundColor: gradient,
                borderColor: '#38B2AC',
                fill: true
            },
            {
                label: <?= json_encode($this->language->link->statistics->uniques) ?>,
                data: <?= $data->links_chart['uniques'] ?? '[]' ?>,
                backgroundColor: gradient_white,
                borderColor: '#ebebeb',
                fill: true
            }]
        },
        options: {
            tooltips: {
                mode: 'index',
                intersect: false,
                callbacks: {
                    label: (tooltipItem, data) => {
                        let value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];

                        return `${nr(value)} ${data.datasets[tooltipItem.datasetIndex].label}`;
                    }
                }
            },
            title: {
                display: false
            },
            legend: {
                display: true
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        userCallback: (value, index, values) => {
                            if (Math.floor(value) === value) {
                                return nr(value);
                            }
                        }
                    },
                    min: 0
                }],
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }]
            }
        }
    });

    /* Delete handler */
    $('[data-delete]').on('click', event => {
        let message = $(event.currentTarget).attr('data-delete');

        if(!confirm(message)) return false;

        /* Continue with the deletion */
        ajax_call_helper(event, 'link-ajax', 'delete', () => {

            /* On success delete the actual row from the DOM */
            $(event.currentTarget).closest('.custom-row').remove();

        });

    });
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>
