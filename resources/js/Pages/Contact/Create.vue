<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';

const initialValues = {
    name: '',
    phone: '',
    avatar: null,
    privacity: ""

}

const form = useForm(initialValues)

</script>

<template>

    <Head title="Contactos" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Crear Contactos
                </h2>
                <Link :href="route('contact.index')">
                Lista de Contactos
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-center overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <form class="w-1/3 py-5 space-y-3" action="" method="POST">
                        <div>
                            <InputLabel for="name" value="Nombre" />

                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" 
                                autofocus autocomplete="name" aria-placeholder="neicer ruiz" />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div>
                            <InputLabel for="phone" value="Telefono" />

                            <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone"
                                 aria-placeholder="+57 123 456 789" />

                            <InputError class="mt-2" :message="form.errors.phone" />
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
