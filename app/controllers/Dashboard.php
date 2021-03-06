<?php

namespace Altum\Controllers;

use Altum\Database\Database;
use Altum\Middlewares\Authentication;
use Altum\Models\Plan;
use Altum\Routing\Router;

class Dashboard extends Controller {

    public function index() {

        Authentication::guard();

        /* Create Modal */
        $view = new \Altum\Views\View('project/project_create_modal', (array) $this);
        \Altum\Event::add_content($view->run(), 'modals');

        /* Update Modal */
        $view = new \Altum\Views\View('project/project_update_modal', (array) $this);
        \Altum\Event::add_content($view->run(), 'modals');

        /* Delete Modal */
        $view = new \Altum\Views\View('project/project_delete_modal', (array) $this);
        \Altum\Event::add_content($view->run(), 'modals');

        /* Prepare the filtering system */
        $filters = (new \Altum\Filters(['is_enabled'], ['name'], ['name', 'date']));

        /* Prepare the paginator */
        $total_rows = Database::$database->query("SELECT COUNT(*) AS `total` FROM `projects` WHERE `user_id` = {$this->user->user_id} {$filters->get_sql_where()}")->fetch_object()->total ?? 0;
        $paginator = (new \Altum\Paginator($total_rows, 25, $_GET['page'] ?? 1, url('dashboard?' . $filters->get_get() . '&page=%d')));

        /* Get the projects list for the user */
        $projects = [];
        $projects_result = Database::$database->query("SELECT * FROM `projects` WHERE `user_id` = {$this->user->user_id} {$filters->get_sql_where()} {$filters->get_sql_order_by()} LIMIT {$paginator->getSqlOffset()}, {$paginator->getItemsPerPage()}");
        while($row = $projects_result->fetch_object()) $projects[] = $row;

        /* Prepare the pagination view */
        $pagination = (new \Altum\Views\View('partials/pagination', (array) $this))->run(['paginator' => $paginator]);

        /* Some statistics for the widgets */
        if($this->settings->links->domains_is_enabled) {
            $domains_total = Database::$database->query("SELECT COUNT(*) AS `total` FROM `domains` WHERE `user_id` = {$this->user->user_id} AND `type` = 0")->fetch_object()->total;
        }

        $projects_total = Database::$database->query("SELECT COUNT(*) AS `total` FROM `projects` WHERE `user_id` = {$this->user->user_id}")->fetch_object()->total;
        $links_total = Database::$database->query("SELECT COUNT(*) AS `total` FROM `links` WHERE `user_id` = {$this->user->user_id}")->fetch_object()->total;

        /* Get statistics based on the total clicks */
        $links_clicks_total = Database::$database->query("SELECT SUM(`clicks`) AS `total` FROM `links` WHERE `user_id` = {$this->user->user_id}")->fetch_object()->total;

        /* Prepare the View */
        $data = [
            'projects'              => $projects,
            'pagination'            => $pagination,
            'filters'               => $filters,

            'domains_total'         => $domains_total ?? 0,
            'projects_total'        => $projects_total,
            'links_total'           => $links_total,
            'links_clicks_total'    => $links_clicks_total
        ];

        $view = new \Altum\Views\View('dashboard/index', (array) $this);

        $this->add_view_content('content', $view->run($data));

    }

}
