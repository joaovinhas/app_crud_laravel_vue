<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="My Posts" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                My Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <!-- Use o componente Link do Inertia -->
                        <Link 
                            :href="route('create_post')" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded"
                        >
                            Add Post
                        </Link>
                    </div>
                    <div class="p-6 text-gray-900">
                        My Posts Content Here
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>