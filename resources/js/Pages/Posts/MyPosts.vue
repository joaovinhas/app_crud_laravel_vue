<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const page = usePage();

const posts = ref([]);
const showSuccess = ref(false);
const showError = ref(false);
const successMessage = ref('');
const errorMessage = ref('');

// Fechar notificações
function closeSuccess() {
    showSuccess.value = false;
    successMessage.value = '';
}

function closeError() {
    showError.value = false;
    errorMessage.value = '';
}

// Init data
onMounted(() => {

    if(page.props.posts){
        posts.value = page.props.posts;
    }

    // Config flash messages
    if(page.props.flash.success) {
        showSuccess.value = true;
        successMessage.value = page.props.flash.success;
        
        setTimeout(() => {
            closeSuccess();
        }, 5000);
    }

    if(page.props.flash.error) {
        showError.value = true;
        errorMessage.value = page.props.flash.error;

        setTimeout(() => {
            closeError();
        }, 5000);
    }
});
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
                    <!-- Mensagem de Sucesso com botão fechar -->
                    <div v-if="showSuccess" class="mb-4 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 rounded flex justify-between items-center">
                        <span>{{ successMessage }}</span>
                        <button @click="closeSuccess" class="text-green-700 dark:text-green-300 hover:text-green-900 dark:hover:text-green-100 ml-4">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Mensagem de Erro com botão fechar -->
                    <div v-if="showError" class="mb-4 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-300 rounded flex justify-between items-center">
                        <span>{{ errorMessage }}</span>
                        <button @click="closeError" class="text-red-700 dark:text-red-300 hover:text-red-900 dark:hover:text-red-100 ml-4">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="p-6">
                        <!-- Use o componente Link do Inertia -->
                        <Link 
                            :href="route('create_post')" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded"
                        >
                            Add Post
                        </Link>
                    </div>
                    <div class="p-6">
                        <h3>My Posts Here:</h3>
                    </div>
                    <div v-if="posts.length > 0" class="p-6">
                        <div v-for="post in posts" :key="post.id">
                            <p>{{ post.title }}</p>
                        </div>
                    </div>
                    <div v-else class="text-center py-8">
                        No posts found!
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>