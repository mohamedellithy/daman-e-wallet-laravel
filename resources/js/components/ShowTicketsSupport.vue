<template>
    <div class="col-sm-12">
        <div class="col-sm-12 title-heading">
            <h3 class="section-heading">{{ __('master.Tickets') }}</h3>
            <p class="section-subheading">{{ __('master.description_tickets') }}</p>
        </div>
        <div class="col-md-12">
            <p v-if="this.success" class="alert alert-success">
                {{ success }}
            </p>

            <ul v-if="Object.keys(this.errors).length != 0" class="alert alert-danger">
                <li v-for="error in this.errors" :key="error.index">{{ error[0] }}</li>
            </ul>
        </div>
        <div class="accordion faq pt-5">

            <div class="panel-wrap" v-for="(ticket,index) in tickets" :key="index">
                <div class="panel-title tickets-tables">
                    <ul :class="[ticket.status == 2 ? 'canceled':'']">
                        <li>#{{ ticket.id }} </li>
                        <li>{{ ticket.title }}</li>
                        <li>{{ SummaryTicket(ticket.ticket)  }}</li>
                        <li> <label class="label-status">{{ ticket.status_text }}</label></li>
                    </ul>
                    <div class="float-right">
                        <i  class="btn btn-default-green-fill mt-5 fa fa-plus">{{__('master.Order_Details') }}</i>
                        <i  class="btn btn-default-green-fill mt-5 fa fa fa-minus c-pink">{{__('master.Order_Details')}}</i>

                    </div>
                </div>
                <div class="panel-collapse tickets-pannel">
                    <div class="wrapper-collapse row">
                        <div class="info col-md-8">
                            <table class="list">
                                 <tr class="heading-list">
                                    <th colspan="3">{{__('master.title') }}</th>
                                </tr>
                                <tr class="orders-list" >
                                    <td>{{ ticket.title }}</td>
                                </tr>
                                <tr class="heading-list">
                                    <th colspan="3">{{__('master.complaints')}}</th>
                                </tr>
                                <tr class="orders-list" >
                                    <td>{{ ticket.ticket }}</td>
                                </tr>
                                <tr class="heading-list">
                                    <th colspan="3">{{__('master.email')}}</th>
                                </tr>
                                <tr class="orders-list" >
                                    <td>{{ ticket.email }}</td>
                                </tr>
                                <tr >
                                    <td class="order-btns">
                                        <br/>
                                        <router-link :to="{path:`/tickets/${ticket.ticket_id}/show`}" tag="a" class="btn btn-default-fill">{{__('master.Show_tickets')}} <i class="fas fa-arrow-alt-circle-right"></i></router-link>
                                        <a v-if="ticket.status != 2" @click="CloseTicket(ticket.id,index)" class="btn btn-red-fill">{{ __('master.Close_Ticket') }}<i class="fas fa-arrow-alt-circle-right"></i></a>
                                        <br/>
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="info col-md-4">
                            <table class="list others-info">

                                <tr class="heading-list">
                                    <th>{{__('master.Payment_Details') }}</th>
                                </tr>
                                <tr>
                                    <td class="payment-item">{{ __('master.order_number') }} #{{ ticket.payment_id }}</td>
                                </tr>
                                <tr class="heading-list">
                                    <th>{{ __('master.Date_Order') }}</th>
                                </tr>
                                <tr>
                                    <td class="payment-item">{{ ticket.created_at }}</td>
                                </tr>
                                <tr class="heading-list">
                                    <th>{{__('master.order_status')}}</th>
                                </tr>
                                <tr>
                                    <td class="payment-item">{{ ticket.status_text }}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            field:{},
            errors:{},
            tickets:{},
            success:null
        }
    },
    created() {
        let self = this;
        this.axios.get('support-tickets').then(function ({data}){
            self.tickets = data.tickets;
            console.log(self.tickets);
        }).catch(function({response}){
            console.log(response);
        });
    },
    methods:{
        CloseTicket:function(ticket_id,index){
            let self = this;
            this.axios.get(`support-tickets/status/${ticket_id}/2`).then(function({data}){
                self.success = data.status;
                self.tickets[index] = data.ticket;
                console.log(data.ticket);
            }).catch(function({response}){
                self.errors = response.data.errors;
                console.log(self.errors);
            });
        },
        CreateOrderWithdraw:function(){
            this.errors = {};
            let self = this;
            this.axios.post('withdraws',this.field).then(function({data}){
                self.success = data.status;
                self.field   = {};
                console.log(self.success);
            }).catch(function({response}){
                self.errors = response.data.errors;
                console.log(self.errors);
            });
        },
        SummaryTicket:function(title){
            return title.substring(1,50) + " ... ";
        }
    }
}
</script>
<style>
.others-info , .list{
    width: 100%;
    text-align: rtl;
}
.orders-list td{
    padding: 15px 0px;
    background-color: #fff;
}
.heading-list{
    line-height: 3em;
}
.payment-link{
    background-color: #eee;
    padding: 11px;
    border-radius: 35px;
}
.order-btns a.btn{
    padding: 5px 0px !important;
    display: inline-block !important;
    width: 48% !important;
    font-size: 12px !important;
}
.btn-red-fill{
    background-color: #f45a5a !important;
    color: #ffffff !important;
    border-color: #f45a5a !important;
}
.others-info th{
    text-align: right;
    padding: 0px 8px;
}
.payment-item{
    text-align: right;
    background-color: #eee;
    padding: 6px;
}
.list th,
.list td{
    text-align: right;
}
.alert-model-payments{
    display: inline-block !important;
    margin: 0px 6px;
    margin-top: 0px !important;
    padding: 10px 21px !important;
}
.model-alert-btn{
    width: 100% !important;
    text-align: left !important;
}
.btn-warning.alert-model-payments{
    background-color:darkorange !important;
    color:white !important;
    border:1px solid transparent !important;
}
.btn-info.alert-model-payments{
    color: #ffffff !important;
    border-color: #1565c0 !important;
    background-color: #1565c0 !important;
}
.order-btns{
    padding: 16px;
}
.submit-order{
    display: inline-block !important;
}
ul.alert-danger{
    text-align: right;
    direction: ltr;
}
.panel-title ul{
    display: inline-flex;
}
.panel-title ul li.email{
    width: 300px;
    word-break: break-all;
    text-align: right;
    direction: rtl;
}
.orders-list td {
    padding: 4px 16px;
}
.payment-item{
    padding: 8px 14px;
}
.image-payment-withdraw{
    width: 20% !important;
}
.orders-list td{
    background-color:#eee;
}
.canceled li:not(:last-child,:first-child){
    text-decoration: line-through rgb(245, 73, 73);
}
.label-status{
    background-color: #1565c0 !important;
    color: wheat;
    font-size: 12px;
    padding: 6px 13px;
}
</style>
