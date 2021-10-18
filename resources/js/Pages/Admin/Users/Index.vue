<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <Link
              :href="route('admin.users.create')"
              class="text-sm text-gray-700 underline"
            >create User</Link>

            <table class="table-auto w-full">
              <thead>
                <tr>
                  <th class="p-3">Id</th>
                  <th class="p-3">Name</th>
                  <th class="p-3">Email</th>
                  <th class="p-3">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="user in users" :key="user.id">
                  <td>{{user.id}}</td>
                  <td>{{user.name}}</td>
                  <td>{{user.email}}</td>
                  <td>
                    <Link
                      :href="route('admin.users.show',{employee: user})"
                      class="text-sm text-gray-700 underline"
                    >Show</Link>
                    <Link
                      :href="route('admin.users.edit',{employee: user})"
                      class="text-sm text-gray-700 underline"
                    >Edit</Link>

                    <!-- <Link
                      method="DELETE"
                      :href="route('admin.users.destroy',{employee: user})"
                      class="text-sm text-gray-700 underline"
                    >Destroy</Link>-->

                    <button @click="modalOpen=true;">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <Jet-dialog-modal :show="modalOpen">
      <template v-slot:title>
        <h1>Delete User</h1>
      </template>
      <template v-slot:content>
        <p v-if="selectedUser">
          are you sure to delete user:
          <strong>{{selectedUser.email}}</strong>?
        </p>
      </template>
      <template v-slot:footer>
        <jet-button class="float-left bg-red-500 hover:bg-red-800" @click="deleteUser()">Delete</jet-button>

        <jet-button @click="modalOpen=false;selectedUser=user">Close</jet-button>
      </template>
    </Jet-dialog-modal>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetDialogModal from "@/Jetstream/DialogModal.vue";

export default defineComponent({
  props: ["users"],
  data() {
    return {
      modalOpen: false,
      selectedUser: Object,
    };
  },

  components: {
    Link,
    JetButton,
    AppLayout,
    JetDialogModal,
  },
  methods: {
    deleteUser: function () {
      //   if (!confirm("are you sure?" + data.email)) return;

      Inertia.delete(
        route("admin.users.destroy", { employee: this.selectedUser })
      );
      this.modalOpen = false;
    },
  },
});
</script>
