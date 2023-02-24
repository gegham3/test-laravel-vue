<template>
  <b-modal id="modal-1" title="Add Consumption" @ok="onSubmit" @hidden="onHidden">
    <!-- <b-form-group id="input-group-3" label="Item:" label-for="input-3"> -->
      <b-form-select
        class="w-100"
        v-model="form.itemId"
        :options="options"
      ></b-form-select>
    <!-- </b-form-group> -->
    <b-form @submit="onSubmit" v-if="form.itemId">
      <b-form-group
        id="input-group-1"
        label="Items entered:"
        label-for="input-1"
      >
        <b-form-input
          type="number"
          id="input-1"
          v-model="form.entered"
          placeholder="Enter count"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Items left:" label-for="input-2">
        <b-form-input
          type="number"
          id="input-2"
          v-model="form.left"
          placeholder="Enter count"
          required
        ></b-form-input>
      </b-form-group>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
  </b-modal>
</template>
<script>
export default {
  props: {
    items: {
      type: Array,
      required: true
    },

  },
  data() {
    return {
      form: {
        left: 0,
        entered: 0,
        itemId: null,
      },
    };
  },
  computed:{
    options() {
      return this.items.map(item => ({value: item.id, text: item.name}))
    }
  },
  methods: {
    onSubmit(event) {
      event.preventDefault();
      this.axios.put('/api/items/' + this.form.itemId, this.form).then(() => {
        this.$bvModal.hide('modal-1')
      })
    },
    onHidden() {
      this.form = {
        left: 0,
        entered: 0,
        itemId: null,
      }
      this.$emit('hidden')
    }
  },
};
</script>
