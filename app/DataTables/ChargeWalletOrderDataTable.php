<?php

namespace App\DataTables;

use App\ChargeWalletOrder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ChargeWalletOrderDataTable extends DataTable
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
        ->addColumn('user_name',function($row){
            return $row->user->username ?? null;
        })
        ->addColumn('withdraw_value',function($row){
            return $row->value ?? null;
        })
        ->addColumn('withdraw_status',function($row){
            return $row->status_text ?? null;
        })
        ->addColumn('action', function($row){
            $links =  '<a class="btn btn-info btn-sm action-datatable-btn" href="'.url('admin/charge-wallets/'.$row->id).'"> تفاصيل الطلب</a>';
            if($row->status == 0){
                $links .= ' <a class="btn btn-danger btn-sm action-datatable-btn" href="'.url('admin/update-charge-wallet-status/'.$row->id.'/2').'"> الغاء</a>
                <a class="btn btn-success btn-sm action-datatable-btn" href="'.url('admin/update-charge-wallet-status/'.$row->id.'/1').'"> موافقة</a>
                ';
            }

            return $links;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\ChargeWallet $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ChargeWalletOrder $model)
    {
        $chargewalletorders_Qry = ChargeWalletOrder::select('*')->get();
        return $this->applyScopes($chargewalletorders_Qry);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('chargewallet-table')
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
            Column::make('id')->title('رقم'),
            Column::make('user_name')->title('اسم المستخدم'),
            Column::make('withdraw_value')->title('قيمة السحب'),
            Column::make('withdraw_status')->title('حالة طلب السحب'),
            Column::make('created_at')->title('تاريخ الانشاء'),
            Column::computed('action')->title('')
                  ->exportable(false)
                  ->printable(false)
                  ->width(260)
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
        return 'ChargeWallet_' . date('YmdHis');
    }
}
