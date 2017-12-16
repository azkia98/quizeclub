<template>
    <div>

        <div v-for="exam in exams">
            <button class="w3-block w3-button w3-left-align" @click="showAccordingBox(exam)"
                    v-text="exam.title"></button>
            <div class="w3-border" v-show="exam.isShow">
                <show-questions :questions="exam.questions"></show-questions>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['exams'],
        data() {
            return {
            }
        },
        methods: {
            change(test) {
                test.isShow = !test.isShow;
            },
            showAccordingBox(exam) {
                exam.isShow = !exam.isShow;
            }
        },
        mounted() {
        },
        computed: {}
    }
</script>
