<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <img src="/img/admin/avatar3.png" class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8 w3-bar">
            <span>Welcome, <strong>Mike</strong></span><br>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" @click="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
        <router-link class="w3-bar-item w3-button w3-padding mh-decoration" to="/"><i class="fa fa-reply-all"></i> &nbsp;Overview</router-link>
        <router-link class="w3-bar-item w3-button w3-padding mh-decoration" to="/categories"><i class="fa fa-archive"></i> &nbsp;Categories</router-link>
        <router-link class="w3-bar-item w3-button w3-padding mh-decoration" to="/categories/create"><i class="fa fa-plus"></i> &nbsp;Create category</router-link>
        <router-link class="w3-bar-item w3-button w3-padding mh-decoration" to="/courses"><i class="fa fa-archive"></i> &nbsp;Courses</router-link>
        <router-link class="w3-bar-item w3-button w3-padding mh-decoration" to="/courses/create"><i class="fa fa-plus-circle"></i> &nbsp;Create Course</router-link>
        <router-link class="w3-bar-item w3-button w3-padding mh-decoration" to="/exams"><i class="fa fa-paper-plane"></i> &nbsp;Exams</router-link>
        <router-link class="w3-bar-item w3-button w3-padding mh-decoration" to="/exams/create"><i class="fa fa-file-word-o w3-text-green"></i> &nbsp;Create new Exam</router-link>
{{--        <a href="#" class="w3-bar-item w3-button w3-padding mh-decoration"><i class="fa fa-users fa-fw"></i>&nbsp; Traffic</a>
        <a href="#" class="w3-bar-item w3-button w3-padding mh-decoration"><i class="fa fa-bullseye fa-fw"></i>&nbsp; Geo</a>
        <a href="#" class="w3-bar-item w3-button w3-padding mh-decoration"><i class="fa fa-diamond fa-fw"></i>&nbsp; Orders</a>
        <a href="#" class="w3-bar-item w3-button w3-padding mh-decoration"><i class="fa fa-bell fa-fw"></i>&nbsp; News</a>
        <a href="#" class="w3-bar-item w3-button w3-padding mh-decoration"><i class="fa fa-bank fa-fw"></i>&nbsp; General</a>
        <a href="#" class="w3-bar-item w3-button w3-padding mh-decoration"><i class="fa fa-history fa-fw"></i>&nbsp; History</a>
        <a href="#" class="w3-bar-item w3-button w3-padding mh-decoration"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</a><br><br>--}}
    </div>
</nav>