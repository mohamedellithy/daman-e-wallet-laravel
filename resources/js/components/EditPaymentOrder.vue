<template>
     <!-- ***** KNOWLEDGEBASE ***** -->
    <section class="config cd-main-content pb-80 blog sec-bg2 motpath">
        <form method="post" @submit.prevent="CreatePaymentOrder">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mt-80">
                        <div class="wrap-blog">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <p v-if="this.success" class="alert alert-success">
                                        <strong >{{ success }}</strong>
                                    </p>

                                    <p v-if="Object.keys(this.errors).length != 0" class="alert alert-danger">
                                        <strong v-for="error in this.errors" :key="error.index">{{ error[0] }}</strong>
                                    </p>
                                </div>

                                <div class="col-md-12 col-lg-12">
                                    <div class="wrapper targetDiv">
                                        <h3>{{ __('master.edit_payment')}} #{{ this.payment.id }}</h3>
                                        <p>{{ __('master.edit_payment_description')}}</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 pt-4">
                                                <div class="cd-filter-block">
                                                    <h4 class="mb-0 pb-0 ">{{__('master.Currency') }}</h4>
                                                    <br/>
                                                    <div class="cd-filter-content cd-filter-block">
                                                        <div class="cd-select mb-2">
                                                            <select class="select-filter" v-model="field.currency">
                                                                <option v-for="currency in Currencies" :key="currency.index" :value="currency.currency" :selected="field.currency == currency.currency"> {{ `${currency.currency} ( ${currency.name_ar} )` }} </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>


                                            <div class="col-md-12 pt-4">
                                                <div class="cd-filter-block">
                                                    <h4 class="mb-0 pb-0 ">{{__('master.Payment_Value') }}</h4>
                                                    <div class="cd-filter-content cd-filter-block">
                                                        <label><i class="fas fa-globe"></i></label>
                                                        <input type="text" v-model="field.value" placeholder="100">
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>


                                            <div class="col-md-12 pt-4">
                                                <div class="cd-filter-block">
                                                    <h4 class="mb-0 pb-0 ">{{__('master.Email_Payee') }}</h4>
                                                    <div class="cd-filter-content cd-filter-block">
                                                        <label><i class="fas fa-globe"></i></label>
                                                        <input type="text" v-model="field.payer_id" value="" placeholder="Email Payee">
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>

                                            <div class="col-md-12 pt-4">
                                                <div class="cd-filter-block">
                                                    <h4 class="mb-0 pb-0 ">{{ __('master.Details_Order') }}</h4>
                                                    <div class="cd-filter-content cd-filter-block" id="containers-orders">
                                                        <i class="fas fa-clone btn-clone" @click="btnClone"></i>
                                                        <br/>
                                                        <div class="col-md-12 form-container-inputs" v-for="item in field.orders" :key="item.index">
                                                            <div class="col-md-5 input-details-order">
                                                                <label>{{__('master.item_name')}}</label>
                                                                <input type="text" v-model="item.title" placeholder="100">
                                                            </div>

                                                            <div class="col-md-5 input-details-order">
                                                                <label>{{__('master.item_description') }}</label>
                                                                <textarea class="form-control" v-model="item.description" placeholder="100"></textarea>
                                                            </div>

                                                            <div class="col-md-5 input-details-order">
                                                                <label>{{__('master.item_quantity') }}</label>
                                                                <input type="text" v-model="item.quantity" placeholder="100">
                                                            </div>
                                                            <i class="fas fa-trash-alt btn-delete" @click="btnDelete(item)"></i>
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
                    <!-- sidebar -->
                    <div class="col-md-12 col-lg-4">
                        <aside id="sidebar" class="sidebar mt-120 sec-bg1">
                            <div class="included c-grey mt-0">
                                <h4> {{__('master.Payments_Details') }} </h4>
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> {{ field.currency }}</li>
                                </ul>
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> {{ field.value }}</li>
                                </ul>
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> {{ field.payer_id }}</li>
                                </ul>
                            </div>
                            <div class="ordersummary">
                                <h4>{{ __('master.Order_Summary') }}</h4>
                                <div class="table-responsive-lg">
                                    <table class="table">
                                        <tbody>
                                            <tr v-for="item in field.orders" :key="item.index">
                                                <td>
                                                    <div class="title-table">{{ item.title }}</div>
                                                </td>
                                                <td> {{ item.quantity }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default-yellow-fill">{{__('master.Edit_save') }} <i class="fas fa-arrow-alt-circle-right"></i></button>
                        </aside>
                    </div>
                </div>
            </div>
        </form>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            Currencies:{},
            payment:{
                id:null,
                currency:'EG',
                value:0,
                payer_id:'develomohamed22@gmail.com',
                orders:[{
                   id:null,
                   title:'order #1',
                   description:'order details #1',
                   quantity:2
                }]
            }
        },
        data(){
            return {
                field:this.payment,
                errors:{},
                success:null
            }
        },
        methods:{
            btnClone:function(){
                let Nu_Item = (Number(this.field.orders.length) + 1);
                this.field.orders.push({
                    id:null,
                    title:'order #'+Nu_Item,
                    description:'order details #'+Nu_Item,
                    quantity:1
                });
            },
            btnDelete:function(item){
                let Nu_Item = this.field.orders.indexOf(item);
                this.field.orders.splice(Nu_Item, 1);
            },
            CreatePaymentOrder:function(){
                this.errors = {};
                let self = this;
                this.axios.put('payments/'+this.field.id,this.field).then(function({data}){
                    self.field = data.payment;
                    self.success = data.status;
                    console.log(data.payment);
                }).catch(function({response}){
                    //self.errors = response.data.errors;
                    console.log(data);
                });
            }
        }
    }
</script>
