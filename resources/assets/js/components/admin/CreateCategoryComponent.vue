<template>
    <div>
        <form class="w3-container w3-card-4">
            <br>
            <p>
                <label class="w3-text-grey">Title</label>
                <input class="w3-input w3-border" required="" type="text" v-model="title" >
            </p>
            <p>
                <label class="w3-text-grey">Label</label>
                <textarea class="w3-input w3-border" style="resize:none" v-model="label"></textarea>
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
                label:'',
                title:'',
            }
        },
        methods:{
            send(){
//                console.log(this.formdata);
                axios.post(`http://localhost:8000/admin/categories`,this.formdata)
                    .then(res=>console.log(res.data));
            }
        },
        mounted() {
        },
        computed:{
            formdata(){
                return {
                    label:this.label,
                    title:this.title
                }
            }
        }
    }
</script>
