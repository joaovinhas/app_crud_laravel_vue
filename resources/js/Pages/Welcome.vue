<script setup>
import { Head, Link } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Welcome" />

  <div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="max-w-md w-full bg-white shadow-md rounded-lg p-8">
      <h1 class="text-2xl font-bold text-gray-800 mb-4">
        Laravel + Inertia + Vue
      </h1>

      <p class="text-gray-600 mb-6">
        Projeto base pronto para CRUD simples.
      </p>

      <div class="flex gap-3">
        <Link
          href="/login"
          class="flex-1 text-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition"
        >
          Login
        </Link>

        <Link
          href="/register"
          class="flex-1 text-center border border-gray-300 text-gray-700 hover:bg-gray-100 font-medium py-2 px-4 rounded-md transition"
        >
          Registrar
        </Link>
      </div>
    </div>
  </div>
</template>
