<?php

namespace Webkul\SAASCustomizer\DataGrids\Settings;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Webkul\DataGrid\DataGrid;
use Webkul\SAASCustomizer\Repositories\Super\AgentRepository;
use Webkul\SAASCustomizer\Models\Agent;

class AgentDataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    protected $primaryColumn = 'agent_id';

    /**
     * Constructor for the class.
     *
     * @return void
     */
    public function __construct(protected AgentRepository $agentRepository)
    {
    }

    /**
     * Prepare query builder.
     *
     * @return void
     */
    public function prepareQueryBuilder()
    {
        $tablePrefix = DB::getTablePrefix();

        $queryBuilder = DB::table('super_admins')
            ->leftJoin('super_roles', 'super_admins.role_id', '=', 'super_roles.id')
            ->addSelect(
                'super_admins.id as agent_id',
                'super_admins.first_name',
                'super_admins.last_name',
                'super_admins.email as agent_email',
                'super_admins.image as agent_image',
                'super_admins.status',
                'super_roles.name as role_name'
            )
            ->addSelect(
                DB::raw('CONCAT('.$tablePrefix.'super_admins.first_name, " ", '.$tablePrefix.'super_admins.last_name) as full_name')
            );

        $this->addFilter('agent_id', 'super_admins.id');
        $this->addFilter('full_name', DB::raw('CONCAT('.$tablePrefix.'super_admins.first_name, " ", '.$tablePrefix.'super_admins.last_name)'));
        $this->addFilter('agent_email', 'super_admins.email');
        $this->addFilter('role_name', 'super_roles.name');

        return $queryBuilder;
    }

    /**
     * Add columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'agent_id',
            'label'      => trans('saas::app.super.settings.agents.index.datagrid.id'),
            'type'       => 'integer',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'full_name',
            'label'      => trans('saas::app.super.settings.agents.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);
        
        $this->addColumn([
            'index'              => 'agent_email',
            'label'              => trans('saas::app.super.settings.agents.index.datagrid.email'),
            'type'               => 'string',
            'searchable'         => true,
            'sortable'           => true,
            'filterable'         => true,
            'filterable_type'    => 'dropdown',
            'filterable_options' => $this->agentRepository->all(['email as label', 'email as value'])->toArray(),
        ]);

        $this->addColumn([
            'index'      => 'role_name',
            'label'      => trans('saas::app.super.settings.agents.index.datagrid.role'),
            'type'       => 'string',
            'searchable' => true,
            'filterable' => true,
            'sortable'   => true,
        ]);

        $this->addColumn([
            'index'      => 'agent_img',
            'label'      => trans('admin::app.settings.users.index.datagrid.name'),
            'type'       => 'string',
            'searchable' => false,
            'filterable' => false,
            'sortable'   => false,
            'closure'    => function ($row) {
                if ($row->agent_image) {
                    return Storage::url($row->agent_image);
                }

                return null;
            },
        ]);

        $this->addColumn([
            'index'           => 'status',
            'label'           => trans('saas::app.super.settings.agents.index.datagrid.status'),
            'type'            => 'integer',
            'searchable'      => false,
            'sortable'        => true,
            'filterable'      => true,
            'filterable_type' => 'dropdown',
            'filterable_options' => [
                [
                    'label' => trans('saas::app.super.settings.agents.index.datagrid.active'),
                    'value' => Agent::STATUS_ACTIVE,
                ],
                [
                    'label' => trans('saas::app.super.settings.agents.index.datagrid.disable'),
                    'value' => Agent::STATUS_INACTIVE,
                ],
            ],
            'closure'    => function ($row) {
                if ($row->status) {
                    return '<p class="label-active">'.trans('saas::app.super.settings.agents.index.datagrid.active').'</p>';
                }
                
                return '<p class="label-info">'.trans('saas::app.super.settings.agents.index.datagrid.disable').'</p>';
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        if (companyBouncer()->hasPermission('settings.agents.edit')) {
            $this->addAction([
                'index'  => 'edit',
                'icon'   => 'icon-edit',
                'title'  => trans('saas::app.super.settings.agents.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('super.settings.agents.edit', $row->agent_id);
                },
            ]);
        }

        if (companyBouncer()->hasPermission('settings.agents.delete')) {
            $this->addAction([
                'index'  => 'delete',
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.agents.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('super.settings.agents.delete', $row->agent_id);
                },
            ]);
        }
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        if (companyBouncer()->hasPermission('settings.agents.mass_delete')) {
            $this->addMassAction([
                'icon'   => 'icon-delete',
                'title'  => trans('saas::app.super.settings.agents.index.datagrid.delete'),
                'method' => 'POST',
                'url'    => route('super.settings.agents.mass_delete'),
            ], true);
        }
    }
}
