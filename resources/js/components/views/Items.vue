<template>
  <div>
    <div class="flex">
      <h2>Items</h2>
      <div>
        <b-button variant="outline-primary" @click="$bvModal.show('modal-1')">
          Add Consumption
        </b-button>
      </div>
    </div>
    <b-table :busy="isBusy" small hover :items="items" :fields="fields" responsive="sm">
      <template #table-busy>
        <div class="text-center text-danger my-2">
          <b-spinner class="align-middle"></b-spinner>
          <strong>Loading...</strong>
        </div>
      </template>
      <template #cell(alert)="data">
        <div class="bg-success" :class="{'bg-danger': data.item.current_stock < data.item.minimum_stock}" style="width: 20px; height: 20px; border-radius: 50%;"></div>
      </template>
    </b-table>
    <CreateModal :items="items" :show="show" @hidden="onHiddenModal"/>
  </div>
</template>

<script>
import CreateModal from './../CreateModal'
export default {
    name: 'Items',
    components: {
      CreateModal
    },
    data() {
        return {
          show: false,
          isBusy: false,
          fields: [ 'name', 'current_stock', 'minimum_stock', 'monthly_consumption', 'Alert'],
          items: []
        }
    },
    mounted() {
      this.getItems()
    },
    methods: {
      onHiddenModal() {
        this.getItems()
      },
      getItems() {
        this.isBusy = true
        this.axios.get('/api/items')
          .then(({data}) => {
              this.items = data.data
          })
          .finally(() => this.isBusy = false)
      }
    }
}
</script>

<style>

</style>