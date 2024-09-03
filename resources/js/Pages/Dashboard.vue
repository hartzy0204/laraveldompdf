<template>
    <a :href="route('print', id)" target="_blank">Print</a>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
export default {
    layout: AuthenticatedLayout,
    data() {
        return {
            id: this.$page.props.auth.user.id
        }
    }
}
</script>
