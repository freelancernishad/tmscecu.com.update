<template>
    <div>
        <slot></slot>
    </div>
</template>
<script>
export default {
    props: ['user','classesList'],
    async created() {
        // console.log(this.classesList)
        if (!User.loggedIn()) {
            window.location.href = '/login'
        }
        this.$store.commit('setUpdateUser', this.user)
        this.$store.commit('setUpdateClasses', this.classesList)


    },

    data() {
        return {

        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {

            },
            deep: true
        }
    },
    methods: {


    },
    mounted() {
    }
}
</script>
