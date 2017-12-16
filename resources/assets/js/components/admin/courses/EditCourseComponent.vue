<template>
    <div>
        <form class="w3-container w3-card-4">
            <br>
            <p>
                <label class="w3-text-grey">Title</label>
                <input class="w3-input w3-border" required="" type="text" v-model="title" >
            </p>
            <br>
            <p><button type="button" class="w3-btn w3-padding w3-teal" @click.prevent="send()" style="width:120px">Send &nbsp; ❯</button></p>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                title:'',
            }
        },
        methods:{
            send(){
//                console.log(this.formdata);
                axios.put(`http://localhost:8000/admin/courses/${this.$route.params.id}`,this.formdata)
                    .then(res=>console.log(res.data));

                axios.get(`http://localhost:8000/admin/courses/${this.$route.params.id}/edit`).then(res=>{
                    this.title=res.data.data.title;
                });

            }
        },
        mounted() {
            axios.get(`http://localhost:8000/admin/courses/${this.$route.params.id}/edit`).then(res=>{
                this.title=res.data.data.title;
                console.log(res.data);
            });
        },
        computed:{
            formdata(){
                return {
                    title:this.title
                }
            }
        }
    }
</script>
