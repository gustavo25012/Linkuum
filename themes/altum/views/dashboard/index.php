<?php defined('ALTUMCODE') || die() ?>

<header class="newespaco">
    <div class="containercards">

    
        <div class="cardinhos">
            <?php if($this->settings->links->domains_is_enabled): ?>
                <!-- <div class="linha">
                        <h1 class="view"><?= $this->language->inicio->view?></h1>
                    </div> -->
            <div class="col-12 col-lg mb-3 mb-xl-0">
                <div class="novoscards">
            

                    <div class="cardsminuatura">
                        <div>
                            <div class="sair">
                                <div class="fundonova">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="3.6" y1="9" x2="20.4" y2="9" />
                                        <line x1="3.6" y1="15" x2="20.4" y2="15" />
                                        <path d="M11.5 3a17 17 0 0 0 0 18" />
                                        <path d="M12.5 3a17 17 0 0 1 0 18" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="one"><?= nr($data->domains_total) ?></div>
                            <span class="two"><?= $this->language->dashboard->header->domains ?></span>
                        </div>
                    </div>
                </div>
            </div>
            

            <?php endif ?>


            <div class="col-12 col-lg mb-3 mb-xl-0">
                <div class="novoscards">
                    <div class="cardsminuatura">

                        <div>
                            <div class="sair">
                                <div class="fundonova">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-folders" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9 4h3l2 2h5a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                        <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h2" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="one"><?= nr($data->projects_total) ?></div>
                            <span class="two"><?= $this->language->dashboard->header->projects ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg mb-3 mb-xl-0">
                <div class="novoscards">
                    <div class="cardsminuatura">

                        <div>
                            <div class="sair">
                                <div class="fundonova">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" />
                                        <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="one"><?= nr($data->links_total) ?></div>
                            <span class="two"><?= $this->language->dashboard->header->links ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg mb-3 mb-xl-0">
                <div class="novoscards">
                    <div class="cardsminuatura">

                        <div>
                            <div class="sair">
                                <div class="fundonova">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <rect x="3" y="12" width="6" height="8" rx="1" />
                                        <rect x="9" y="8" width="6" height="12" rx="1" />
                                        <rect x="15" y="4" width="6" height="16" rx="1" />
                                        <line x1="4" y1="20" x2="18" y2="20" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="one"><?= nr($data->links_clicks_total) ?></div>
                            <span class="two"><?= $this->language->dashboard->header->clicks ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image-avulsa2">
                    <img class="abstratc" src="<?= SITE_URL . ASSETS_URL_PATH . 'images/05.png' ?>"" />
                </div>
        </div>
    </div>
    
</header>



<?php require THEME_PATH . 'views/partials/ads_header.php' ?>

<section class="container">

    <br>
    <?php display_notifications() ?>

    <div class="mt-5 d-flex justify-content-between">
        <h2 class="h4"><?= $this->language->dashboard->projects->header ?></h2>

        <?php if($this->user->plan_settings->projects_limit != -1 && $data->projects_total >= $this->user->plan_settings->projects_limit): ?>
                <button type="button" data-confirm="<?= $this->language->project->error_message->projects_limit ?>"  class="principal"><i class="fa fa-fw fa-plus-circle"></i> <?= $this->language->dashboard->projects->create ?></button>
            <?php else: ?>
                <button type="button" data-toggle="modal" data-target="#create_project" class="criarprojeto"><?= $this->language->dashboard->projects->create ?></button>
            <?php endif ?>

        <?php if(count($data->projects)): ?>
        <div class="col-auto p-0 d-flex">
            <div>

            </div>

            <div class="ml-3">
                <!-- <div class="dropdown">
                    <button type="button" class="btn <?= count($data->filters->get) ? 'btn-outline-primary' : 'btn-outline-secondary' ?> rounded-pill filters-button dropdown-toggle-simple" data-toggle="dropdown"><i class="fa fa-fw fa-sm fa-filter"></i></button> -->

                    <div class="dropdown-menu dropdown-menu-right filters-dropdown">
                        <div class="dropdown-header d-flex justify-content-between">
                            <span class="h6 m-0"><?= $this->language->global->filters->header ?></span>

                            <?php if(count($data->filters->get)): ?>
                                <a href="<?= url('dashboard') ?>" class="text-muted"><?= $this->language->global->filters->reset ?></a>
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
                                    <option value="name" <?= $data->filters->search_by == 'name' ? 'selected="selected"' : null ?>><?= $this->language->dashboard->filters->search_by_name ?></option>
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
                                <label for="order_by" class="small"><?= $this->language->global->filters->order_by ?></label>
                                <select name="order_by" id="order_by" class="form-control form-control-sm">
                                    <option value="date" <?= $data->filters->order_by == 'date' ? 'selected="selected"' : null ?>><?= $this->language->global->filters->order_by_datetime ?></option>
                                    <option value="name" <?= $data->filters->order_by == 'name' ? 'selected="selected"' : null ?>><?= $this->language->dashboard->filters->order_by_name ?></option>
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
    <p class="linkuum"><?= $this->language->dashboard->projects->subheader ?></p>


    <?php if(count($data->projects)): ?>

        <?php foreach($data->projects as $row): ?>
            <?php

            /* Get some stats about the project */
            $row->statistics = $this->database->query("SELECT COUNT(*) AS `total`, SUM(`clicks`) AS `clicks` FROM `links` WHERE `project_id` = {$row->project_id}")->fetch_object();

            ?>

            <div class="alinhamentos">
                <div class="segundocard" data-project-id="<?= $row->project_id ?>">
                    <div class="col-6">
                        <div class="texto">
                            <a href=""><?= $row->name ?></a>
                        </div>

                        <div class="informa"><i class="fa fa-fw fa-calendar-alt fa-sm mr-1"></i> <?= \Altum\Date::get($row->date, 2) ?></div>


                        <a href="<?= url('project/' . $row->project_id) ?>">
                            <button class="enterproject">Entrar</button>
                        </a>

                    </div>

                    <div class="informacoes">
                        <div>
                            <span data-toggle="tooltip" title="<?= $this->language->project->links->total ?>" class="infozinhas">
                                <i class="fa fa-fw fa-link mr-1"></i> <?= nr($row->statistics->total) ?>
                            </span>
                        </div>

                        <div>
                            <span data-toggle="tooltip" title="<?= $this->language->project->links->clicks ?>" class="infozinhas">
                                <i class="fa fa-fw fa-chart-bar mr-1"></i> <?= nr($row->statistics->clicks) ?>
                        </span>
                    </div>
                <div class="image-avulsa">
                    <img class="abstratc" src="<?= SITE_URL . ASSETS_URL_PATH . 'images/08.png' ?>"" />
                </div>
                </div>
            </div>

                <!-- <div class="col-2 d-flex justify-content-end">
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown" class="text-secondary dropdown-toggle dropdown-toggle-simple">
                            <i class="fa fa-ellipsis-v"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" data-toggle="modal" data-target="#project_update" data-project-id="<?= $row->project_id ?>" data-name="<?= $row->name ?>" class="dropdown-item"><i class="fa fa-fw fa-pencil-alt"></i> <?= $this->language->global->edit ?></a>
                                <a href="#" data-toggle="modal" data-target="#project_delete" data-project-id="<?= $row->project_id ?>" class="dropdown-item"><i class="fa fa-fw fa-times"></i> <?= $this->language->global->delete ?></a>
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>
        <?php endforeach ?>

        <div class="mt-3"><?= $data->pagination ?></div>

    <?php else: ?>
        <div class="imagem">
            <!-- <img src="<?= SITE_URL . ASSETS_URL_PATH . 'images/pro.svg' ?>" class="col-10 col-md-6 col-lg-4 mb-4" alt="<?= $this->language->dashboard->projects->no_data ?>" /> -->
            <h2 class="h4 mb-5 text-muted"><?= $this->language->dashboard->projects->no_data ?></h2>

        </div>
    <?php endif ?>


</section>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>