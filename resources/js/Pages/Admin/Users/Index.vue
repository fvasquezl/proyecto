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
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  props: ["users"],

  components: {
    AppLayout,
    Link,
  },
});
</script>
