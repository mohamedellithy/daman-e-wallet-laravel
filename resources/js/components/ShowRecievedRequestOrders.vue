<template>
    <div class="col-sm-12">
        <div class="col-md-12">
            <p v-if="this.success" class="alert alert-success">
                {{ success }}
            </p>

            <ul v-if="Object.keys(this.errors).length != 0" class="alert alert-danger">
                <li v-for="error in this.errors" :key="error.index">{{ error[0] }}</li>
            </ul>
        </div>
        <div class="col-sm-12 title-heading">
            <h3 class="section-heading">{{__('master.Recieve_Request_Payment')}}</h3>
            <p class="section-subheading">{{ __('master.description_Recieve_Request_Payment')}}</p>
        </div>
        <div class="accordion faq pt-5">

            <div class="panel-wrap" v-for="(payment,index) in payments" :key="index">
                <div class="panel-title">
                    <ul :class="[payment.status == 2 ? 'canceled':'']">
                        <li>#{{ payment.id }} </li>
                        <li>{{ payment.payer_id }}</li>
                        <li>{{ payment.value }} {{ payment.currency }}</li>

                        <li>{{payment.status_text}}</li>
                    </ul>
                    <div class="float-right">
                        <i  class="btn btn-default-green-fill mt-5 fa fa-plus">{{ __('master.Order_Details') }}</i>
                        <i  class="btn btn-default-green-fill mt-5 fa fa fa-minus c-pink">{{__('master.Order_Details')}}</i>

                    </div>
                </div>
                <div class="panel-collapse">
                    <div class="wrapper-collapse row">
                        <div class="info col-md-8">
                            <table class="list">
                                <tr class="heading-list">
                                        <th colspan="3">{{__('master.Orders') }}</th>
                                </tr>
                                <tr class="orders-list" v-for="order in payment.orders" :key="order.index">
                                    <td>{{ order.title }}</td>
                                    <td>{{ order.description }}</td>
                                    <td>{{ order.quantity }}</td>
                                </tr>
                                <tr class="heading-list">
                                        <th>{{ __('master.Payment_request') }}</th>
                                </tr>
                                <tr>
                                        <td colspan="3" class="payment-item">{{ payment.value }} {{ payment.currency }}</td>
                                </tr>
                                <tr class="heading-list">
                                        <th colspan="3">{{__('master.Currency') }}</th>
                                </tr>
                                <tr>
                                        <td colspan="3" class="payment-item">{{ payment.currency }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="info col-md-4">
                            <table class="list others-info">
                                <tr class="heading-list">
                                    <th>{{ __('master.Payment_Link') }}</th>
                                </tr>
                                <tr>
                                    <td class="payment-link">{{ payment.payment_link }}</td>
                                </tr>
                                <tr class="heading-list">
                                    <th>{{__('master.Payee')}}</th>
                                </tr>
                                <tr>
                                    <td class="payment-item">{{ payment.payer_id }}</td>
                                </tr>
                                <tr class="heading-list">
                                        <th>{{__('master.Date_Order') }}</th>
                                </tr>
                                <tr>
                                        <td class="payment-item">{{ payment.created_at }}</td>
                                </tr>
                                <tr v-if="payment.status == 0">
                                    <td class="order-btns">
                                        <a @click="ApprovePayment(payment.id,index)" class="btn btn-green-fill approve-payments">{{__('master.Accept_Payment') }} <i class="fas fa-arrow-alt-circle-right"></i></a>
                                        <a @click="CancelPayment_recievied(payment.id,index)" class="btn btn-red-fill">{{__('master.Cancel_Payment') }} <i class="fas fa-arrow-alt-circle-right"></i></a>
                                    </td>
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
            show_section:'send-orders',
            errors:{},
            payments:{},
            success:null
        }
    },
    created() {
        let self = this;
        this.axios.get('wallet-payments/recievied').then(function ({data}){
            self.payments = data.payments;
            console.log(self.payments);
        }).catch(function({response}){
            console.log(response);
        });
    },
    methods:{
        CancelPayment:function(order_id,index){
            let self = this;
            this.success = null;
            this.axios.get(`update-payment-status/${order_id}/2`).then(function({data}){
                self.success = data.status;
                self.payments[index] = data.order;
                console.log(data.order);
            }).catch(function({response}){
                self.errors = response.data.errors;
                console.log(self.errors);
            });
        },
        ApprovePayment:function(order_id,index){
            let self = this;
            this.success = null;
            this.axios.get(`update-payment-status/${order_id}/1`).then(function({data}){
                self.success = data.status;
                self.recieved_requests[index] = data.order;
                console.log(data.order);
            }).catch(function({response}){
                self.errors = response.data.errors;
                console.log(self.errors);
            });s
        },
        CancelPayment_recievied:function(order_id,index){
            let self = this;
            this.success = null;
            this.axios.get(`update-payment-status/${order_id}/2`).then(function({data}){
                self.success = data.status;
                self.recieved_requests[index] = data.order;
                console.log(data.order);
            }).catch(function({response}){
                self.errors = response.data.errors;
                console.log(self.errors);
            });
        },

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
.panel-title ul{
    display: inline-flex;
}
.approve-payments{
    color: wheat !important;
    background-color: #00695c !important;
}
</style>
