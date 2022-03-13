<template>
    <div class="col-md-12">
        <div class="wrap-blog">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="sec-normal pt-0">
                        <div class="sec-main sec-bg1">
                            <div class="row">
                                
                                <div class="model-alert-btn">
                                    <router-link :to="{path:'/wallets/send/requests'}" tag="button" class="btn btn-warning alert-model-payments">{{ __('master.send_Request') }} </router-link>
                                    <router-link :to="{path:'/wallets/'}" tag="button" class="btn btn-info alert-model-payments">{{__('master.recieved_Request') }}</router-link>
                                </div>
                                <router-view></router-view>
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
