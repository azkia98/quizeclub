<template>
    <div>
        <div class="w3-center w3-xxlarge">
            Exams
        </div>
        <show-all-exams :exams="exams"></show-all-exams>
        <!--pagination-->
        <div class="w3-center">
            <div class="w3-bar">
                <a @click.prevent="getExams(1)" class="w3-bar-item w3-button mh-decoration">&laquo;</a>
                <a href="#" v-for="page in pages.preview" @click.prevent="getExams(page)" class="w3-bar-item w3-button mh-decoration" v-text="page"></a>
                <a href="#" @click.prevent="getExams(meta.current_page)" class="w3-bar-item w3-button mh-decoration w3-green" v-text="meta.current_page"></a>
                <a href="#" v-for="page in pages.after" @click.prevent="getExams(page)" class="w3-bar-item w3-button mh-decoration" v-text="page"></a>
                <a @click.prevent="getExams(meta.last_page)" class="w3-bar-item w3-button mh-decoration">&raquo;</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                exams: [],
                links: {},
                meta: {},
            }
        },
        methods: {
            getExams(page = 1) {
                axios.get(`${Url}/admin/exams/?page=${page}`)
                    .then(res => {
                        this.links = res.data.links;
                        this.meta = res.data.meta;
                        let exams = [];
                        exams = res.data.data;
                        exams.forEach((exam) => {
                            exam.isShow = false;
                        });
                        this.exams = exams;
                    });
            }
        },
        mounted() {
            this.getExams();
//            console.log(this.pages);
        },
        computed: {
            //current page 3
            //after page 6
            //preview  2
            pages() {
//                {
//                    after:[4, 5, 6, 7, 8, 9],
//                        preview:[1,2,3]
//                }
                let pages={};
                pages.after=[];
                pages.preview=[];
                let current_page=this.meta.current_page;
                let lastPage=this.meta.last_page;
                for (var i=1;  i< current_page; i++)
                    pages.preview.push(i);

                for (current_page++; current_page <= lastPage; current_page) {
                    pages.after.push(current_page);
                    current_page++;
                }
                return pages;
            }
        }
    }
</script>
