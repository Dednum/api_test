<template>
  <q-page class=" ">
    <template v-if="allloaded">
      <q-form @submit="reqFromBackend(num1, num2)" class="q-gutter-md">
        <q-input square outlined v-model="num1" label="Value1" />
        <q-input square outlined v-model="num2" label="Value2" />
        <div>
          <q-btn label="Submit" type="submit" color="primary" />
        </div>
      </q-form>
    </template>
    <template v-else>
      <div>{{ loaded }}</div>
    </template>

    <br />
    <p v-if="result">result is {{ result }}</p>
  </q-page>
</template>

<script>
import { defineComponent } from "vue";
import axios from "axios";
export default defineComponent({
  name: "IndexPage",
  data() {
    return {
      num1: 5,
      num2: 10,
      result: null,
      loaded: {
        "function A": true,
        "function B": true,
        "function C": true,
      },
    };
  },
  computed: {
    allloaded() {
      return Object.values(this.loaded).every((value) => value);
    },
  },
  methods: {
    async fn1(val1, val2, sleep, name) {
      axios
        .post("http://localhost/add.php", {
          num1: val1,
          num2: val2,
          sleep: sleep,
        })
        .then((res) => {
          this.result = res.data.result;
          this.loaded[name] = true;
        });
    },
    async reqFromBackend(val1, val2) {
     
      Object.keys(this.loaded).forEach((name) => (this.loaded[name] = false));

      this.fn1(val1, val2, 5, "function A");
      this.fn1(val1, val2, 2, "function B");
      this.fn1(val1, val2, 1, "function C");
      // this.result = res.data.result;
    },
  },
});
</script>
