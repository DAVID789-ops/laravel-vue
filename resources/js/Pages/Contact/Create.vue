<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import Fileinput from '@/Components/Fileinput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
const initialValues = {
    name: '',
    phone: '',
    avatar: null,
    privacity: "privado"

}

const form = useForm(initialValues)
const onSelectAvatar = (e) => {

    const files = e.target.files;
    if (files.length > 0) {
        form.avatar = files[0];
    }

}
const submit = () => {
    form.post(route('contact.store'))


}
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
                    <form class="w-1/3 py-5 space-y-3" @submit.prevent="submit"  >
                        <div>
                            <InputLabel for="name" value="Nombre" />

                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                                autofocus autocomplete="name" placeholder="neicer ruiz" />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>
                        <div>
                            <InputLabel for="phone" value="Telefono" />

                            <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone"
                                 placeholder="+57 123 456 789" />

                            <InputError class="mt-2" :message="form.errors.phone" />
                        </div>
                        <div>
                            <InputLabel for="avatar" value="Avatar"/>

                                <Fileinput name="avatar" @change="onSelectAvatar"/>

                            <InputError class="mt-2" :message="form.errors.avatar" />
                        </div>
                        <div>
                            <InputLabel for="privacity" value="Privacidad" />

                                <select name="privacity" v-model="form.privacity" id="privacity" class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                >
                                    <option value="publico">Publico</option>
                                    <option value="privado">Privado</option>
                                </select>

                            <InputError class="mt-2" :message="form.errors.privacity" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton>Guardar</PrimaryButton>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
