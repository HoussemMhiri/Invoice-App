import { createRouter, createWebHistory } from "vue-router";

import invoiceIndex from "../components/invoices/Index.vue";
import NotFound from "../components/NotFound.vue";
import NewInvoice from "@/components/invoices/NewInvoice.vue";
import InvoiceShow from "@/components/invoices/Show.vue";
import InvoiceEdit from "@/components/invoices/Edit.vue";

const routes = [
    {
        path: "/",
        name: "invoiceIndex",
        component: invoiceIndex,
    },
    {
        path: "/:pathMatch(.*)*",
        component: NotFound,
    },
    {
        path: "/invoice/new",
        component: NewInvoice,
    },
    {
        path: "/invoice/show/:id",
        component: InvoiceShow,
        props: true,
    },
    {
        path: "/invoice/edit/:id",
        component: InvoiceEdit,
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
