<template>
    <div class="mb-6 grid grid-cols-3 gap-8">
        <div>
            <label for="numero" class="block text-sm leading-5 font-medium text-gray-700">Numéro
            </label>
            <input id="numero"
                   class="form-input block w-full sm:text-sm sm:leading-5"
                   v-model="numero"
                   @change="$emit('filtersUpdated', getFilters())"/>
        </div>

    </div>
</template>

<script>
    export default {
        name: "InvoiceFilters",
        data(){
            return {
                numero : ''
            }
        },
        methods:{
            getFilters(){
                return {
                    numero : this.numero
                }
            }
        }
    }
</script>

<style scoped>

</style>