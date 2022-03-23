<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Payment;
class PaymentsDataTable extends DataTable
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
            ->addColumn('payer',function($row){
                return $row->payer_id;
            })
            ->addColumn('payee',function($row){
                return $row->payee_email ?? null;
            })
            ->addColumn('payment_value',function($row){
                return $row->value ?? null;
            })
            ->addColumn('currency',function($row){
                return $row->currency ?? null;
            })
            ->addColumn('payment_link',function($row){
                return $row->payment_link ? '<a class="btn btn-sm btn-warning" href="'.$row->payment_link.'">رابط الفاتورة</a>' : null;
            })
            ->addColumn('status_payment',function($row){
                return $row->status ? '<span class="badge bg-success">'.$row->status_text.'</span>' :null;
            })
            ->addColumn('created_at',function($row){
                return $row->created_at;
            })
            ->addColumn('action', function($row){
                return '<a class="btn btn-sm btn-info" href="'.url('admin/payments/'.$row->id).'">تفاصيل الفاتورة</a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Payment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Payment $model)
    {
        $payments_Qry = Payment::select('*')->get();
        return $this->applyScopes($payments_Qry);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('payments-table')
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
            Column::make('id'),
            Column::make('payer')->title('الدافع'),
            Column::make('payee')->title('مستلم الدفع'),
            Column::make('payment_value')->title('قيمة الفاتورة'),
            Column::make('currency')->title('العملة'),
            Column::make('payment_link')->title('رابط فاتورة الدفع'),
            Column::make('status_payment')->title('حالة الفاتورة'),
            Column::make('created_at')->title('تاريخ الانشاء'),
            Column::computed('action')->title('')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
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
        return 'Payments_' . date('YmdHis');
    }
}
