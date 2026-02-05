<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Create a Post" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create a Post Here
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form class="w-full">
                          <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Title Post
                              </label>
                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-title-post" type="text" placeholder="Title post">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                States
                              </label>
                              <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                  <option>Public</option>
                                  <option>Private</option>
                              </select>
                            </div>
                          </div>
                          <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                Text
                              </label>
                              <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded p3-10 px-4 mb-3 h-60 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-text" placeholder="Text from post"></textarea>
                            </div>
                          </div>
                          <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                Reference Links
                              </label>
                              <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded p3-10 px-4 mb-3 h-20 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-text" placeholder="Reference Links"></textarea>
                            </div>
                          </div>
                          <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <button :href="route('create_post')" type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">
                                  Register
                                </button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>