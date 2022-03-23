<?php

namespace App\DataTables;

use App\TicketSupport;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use DB;
class TicketSupportDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->of($query)
            ->addColumn('ticket_id',function($row){
                return $row->ticket_id;
            })
            ->addColumn('user_name',function($row){
                return $row->users->username ?? null;
            })
            ->addColumn('ticket_excerpt',function($row){
                return '<p class="title-excerpt">'.$row->title.'</p>'.'<p class="content-excerpt">'.$row->ticket ?? null.'</p>';
            })
            ->addColumn('status_ticket',function($row){
                return '<span class="badge bg-success">'.$row->status_text.'</span>' ?? null;
            })
            ->addColumn('action', function($row){
                return '<a class="btn btn-primary btn-sm action-datatable-btn" href="'.url('admin/tickets/'.$row->ticket_id).'"> Show Details</a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\TicketSupport $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TicketSupport $model)
    {
        $ticket_support_Qry =  TicketSupport::select(DB::raw('ANY_VALUE(id) as id ,
         ANY_VALUE(payment_id) as payment_id,
         ANY_VALUE(user_id) as user_id,
         ANY_VALUE(title) as title,
         ANY_VALUE(ticket) as ticket,
         ANY_VALUE(status) as status,
         ANY_VALUE(created_at) as created_at,
         ticket_id as ticket_id'))
        ->groupBy('ticket_id')->where('type',0)->orWhere('type',1)->get();
        return $this->applyScopes($ticket_support_Qry);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('ticketsupport-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export')->text('تصدير جدول'),
                        Button::make('print')->text('طباعة الجدول'),
                        Button::make('reset')->text('اعادة تحميل الجدول'),
                        'colvis'
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('ticket_id'),
            Column::make('user_name'),
            Column::computed('ticket_excerpt')->width(460),
            Column::make('status_ticket'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'TicketSupport_' . date('YmdHis');
    }
}
