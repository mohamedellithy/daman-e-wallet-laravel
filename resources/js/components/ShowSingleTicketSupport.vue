<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="col-md-12 col-lg-12 cd-filter-block mb-0">
                    <div class="col-md-12">
                        <p v-if="this.success" class="alert alert-success">
                            {{ success }}
                        </p>

                        <ul v-if="Object.keys(this.errors).length != 0" class="alert alert-danger">
                            <li v-for="error in this.errors" :key="error.index">{{ error[0] }}</li>
                        </ul>
                    </div>
                    <div class="form-contact cd-filter-content p-0 sec-bx">
                        <form @submit.prevent="ReplayTicketSupport()" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label><i class="fas fa-user-tie"></i></label>
                                    <input id="name" type="text" v-model="field.title"  :placeholder="__('master.Ticket_Title_Complaint')" required="">
                                </div>

                                <div class="col-md-6">
                                    <label><i class="fas fa-envelope"></i></label>
                                    <input id="email" type="email" v-model="field.email"  :placeholder="__('master.Your_Email')" required="">
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <textarea id="message" v-model="field.ticket" class="form-control" rows="5" :placeholder="__('master.Description_of_Complaint')"></textarea>
                                    </div>
                                </div>


                                <div class="col-md-12 text-right">
                                    <button type="submit" value="Submit" class="btn btn-default-yellow-fill mr-3 submit-order">{{ __('master.add_replay') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <hr/>
                <ul class="tickets">
                    <li class="list-ticket" v-for="ticket in tickets" :key="ticket.index">
                        <h5 class="title-ticket">{{ ticket.title }}</h5>
                        <p class="email-ticket">{{ ticket.email }}</p>
                        <label class="date-ticket">{{ ticket.created_at }}</label>
                        <label class="ticket-status"> {{ ticket.status_text }}</label>
                        <p class="ticket-text">
                            {{ ticket.ticket }}
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="order-payment">
                    <ul class="payments-details">
                        <li class="list-order-list"><h4>{{ __('master.Payments_Details') }}</h4></li>
                        <li class="list-order-list"><label>{{ __('master.Payer') }} </label>   :{{payment.payer_id}}</li>
                        <li class="list-order-list"><label>{{ __('master.Payee') }} </label>    :{{payment.payee_email}}</li>
                        <li class="list-order-list"><label>{{__('master.Amount') }} </label>   :{{payment.value}} {{ payment.currency }}</li>
                        <li class="list-order-list"><label>{{ __('master.order_status') }} </label>   :{{payment.status_text}}</li>
                        <li class="list-order-list"><label>{{ __('master.date') }} </label>     :{{payment.created_at}}</li>
                        <li class="list-order-list"><a :href="`/payments/${payment.id}`" class="payments-id"> {{ __('master.Other_Details') }} </a></li>
                    </ul>
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
                tickets:{},
                payment:{},
                errors:{},
                success:null
            }
        },
        created() {
            let self = this;
            this.axios.get(`support-tickets/${this.$route.params.id}`).then(function({data}){
                self.tickets = data.tickets;
                self.payment= data.tickets[0].payments;
                //console.log(data.tickets[0].payments);
            }).catch(function({response}){
                console.log(response);
            });
        },
        methods:{
            ReplayTicketSupport:function(){
                this.errors = {};
                let self = this;
                this.field.ticket_id = this.$route.params.id;
                this.field.payment   = this.payment.id;
                this.axios.post('support-tickets',this.field).then(function({data}){
                    self.success = data.status;
                    self.tickets.push(data.ticket);
                    self.field   = {};
                    console.log(data);
                }).catch(function({response}){
                    self.errors = response.data.errors;
                    console.log(self.errors);
                });
            }
        }
    }
</script>

<style type="text/css" scoped>
ul.tickets{
    padding: 20px !important;
}
ul.tickets .list-ticket
{
    text-align: right;
    border-bottom: 1px solid #c0b9b9;
    padding: 20px;
}
ul.tickets .list-ticket .ticket-text{
    font-size: 14px;
    text-align: justify;
}

.order-payment{
    padding: 60px 0px !important;
    text-align: right;
    height: 100%;
}
.order-payment .payments-details{
    border-right: 2px solid #eee;
    height: 100%;
}
.payments-details .list-order-list{
    padding: 12px;
    font-size: 13px;
    border-bottom: 3px solid #eee;
}
.list-order-list h4
{
    font-size: 17px;
    font-weight: 600;
    color: #199619;
}
.date-ticket{
    font-size: 13px;
    color: #1565c0;
    font-weight: 600;
    padding: 1px 1px;
    width: 30% !important;
}
.ticket-status{
    background-color: #1976d2;
    padding: 5px 18px !important;

    color: white;
    font-size: 12px;
}
.ticket-status-admin{
    background-color: #c2185b;
}
.email-ticket{
    font-size: 13px;
}
.payments-id{
    background-color: #00838f;
    padding: 10px;
    color: white;
}
.list-order-list label{
    font-size: 12px;
    font-weight: bold;
}
</style>
