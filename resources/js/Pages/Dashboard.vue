<template>
    <input v-model="form.text" type="text">
    <button @click="submit">Print</button>
    <iframe :src="stream" frameborder="0" width="100%" height="600px"></iframe>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
export default {
    layout: AuthenticatedLayout,
    data() {
        return {
            stream: null,
            form: useForm({
                text: '',
                id: this.$page.props.auth.user.id
            }),

        }
    },
    methods: {
        submit() {
            this.form.post(route('print'),{
                onSuccess: (e) => {
                    this.stream = `data:application/pdf;base64,${e.props.flash.stream}` 
                }
            })
        }
    }
}
</script>
