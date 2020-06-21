<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <invoice-filters
                @filtersUpdated="updateFilters"
        ></invoice-filters>
        <div class="shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full">
                <thead>
                <tr class="bg-gray-50 border-b">
<!--                    <th width="5%"></th>-->
                    <th v-for="header in headers"
                        class="px-6 pt-5 pb-3 border-b border-gray-200 text-left text-xs leading-4 font-medium
                            text-gray-600 uppercase tracking-wider">
                        <div class="inline-flex items-center hover:text-gray-900 text-base">{{ header }}</div>

                    </th>
                    <th width="5%"></th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <invoice-tab-line v-for="invoice in invoices"
                                  :key="invoice.id"
                                  :invoice="invoice"
                                  @delete="deleteInvoice"
                >
                </invoice-tab-line>
                </tbody>
            </table>

            <div class="px-6 pt-5 pb-3 bg-gray-50">
                <paginate
                        v-model="currentPage"
                        :pageCount="pageCount"
                        :clickHandler="getInvoices"
                        :prevText="'Précédent'"
                        :nextText="'Suivant'"
                        :containerClass="'flex flex-wrap justify-between pagination'"
                        :page-class="'page-item'"
                        :prev-class="'page-item'"
                        :next-class="'page-item'"
                        :page-link-class="'px-4 py-1 mr-1 mb-1 font-medium hover:bg-white'"
                        :prev-link-class="'px-4 py-1 mr-1 mb-1 font-medium hover:bg-white'"
                        :next-link-class="'px-4 py-1 mr-1 mb-1 font-medium hover:bg-white'"
                >
                </paginate>
            </div>


        </div>
    </div>

</template>

<script>
    export default {
        name: "InvoiceList",
        data() {
            return {
                'invoices': [],
                'currentPage': 1,
                'itemPerPage': 11,
                'pageCount': 0,
                'filters' : {},
                'baseUrl': '',
                'headers': ['Numéro', 'Nom et Prénom', 'Date', 'Total de la facture']
            }
        },
        methods: {
            getInvoices() {
                let params = Object.assign({}, this.filters,{
                    page: this.currentPage,
                    itemPerPage: this.itemPerPage
                });

                axios.get(this.baseUrl + '/api/invoices', { params: params })
                    .then(response => {
                        this.invoices = response.data.data
                        this.pageCount = response.data.last_page
                    })
            },
            deleteInvoice(id){
                //this.invoices = this.invoices.filter(item => item.id !== id)
                axios.delete(this.baseUrl  + '/api/invoices/' + id).then(response => {this.getInvoices()})
            },
            updateFilters(filters){
                this.filters = filters;
                this.currentPage= 1;
                this.getInvoices()
            }
        },
        created() {
            this.baseUrl = window.location.href.replace('facture', '');

        },
        mounted() {
            this.getInvoices();
        }
    }
</script>

<style scoped>

</style>