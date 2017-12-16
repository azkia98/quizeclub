<template>
    <div>
        <ul class="w3-ul">
            <li v-for="question in questions" v-text="question.title"></li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:['questions'],
        mounted() {
        }
    }
</script>
