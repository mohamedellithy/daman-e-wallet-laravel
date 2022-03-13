<template>
     <!-- ***** KNOWLEDGEBASE ***** -->
    <section class="config cd-main-content pb-80 blog sec-bg2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p v-if="this.success" class="alert alert-success">
                        <strong >{{ success }}</strong>
                    </p>
                    <p v-if="Object.keys(this.errors).length != 0" class="alert alert-danger">
                        <strong v-for="error in this.errors" :key="error.index">{{ error[0] }}</strong>
                    </p>
                </div>
                <div class="col-md-12 col-lg-8 mt-0">
                    <div class="wrap-blog">
                        <div class="row">
                            <a v-if="payment.payee_id == user.id" :href="edit_url" class="edit-payment">{{ __('master.Edit_Payment') }}</a>
                            <div class="col-md-12 col-lg-12">
                                <div class="wrapper targetDiv">
                                    <h3>{{ __('master.Payment_Details') }} #{{ payment.id }}</h3>
                                    <p>{{ __('master.Payment_Details_description')}}</p>
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-12 pt-4">
                                            <div class="cd-filter-block">
                                                <h4 class="mb-0 pb-0 ">{{__('master.Currency') }}</h4>
                                                <div class="cd-filter-content cd-filter-block">
                                                    <strong>{{ payment.currency }}</strong>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                        <div class="col-md-12 pt-4">
                                            <div class="cd-filter-block">
                                                <h4 class="mb-0 pb-0 ">{{ __('master.Payment_Value') }}</h4>
                                                <div class="cd-filter-content cd-filter-block">
                                                    <strong>{{ payment.value }}</strong>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                        <div class="col-md-12 pt-4">
                                            <div class="cd-filter-block">
                                                <h4 class="mb-0 pb-0 ">{{ __('master.Email_Payee') }}</h4>
                                                <div class="cd-filter-content cd-filter-block">
                                                    <strong>{{ payment.payer_id }}</strong>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                        <div class="col-md-12 pt-4">
                                            <div class="cd-filter-block">
                                                <h4 class="mb-0 pb-0 ">{{ __('master.Details_Order') }}</h4>
                                                <div class="cd-filter-content cd-filter-block" id="containers-orders">
                                                    <div class="col-md-12 form-container-inputs" v-for="item in payment.orders" :key="item.index">
                                                        <div class="col-md-12 input-details-order">
                                                            <label>{{__('master.item_name') }}</label>
                                                            <strong>{{ item.title }}</strong>
                                                        </div>

                                                        <div class="col-md-12 input-details-order">
                                                            <label>{{__('master.item_description')}}</label>
                                                            <strong>{{ item.description }}</strong>
                                                        </div>

                                                        <div class="col-md-4 input-details-order">
                                                            <label>{{__('master.item_quantity')}}</label>
                                                            <strong> {{ item.quantity }} </strong>
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
                </div>
                <!-- sidebar -->

                <div class="col-md-12 col-lg-4 container-aside">

                    <aside v-if="payment.payee_id == user.id" id="sidebar" class="sidebar mt-110 sec-bg1">
                        <form method="post" @submit.prevent="ChangePaymentStatus()">
                            <div class="cd-select mb-2">
                                <select v-model="field.status" class="select-filter" >
                                    <option v-for="status in payment_status" :key="status.index" :value="status.value" > {{ `${status.name}` }} </option>
                                </select>
                            </div>
                            <button class="btn btn-default-green-fill">{{ __('master.Save_Status') }} <i class="fas fa-arrow-alt-circle-right"></i></button>
                        </form>
                    </aside>
                    <br/>
                    <aside v-if="payment.payee_id == user.id" id="sidebar" class="sidebar mt-120 sec-bg1">
                        <div class="included c-grey mt-0">
                            <h4> {{__('master.Status_Payment')}} </h4>
                            <ul>
                                <li class="badge bg-pink mr-1">
                                    {{ payment.status_text || ''}}
                                </li>
                            </ul>
                        </div>
                        <hr/>

                        <div class="included c-grey mt-0">
                            <h4> {{ __('master.Share_Payment_Link') }} </h4>
                            <ul>
                                <li>
                                    <input id="copy-link-payment" class="link-payment-share" type="text" v-model="payment.payment_link"  readonly/>
                                </li>
                            </ul>
                        </div>

                        <button @click="CopyLinkPayment" class="btn btn-default-yellow-fill">{{__('master.Copy') }} <i class="fas fa-arrow-alt-circle-right"></i></button>
                    </aside>

                    <aside v-if="payment.payer_id == user.email && payment.status != 0" id="sidebar" class="sidebar mt-120 sec-bg1">
                        <div class="included c-grey mt-0">
                            <ul class="container-personal-info">
                                <li class="">
                                    <img class="img-person-user" src="https://www.pngkey.com/png/detail/115-1150152_default-profile-picture-avatar-png-green.png"/>
                                </li>
                                <li class="personal_payer_info">
                                    <h5>{{ this.payment.payee_name }}</h5>
                                </li>
                                <li class="">
                                    <h6>{{ this.payment.payer_id }}</h6>
                                </li>

                            </ul>
                            <h4> Status Payment </h4>
                            <ul>
                                <li class="badge bg-pink mr-1">
                                    {{ payment.status_text || ''}}
                                </li>
                            </ul>
                        </div>
                        <hr/>

                    </aside>

                    <aside v-if="payment.payee_id != user.id && payment.status == 0" id="sidebar" class="sidebar  sec-bg1">
                        <div class="included c-grey mt-0">
                            <ul class="container-personal-info">
                                <li class="">
                                    <img class="img-person-user" src="https://www.pngkey.com/png/detail/115-1150152_default-profile-picture-avatar-png-green.png"/>
                                </li>
                                <li class="personal_payer_info">
                                    <h5>mohamed Ellithy</h5>
                                </li>
                                <li class="">
                                    <h6>mohamed@gmail.com</h6>
                                </li>

                            </ul>
                        </div>
                        <hr/>
                        <form method="post" @submit.prevent="AcceptOrder">
                            <button type="submit" class="btn btn-default-yellow-fill">
                                 Accept Order <i class="fas fa-arrow-alt-circle-right"></i>
                            </button>
                        </form>
                        <br/>
                        <form method="post" @submit.prevent="RefuseOrder">
                            <button type="submit" class="btn btn-default-yellow-fill">
                                 Refuse Order <i class="fas fa-arrow-alt-circle-right"></i>
                            </button>
                        </form>
                    </aside>


                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log(this.user);
        },
        props: {
            payment:{
                type:Object,
                default:function(){
                    return {};
                }
            },
            PayerAction:{
                type:Number,
                default:0
            },
            edit_url:{
                type:String,
                default:'#'
            },
            user:{
                type:Object,
                default:function(){
                    return {};
                }
            }

        },
        data:function(){
            return {
                payment_status:{
                    cancel:{
                        name:'Canceled Payment',
                        value:2
                    },
                    active:{
                        name:'Activate Payment',
                        value:0
                    }
                },
                field:{
                    status:this.payment.status
                },
                success:null,
                errors:[]
            }
        },
        created(){
            console.log(this.payment);
        },
        methods:{
            CopyLinkPayment:function(){
                document.querySelector('#copy-link-payment').select();
                document.execCommand('copy')
            },
            ChangePaymentStatus:function(){
                let self = this;
                this.axios.get(`update-payment-status/${this.payment.id}/${this.field.status}`).then(function({data}){
                    console.log(data);
                    self.payment.status_text = data.order.status_text;
                    console.log(self.payment.status_text);
                    self.success = data.status;
                });
            },
            AcceptOrder:function(){
                let self = this;
                if(this.user.length ==0){
                    window.location.href="/login";
                }else{
                    axios.post(`accept-payment-order/${this.payment.id}`).then(function({data}){
                       self.success = data.status;
                    }).catch(function({response}){
                       self.errors.push([response.data.status]);
                    });
                }
            },
            RefuseOrder:function(){
                if(this.user.length ==0){
                    window.location.href="/login";
                }else{
                    axios.post(`accept-payment-order/${this.payment.id}`).then(function({data}){
                        self.success = data.status;
                    }).catch(function({response}){
                        self.errors.push([response.data.status]);
                    });
                }
            }
        }
    }
</script>
<style scoped>
   strong {
        color: #118317;
        padding: 10px 24px;
        line-height: 2em;
        font-weight: 200;
   }
   .form-container-inputs {
        background-color: #ffffff;
        padding: 2px;
        margin-top: 10px;
        border-bottom: 2px solid #eee;
   }
   .cd-filter-block{
        margin-bottom: 1em;
   }
   .included ul li input {
        list-style: none;
        background-color: #f6f2f2a1;
        padding: 20px;
        border: 2px dashed #9f8c8c;
        width: 100%;
   }
   .container-aside{
       padding-top:20px;
   }
   .select-filter
   {
        background-color: #e2e2e2;
        width: 100%;
        height: 45px;
        border: 2px solid #ffffff;
        border-radius: 7px;
   }
   .edit-payment{
        position: absolute;
        z-index: 1000;
        left: 28px;
        padding: 8px 19px;
        background-color: #4587bc;
        color: white;
        border-radius: 45px;
        margin-top: 15px;
   }
   .config.cd-main-content {
        margin-top: 100px;
   }
   ul.container-personal-info{
       text-align: center !important;
   }
   ul li.personal_payer_info{
        color: orange;
        text-transform: capitalize;
   }
   ul li .img-person-user{
       width: 100px;
       border-radius: 60px;
   }

</style>
