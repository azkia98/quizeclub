<template>
    <div class="">
        <table class="w3-table-all">
            <tr>
                <td>Exam Title</td>
                <td>Question count</td>
                <td>Start examination</td>
            </tr>
            <tr v-for="exam in exams">
                <td v-text="exam.content.title"></td>
                <td v-text="exam.questionCount"></td>
                <td>
                    <button class="w3-btn" @click="startExam(exam.content.id)"><i class="fa fa-play w3-text-green"></i></button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                exams:[]
            }
        },
        methods:{
            startExam(examid){
                location.href=`${Url}/admin/#/start/exam/${examid}`;
//               this.$router.forward('startExam');
            }
        },
        mounted() {
            axios.get(`${Url}/admin/ex/shows`)
                .then(res=>{
                    this.exams=res.data.data;
                });
        }
    }
</script>
