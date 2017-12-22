import VueRouter from 'vue-router';



const routes = [
    { path: '/', component: require('./components/admin/DashboardComponent.vue') },
    { path: '/bar', template:'<div>Hello Bar</div>' },
    {path: '/categories',component:require('./components/admin/showAllCategoriesComponent.vue')},
    {path: '/categories/:id/edit',component:require('./components/admin/EditCategoryComponent.vue')},
    {path: '/categories/create',component:require('./components/admin/CreateCategoryComponent.vue')},
    {path: '/courses',component:require('./components/admin/courses/ShowAllCoursesComponent.vue')},
    {path: '/courses/:id/edit',component:require('./components/admin/courses/EditCourseComponent.vue')},
    {path: '/courses/create',component:require('./components/admin/courses/CreateCourseComponent.vue')},
    {path: '/exams',component:require('./components/admin/exams/ExamsComponent.vue')},
    {path: '/exams/create',component:require('./components/admin/exams/createExam.vue')},
    {path:'/show/exams',component:require('./components/admin/exams/selectExam.vue'),name:'showAllExam'}   // user can chose his exam
];



export default new VueRouter({
    routes // short for `routes: routes`
});
