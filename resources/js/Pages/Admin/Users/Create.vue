<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users/Create</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <form @submit.prevent="submit">
              <div class="mt-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
              </div>
              <jet-input-error :message="errors.name" />
              <div class="mt-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="errors.email" />
              </div>

              <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input
                  id="password"
                  type="password"
                  class="mt-1 block w-full"
                  v-model="form.password"
                />
                <jet-input-error :message="errors.password" />
              </div>

              <div class="mt-4">
                <jet-label for="password_confirmation" value="Password Confirmation" />
                <jet-input
                  id="password_confirmation"
                  type="password"
                  class="mt-1 block w-full"
                  v-model="form.password_confirmation"
                />
              </div>

              <jet-button
                type="submit"
                class="mt-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >Submit</jet-button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetInputError from "@/Jetstream/InputError";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetButton from "@/Jetstream/Button.vue";

export default defineComponent({
  props: {
    errors: Object,
  },
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
    };
  },
  components: {
    AppLayout,
    Inertia,
    JetInputError,
    JetInput,
    JetLabel,
    JetButton,
  },
  methods: {
    submit() {
      Inertia.post(route("admin.users.store"), this.form);
    },
  },
});
</script>
