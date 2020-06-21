<template>
    <tr :class="{ 'bg-yellow-200' : invoice.total < 100 }">
<!--        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">-->
<!--            <input type="checkbox" aria-label="Checkbox for following text input">-->
<!--        </td>-->
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ invoice.numero }}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ invoice.name }}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ invoice.dateFr }}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ invoice.total }}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ invoice.status }}</td>
    </tr>
</template>

<script>
    export default {
        name: "InvoiceLine",
        props:{
            invoice: {}
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>