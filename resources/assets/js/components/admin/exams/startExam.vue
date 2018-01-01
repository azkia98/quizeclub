<template>
    <div>
        <div class="w3-padding w3-center w3-large" v-text="examName.title"></div>
        <div class="w3-padding w3-green" v-text="question.title"></div>
        <div class="w3-row-padding w3-margin-top">
            <div class="w3-quarter" v-for="(answer,index) in question.answers">
                <p class="w3-padding " :class="[(selectedAnswer==index)?'w3-yellow':'w3-gray']" v-text="answer.title"
                   @dblclick="selectAnswer(answer.id,index)"></p>
            </div>
        </div>
        <div class="w3-bar w3-margin w3-center">
            <a href="#" @click.prevent="prevQuestion()" :title="paginate.perPage.pageNumber"
               class="w3-button mh-decoration">&laquo;</a>
            <a href="#" @click.prevent="nextQuestion()" :title="paginate.nextPage.pageNumber"
               class="w3-button mh-decoration">&raquo;</a>
        </div>
        <div class="w3-center">
            <div class="w3-button w3-red w3-hover-shadow w3-hover-red" @click="endTheExam()">End The Exam</div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                examName: {title: ''},
                question: {},
                answers: [],
                selectedAnswer: null,
                userAnswer: [],
                isShowEndedButton: false,
                paginate: {
                    nextPage: {url: '', pageNumber: 0},
                    perPage: {url: '', pageNumber: 0}
                }
            }
        },
        methods: {
            endTheExam(){
                console.log('fdasf')
                axios.post(`${Url}/admin/take/quiz/`,this.formData)
                    .then(res=>console.log(res))
            },
            selectAnswer(answerId, answerIndex) {
//                console.log('fasd', answerId, answerIndex, this.question.id, this.userAnswer.length);
                this.selectedAnswer = answerIndex;
                for (var i = 0; i < this.userAnswer.length; i++) {
                    if (this.userAnswer[i].question_id == this.question.id) {
                        return 0;
                    }
                }
                let data = {
                    question_id: this.question.id,
                    answerId: answerId
                };
                this.userAnswer.push(data);
            },
            nextQuestion() {
                this.selectedAnswer = null;
                this.getData(this.paginate.nextPage.pageNumber);
            },
            prevQuestion() {
                this.selectedAnswer = null;
                this.getData(this.paginate.perPage.pageNumber);
            },
            getData(pageNumber) {
                axios.get(`${Url}/admin/take/quiz/${this.examId}/?page=${pageNumber}`)
                    .then(res => {
                        let total = res.data.data.question.total;
                        let current_page = res.data.data.question.current_page;

                        this.examName.title = res.data.data.exam.title;
                        this.question = res.data.data.question.data[0];
                        this.answers = res.data.data.answers;
                        if (current_page == total) {
                            this.paginate.nextPage.url = this.paginate.nextPage.url;
                            this.paginate.nextPage.pageNumber = this.paginate.nextPage.pageNumber;
                        }
                        else {
                            this.paginate.nextPage.url = res.data.data.question.next_page_url;

                            this.paginate.nextPage.pageNumber = ++res.data.data.question.current_page;
                            res.data.data.question.current_page--;
                        }
                        if (res.data.data.question.current_page == 1)
                            this.paginate.perPage.pageNumber = res.data.data.question.per_page;
                        else
                            this.paginate.perPage.pageNumber = --res.data.data.question.current_page;

                        this.paginate.perPage.url = res.data.data.question.prev_page_url;
                    });
            }

        },
        mounted() {
            this.getData(1);
        },
        computed: {
            examId() {
                return this.$route.params.examid;
            },
            formData(){
                let data={
                    userAnswer:this.userAnswer
                };
                return data;
            }
        }
    }
</script>
