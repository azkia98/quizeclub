<template>
    <div>
        <form class="w3-container w3-card-4">
            <br>
            <p>
                <label class="w3-text-grey">Title</label>
                <input class="w3-input w3-border" required="" type="text" v-model="title">
            </p>
            <br>
            <p>
                <!--<slim-select :categories="categories"></slim-select>-->
                <v-select label="title" v-model="selected" :options="categories"></v-select>
            </p>
            <p>
                <button type="button" class="w3-btn w3-padding w3-teal" @click.prevent="send()" style="width:120px">
                    Send &nbsp; ❯
                </button>
            </p>

        </form>
    </div>
</template>

<script>


    export default {

        data() {
            return {
                title: '',
                categories: [],
                selected:'',
            }
        },
        methods: {
            send() {
//                console.log(this.formdata);
                axios.post(`http://localhost:8000/admin/courses`, this.formdata)
                    .then(res => console.log(res.data));

                axios.get(`http://localhost:8000/admin/courses/create`)
                    .then(res => this.categories = res.data.data);

                this.title=null;
                this.selected=null;
            }
        },
        mounted() {
            axios.get(`http://localhost:8000/admin/courses/create`)
                .then(res => this.categories = res.data.data);


        },
        computed: {
            formdata() {
                return {
                    title: this.title,
                    category_id: this.selected.id,
                }
            }
        }
    }
</script>
