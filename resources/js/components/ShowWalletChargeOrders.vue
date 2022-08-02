<template>
    <div class="col-md-12">
        <div class="wrap-blog">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="sec-normal pt-0">
                        <div class="sec-main sec-bg1">
                            <div class="row">
                                <div class="model-alert-btn">
                                    <button @click="show_section = 'create-orders'" type="button" class="btn btn-warning alert-model-payments">{{__('master.Charge_Your_Wallet')}}</button>
                                    <button @click="show_section = 'show-orders'" type="button" class="btn btn-info alert-model-payments">{{__('master.charge_orders')}}</button>
                                </div>

                                <div class="col-sm-12" v-if="show_section == 'show-orders'">
                                    <div class="col-sm-12 title-heading">
                                        <h3 class="section-heading">{{ __('master.charge_orders') }}</h3>
                                        <p class="section-subheading">{{ __('master.desc_charge_orders') }}</p>
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

                                        <div class="panel-wrap" v-for="order in ChargeOrders" :key="order.index">
                                            <div class="panel-title">
                                                <ul :class="[order.status == 2 ? 'canceled':'']">
                                                    <li>#{{ order.id }} </li>
                                                    <li>{{ order.value }} {{ currency }}</li>
                                                    <li>{{order.status_text}}</li>
                                                    <li>{{ order.created_at }}</li>
                                                </ul>
                                                <div class="float-right">
                                                    <i  class="btn btn-default-green-fill mt-5 fa fa-plus">{{__('master.Order_Details') }}</i>
                                                    <i  class="btn btn-default-green-fill mt-5 fa fa fa-minus c-pink">{{__('master.Order_Details') }}</i>

                                                </div>
                                            </div>
                                            <div class="panel-collapse">
                                                <div class="wrapper-collapse row">
                                                    <div class="info col-md-8">
                                                        <table class="list">
                                                            <tr class="heading-list">
                                                                <th colspan="3">{{ __('master.Notice') }}</th>
                                                            </tr>
                                                            <tr class="orders-list" >
                                                                <td>{{ order.notice }}</td>
                                                            </tr>
                                                            <tr class="heading-list">
                                                                 <th>{{__('master.Payment_request') }}</th>
                                                            </tr>
                                                            <tr>
                                                                 <td colspan="3" class="payment-item">{{ order.value }} {{ currency }}</td>
                                                            </tr>

                                                            <tr class="heading-list">
                                                                 <th>{{__('master.Payment_Bill_Image') }}</th>
                                                            </tr>
                                                            <tr>
                                                                 <td colspan="3" class="payment-item">
                                                                     <img :src="require('../asset/img/bill.png')" class="image-payment-withdraw"/>
                                                                 </td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    <div class="info col-md-4">
                                                        <table class="list others-info">
                                                            <tr class="heading-list">
                                                                 <th>{{__('master.Date_Order') }}</th>
                                                            </tr>
                                                            <tr>
                                                                 <td class="payment-item">{{ order.created_at }}</td>
                                                            </tr>
                                                            <tr class="heading-list">
                                                                 <th>{{__('master.order_status') }}</th>
                                                            </tr>
                                                            <tr>
                                                                 <td class="payment-item">{{ order.status_text }}</td>
                                                            </tr>
                                                            <tr v-if="order.status == 0">
                                                                <td class="order-btns">
                                                                    <a :href="`charge-wallets/${order.id}/edit`" class="btn btn-default-fill">{{ __('master.Edit_Order') }} <i class="fas fa-arrow-alt-circle-right"></i></a>
                                                                    <a @click="CancelPayment(order.id)" class="btn btn-red-fill">{{ __('master.Cancel_Order') }} <i class="fas fa-arrow-alt-circle-right"></i></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-sm-12" v-if="show_section == 'create-orders'">
                                    <div class="col-sm-12 title-heading">
                                        <h3 class="section-heading">{{__('master.Charge_Your_Wallet') }}</h3>
                                        <p class="section-subheading">{{__('master.desc_charge_your_wallet')}}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p v-if="this.success" class="alert alert-success">
                                            {{ success }}
                                        </p>

                                        <ul v-if="Object.keys(this.errors).length != 0" class="alert alert-danger">
                                            <li v-for="error in this.errors" :key="error.index">{{ error[0] }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-12 cd-filter-block mb-0">
                                        <div class="form-contact cd-filter-content p-0 sec-bx">
                                            <form @submit.prevent="CreateOrderWithdraw()" method="POST">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <label><i class="fas fa-user-tie"></i></label>
                                                        <input id="name" type="text" v-model="field.value" :placeholder="__('master.value_charge')" required="">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group mt-4">
                                                            <textarea id="message" v-model="field.notice" class="form-control" rows="5" :placeholder="__('master.add_new_notice')"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" value="Submit" class="btn btn-default-yellow-fill mr-3 submit-order">{{ __('master.Submit_order') }}</button>
                                                    </div>

                                                    <div id="msgSubmit" class="col-md-12 mt-4">
                                                        <h3 class="c-pink"> Message Submitted!</h3>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    props:{
        ChargeOrders:{},
        currency:{
            type:String,
            default: "USD",
        }
    },
    data(){
        return {
            show_section:'show-orders',
            field:{},
            errors:{},
            success:null
        }
    },
    mounted() {
        console.log('hi mohamed');
        console.log(this.currency);
        console.log(this.WithdrawOrders);
    },
    methods:{
        CancelPayment:function(order_id){
            let self = this;
            this.axios.get(`update-charge-wallets-status/${order_id}/2`).then(function({data}){
                self.success = data.status;
                console.log(self.success);
            }).catch(function({response}){
                self.errors = response.data.errors;
                console.log(self.errors);
            });
        },
        CreateOrderWithdraw:function(){
            this.errors = {};
            let self = this;
            this.axios.post('charge-wallets',this.field).then(function({data}){
                self.success = data.status;
                self.field   = {};
                console.log(self.success);
            }).catch(function({response}){
                self.errors = response.data.errors;
                console.log(self.errors);
            });
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
</style>
