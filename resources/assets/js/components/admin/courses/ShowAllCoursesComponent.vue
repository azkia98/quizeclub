<template>
    <div>
        <!--<form class="w3-container w3-card-4">
            <br>
            <p>
                <label class="w3-text-grey">Title</label>
                <input class="w3-input w3-border" required="" type="text" v-model="title">
            </p>
            <p>
                <label class="w3-text-grey">Label</label>
                <textarea class="w3-input w3-border" style="resize:none" v-model="label"></textarea>
            </p>
            <br>
            <p><button type="button" class="w3-btn w3-padding w3-teal" @click.prevent="send()" style="width:120px">Send &nbsp; ❯</button></p>
        </form>-->
        <table class="w3-table-all">
            <tr>
                <td>Title</td>
                <td>Options</td>
            </tr>
            <tr v-for="course in courses">
                <td v-text="course.title"></td>
                <td>
                    <a class="mh-decoration fa fa-trash w3-text-red" @click.prevent="deleteCourse(course.id)" style="cursor: pointer;"></a>
                    <router-link class="mh-decoration fa fa-edit w3-text-orange" :to="`/courses/${course.id}/edit`"></router-link>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title: '',
                courses: {}
            }
        },
        methods: {
            send() {
                console.log('fdasf');
            },
            deleteCourse(param) {
                console.log(param);
                axios.delete(`http://localhost:8000/admin/courses/${param}`);
                axios.get('http://localhost:8000/admin/courses')
                    .then(res => {
                        this.courses = res.data.data;
                    });
            }
        },
        mounted() {
            axios.get('http://localhost:8000/admin/courses')
                .then(res => {
                    this.courses = res.data.data;
                });
        }
    }
</script>