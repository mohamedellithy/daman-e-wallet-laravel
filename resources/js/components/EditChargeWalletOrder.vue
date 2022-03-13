<template>
    <div class="col-md-12">
        <div class="wrap-blog">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="sec-normal pt-0">
                        <div class="sec-main sec-bg1">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="col-sm-12 title-heading">
                                        <h3 class="section-heading">Update order charge wallet</h3>
                                        <p class="section-subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
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
                                            <form @submit.prevent="UpdateOrderWithdraw()" method="POST">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <label><i class="fas fa-user-tie"></i></label>
                                                        <input id="name" type="text" v-model="field.value" placeholder="value withdraw" required="">
                                                    </div>

                                                    

                                                    <div class="col-md-12">
                                                        <div class="form-group mt-4">
                                                            <textarea id="message" v-model="field.notice" class="form-control" rows="5" placeholder="add new notice"></textarea>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-md-12 text-right">
                                                        <a :href="`/withdraws`" class="mr-3 back-to-order">back to orders</a>
                                                        <button type="submit" value="Submit" class="btn btn-default-yellow-fill mr-3 submit-order">update order</button>
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
        ChargeWalletOrder:{},
        Currency:'USD'
    },
    data(){
        return {
            show_section:'show-orders',
            field:this.ChargeWalletOrder,
            errors:{},
            success:null
        }
    },
    mounted() {
        console.log(this.ChargeWalletOrder);
    },
    methods:{
        UpdateOrderWithdraw:function(){
            this.errors = {};
            this.success =null;
            let self = this;
            this.axios.put(`charge-wallets/${this.field.id}`,this.field).then(function({data}){
                self.success = data.status;
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
.back-to-order{
    color:orange !important
}
</style>
