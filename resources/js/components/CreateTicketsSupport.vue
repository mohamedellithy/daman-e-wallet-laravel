<template>
    <div class="col-sm-12" >
        <div class="col-sm-12 title-heading">
            <h3 class="section-heading">{{ __('master.Create_Ticket')}}</h3>
            <p class="section-subheading">{{ __('master.tickect_create_description') }}</p>
        </div>
        <div class="col-md-12">
            <p v-if="this.success" class="alert alert-success">

                <router-link :to="{path:`tickets/${ticket.id}/show`}" tag="label">
                   {{__('master.open_Ticket')}}
                </router-link>
                 {{ success }}
            </p>

            <ul v-if="Object.keys(this.errors).length != 0" class="alert alert-danger">
                <li v-for="error in this.errors" :key="error.index">{{ error[0] }}</li>
            </ul>
        </div>
        <div class="col-md-12 col-lg-12 cd-filter-block mb-0">
            <div class="form-contact cd-filter-content p-0 sec-bx">
                <form @submit.prevent="CreateTicketSupport()" method="POST">
                    <div class="row">

                        <div class="col-md-6">
                            <label><i class="fas fa-user-tie"></i></label>
                            <input id="name" type="text" v-model="field.title" :placeholder="__('master.Ticket_Title_Complaint')" required="">
                        </div>

                        <div class="col-md-6">
                            <div class="cd-select mt-4">
                                <label class="db"></label>
                                <select id="department" v-model="field.payment" class="select-filter">
                                    <option>{{ __('master.Choice_Order_Payment') }} </option>
                                    <option  v-for="payment in payments" :value="payment" :key="payment.index">{{ __('master.payment_number') }} #{{ payment }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <textarea id="message" v-model="field.ticket" class="form-control" rows="5" :placeholder="__('master.Description_of_Complaint')"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label><i class="fas fa-envelope"></i></label>
                            <input id="email" type="email" v-model="field.email" :placeholder="__('master.Your_Email')" required="">
                        </div>

                        <div class="col-md-12 text-right">
                            <button type="submit" value="Submit" class="btn btn-default-yellow-fill mr-3 submit-order">{{ __('master.Submit_Ticket') }}</button>
                        </div>

                        <div id="msgSubmit" class="col-md-12 mt-4">
                            <h3 class="c-pink">{{ __('master.Message_Submitted!') }}</h3>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return{
           field:{},
           errors:{},
           payments:{},
           ticket:{},
           success:null
        }
    },
    created(){
        let self = this;
        this.axios.get('ticket-support/payments/all').then(function ({data}){
            self.payments = data.payments_id;
            self.field.email = data.email;
            console.log(self.payments);
        }).catch(function({response}){
            console.log(response);
        });
    },
    methods:{
        CreateTicketSupport:function(){
            this.errors = {};
            let self = this;
            this.axios.post('support-tickets',this.field).then(function({data}){
                self.success = data.status;
                self.ticket = data.ticket;
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
