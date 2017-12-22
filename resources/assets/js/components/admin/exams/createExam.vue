<template>
    <div>
        <div>
            <div v-text="examName" @dblclick="editExamName($event.target)" class="w3-center w3-xxlarge" v-show="isshowExamTitle"></div>
            <input class="w3-border w3-border-0 w3-center mh-center" @blur="showExamTitle($event.target)" v-if="!isshowExamTitle" v-model="examName" autofocus/>
        </div>
        <div v-for="(question,question_index) in questions" class="w3-panel w3-margin-top">
            <div v-text="question.title" class="w3-orange w3-padding"></div>
            <div class="w3-row-padding" style="margin-top:5px">
                <div class="w3-quarter" v-for="(answer,index) in question.answers">
                    <div class="w3-padding" v-text="answer"  :class="[ examObject.hasTrueAnswer(index,question.trueAnswer)?'w3-green':'w3-2017-greenery']"></div>
                </div>
            </div>
        </div>
        <div class="w3-panel">
            <input type="text" class="w3-input w3-border" v-model="question" placeholder="Question title ...."/>
            <div class="w3-row-padding w3-margin-top">
                <div class="w3-quarter" v-for="(answerInput,index) in answerInputNumber">
                    <input type="text" class="w3-input w3-border" v-model="answerInput.value" @click.ctrl="setTrueAnswer(index)" @keyup.46="deleteInput(index)" :class="{'w3-pale-green' : answerInput.isTrue}" placeholder="answer">
                </div>
                <button @click="addAnswerInput()" class="w3-rest fa fa-plus w3-button w3-round w3-green" style="margin-top:0.5%"></button>
            </div>
            <div class="w3-panel">
                <v-select label="title" v-model="selectedCourse" :options="courses"></v-select>
            </div>
            <button class="w3-block w3-button w3-center w3-blue w3-margin-top" @click="submitMyForm()">Add</button>
        </div>
        <div class="w3-panel">
            <button class="w3-button w3-block w3-signal-violet" @click="sendExamData()">Add Exam</button>
        </div>
    </div>
</template>

<script>
    class Exam{
        constructor(){
            this.answers=[];
            this.trueAnswers=[];
        }
        hasTrueAnswer(index,trueAnswers){
            if(trueAnswers.includes(index))
                return true;
            return false;
        }
    }
    export default {
        data() {
            return {
                examName: 'New Exam',
                answerInputNumber:[{isTrue:false,value:''}],
                questions: [
                    {title: 'questions 1', answers: ['answer1', 'answer2', 'answer3', 'answer4'],trueAnswer:[0]}
                ],
                question:'',
                trueAnswer:0,
                examObject:new Exam(),
                isshowExamTitle:true,
                courses:[],
                selectedCourse:0
            }
        },
        methods:{
            sendExamData(){
                console.log(this.formData);
                axios.post(`${Url}/admin/exams`,this.formData)
                    .then(res=>console.log(res));
            },
            editExamName(element){
                this.isshowExamTitle=!this.isshowExamTitle;
            },
            showExamTitle(element){
                this.isshowExamTitle=!this.isshowExamTitle;
            },
            addAnswerInput(){
                this.answerInputNumber.push({isTrue:false,value:''});
            },
            setTrueAnswer(index){
                this.answerInputNumber[index].isTrue=true;
                console.log(index);
            },
            deleteInput(index){
                this.answerInputNumber.splice(index,1);
            },
            submitMyForm()
            {
                let answers=[];
                let trueAnswer=[];
                this.answerInputNumber.forEach(function (answer,index){
                    answers.push(answer.value);
                    if(answer.isTrue)
                        trueAnswer.push(index);
                });
                this.questions.push({
                    title:this.question,
                    answers:answers,
                    trueAnswer:trueAnswer
                });
                this.answerInputNumber=[{isTrue:false,value:''}];
                this.question='';
            },
            isTrueQuestion(answerIndex,questionIndex)
            {
                console.log(this.questions[questionIndex].trueAnswer.includes(answerIndex));
//                this.questions[index].trueAnswer.indexOf(index);
                return true
            }
        },
        mounted() {
            axios.get(`${Url}/admin/exams/create`)
                .then(res=>this.courses=res.data.data);
        },
        computed:{
            formData(){
                let formData={
                    examName:this.examName,
                    questions:this.questions,
                    course_id:this.selectedCourse.id
                };
                return formData
            }
        }

    }
</script>
