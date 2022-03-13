import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import ShowPaymentsInWallet from '../components/ShowPaymentsInWallet.vue';
import ShowRecievedRequestOrders from '../components/ShowRecievedRequestOrders.vue';
import ShowSendRequestOrders from '../components/ShowSendRequestOrders.vue';

import TicketsSupportTemplate from '../components/TicketsSupportTemplate.vue';
import ShowTicketsSupport from '../components/ShowTicketsSupport.vue';
import CreateTicketsSupport from '../components/CreateTicketsSupport.vue';

import ShowSingleTicketSupport from '../components/ShowSingleTicketSupport.vue';


const routes = [{
        path: '/wallets',
        name: 'payment-wallet',
        component: ShowPaymentsInWallet,
        children: [{
                path: '/',
                name: 'recieve-request',
                component: ShowRecievedRequestOrders
            },
            {
                path: 'send/requests',
                name: 'send-request',
                component: ShowSendRequestOrders
            }
        ]
    },
    {
        path: '/tickets',
        name: 'tickets',
        component: TicketsSupportTemplate,
        children: [{
                path: '/',
                name: 'show-tickets',
                component: ShowTicketsSupport
            },
            {
                path: 'create',
                name: 'create-titckets',
                component: CreateTicketsSupport
            },
            {
                path: ':id/show',
                name: 'show-titcket',
                component: ShowSingleTicketSupport
            }
        ]
    }
];

const router = new VueRouter({
    mode: 'history',
    routes,
    base: '/',
});


export default router;