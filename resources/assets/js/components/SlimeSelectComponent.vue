
<template>
    <div>
        <select id="slim-select" v-model="myData" @click="passData">
            <option value="value 1" v-for="category in categories" :value="category.id">{{category.title}}</option>
        </select>

    </div>
</template>

<script>
    import SlimSelect from 'slim-select';
    export default {
        props:{
            categories:{

            }
        },
        data(){
            return {
                myData:''
            }
        },
        mounted() {
            new SlimSelect({
                select: '#slim-select',
            })
        },
        methods:{
            passData()
            {
                console.log(this.myData);
            }
        }
    }
</script>
