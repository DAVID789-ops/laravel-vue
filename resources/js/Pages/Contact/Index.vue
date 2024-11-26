
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const contacts = page.props.contacts;
</script>

<style>
/* Estilos generales para la tabla */
.table-auto {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Estilo para los encabezados */
.table-auto thead {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    text-align: left;
}

/* Estilo para las celdas */
.table-auto th,
.table-auto td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: center;
}

/* Efecto hover para las filas */
.table-auto tbody tr:hover {
    background-color: #f1f1f1;
}

/* Estilo para las filas impares */
.table-auto tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

/* Estilo para las filas pares */
.table-auto tbody tr:nth-child(even) {
    background-color: #fafafa;
}

/* Estilo para las celdas de imágenes */
.table-auto img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

/* Estilo para los botones de acciones */
.table-auto td a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.table-auto td a:hover {
    color: #45a049;
}

/* Responsive: para pantallas pequeñas */
@media (max-width: 768px) {
    .table-auto {
        font-size: 14px;
    }

    .table-auto th,
    .table-auto td {
        padding: 8px;
    }
}

</style>
<template>
    <Head title="Contactos" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2
                    class="text-xl font-semibold leading-tight text-gray-800">
                    Contactos
                </h2>
                <Link :href="route('contact.create')">
                    CREAR Contactos
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                    <table class="table-auto w-full border-collapse border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th class="border px-4 py-2">Nombres</th>
            <th class="border px-4 py-2">Visibilidad</th>
            <th class="border px-4 py-2">Avatar</th>
            <th class="border px-4 py-2">Teléfono</th>
            <th class="border px-4 py-2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="contact in contacts" :key="contact.id">
            <!-- Nombre -->
            <td class="border px-4 py-2">{{ contact.name }}</td>

            <!-- Visibilidad -->
            <td class="border px-4 py-2">{{ contact.privacity}}</td>

            <!-- Avatar -->
            <td class="border px-4 py-2">
                <img :src="'/storage/' + contact.avatar" alt="Avatar" class="w-10 h-16 rounded-full">
            </td>

            <!-- Teléfono -->
            <td class="border px-4 py-2">{{ contact.phone || 'No disponible' }}</td>

            <!-- Acciones -->
            <td class="border px-4 py-2">
                <div>
                    <Link :href="route( 'contact.edit', contact)">
                        Editar
                    </Link>

                </div>
             </td>
        </tr>
    </tbody>
</table>




                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
