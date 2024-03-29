<?php

namespace App\DataTables;

use App\DataTables\UsersDataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use App\User;
use DB;
class UsersDataTable extends DataTable
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
            ->addColumn('action', function(User $row){
               $data  ='<a href="'.url('admin/users/'.$row->id).'" class="btn btn-info btn-sm action-datatable-btn">تفاصيل </a>';
               $data .= '<form style="display: inline;" method="post" action="'.url('admin/users/'.$row->id).'" onsubmit="FormSubmitDelete(event)">
               <input type="hidden" name="_token" value="'.csrf_token().'" />
               <input type="hidden" name="_method" value="DELETE" />
               <button type="submit" class="btn btn-danger btn-sm">حذف</button>
               </form>';
               return $data;
            })
            ->addColumn('created_at',function(User $row){
                return $row->created_at;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\UsersDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UsersDataTable $model)
    {
        # return $model->newQuery();
        $users_Qry = User::select('*')->get();
        return $this->applyScopes($users_Qry);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('usersdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
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
            Column::make('firstname')->title('الاسم الاول'),
            Column::make('lastname')->title('الاسم الثانى'),
            Column::make('email')->title('البريد اللكترونى'),
            Column::make('username')->title('اسم المستخدم'),
            Column::make('phone')->title('رقم الجوال'),
            Column::make('country')->title('الدولة')->visible(false),
            Column::make('created_at')->title('تاريخ الانشاء'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(160)
                  ->addClass('text-center')
                  ->title(''),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }


}
