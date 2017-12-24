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
        <div class="w3-panel">
            <v-select label="title" :on-change="showWithThisCategory"  v-model="selectedCourse" :options="courses"></v-select>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                selectedCourse:null,
                courses:[],
                exams:[]
            }
        },
        methods:{
            startExam(examid){
                location.href=`${Url}/admin/#/start/exam/${examid}`;
//               this.$router.forward('startExam');
            },
            showWithThisCategory(val){
                axios.get(`${Url}/admin/ex/shows/${val.id}`)
                    .then(res=>{
                        this.exams=res.data.data;
                    });
            }
        },
        mounted() {
            axios.get(`${Url}/admin/ex/shows`)
                .then(res=>{
                    this.exams=res.data.data;
                    this.courses=res.data.courses;
                });
        }
    }
</script>
