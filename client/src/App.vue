<template>
    <div>
    	<nav>
    		<div class="container">
    			<router-link to="/" class="logo">
    				<img src="/logo.png">
    				<h1>PSU</h1>
    			</router-link>
                <div class="right-nav">
                    <router-link to="/complaints" class="normal">View Complaints</router-link>
                    <button class="logout" @click="logout()" v-if="isLoggedIn">‹ Logout</button>
                </div>
    		</div>
    	</nav>
    	<router-view/>
        <transition name="fade">
            <div class="loading-container" v-if="isLoading"></div>
        </transition>
    </div>
</template>

<script>
    import Cookie from 'js-cookie'
    export default{
        data(){
            return{
                isLoading: false,
                isLoggedIn: false
            }
        },
        methods: {
            logout(){
                let me = this
                me.isLoading = true
                Cookie.remove('token')
                setTimeout(function() {
                    me.isLoading = false
                    me.isLoggedIn = false
                    me.$router.push('/admin-panel')
                }, 2000)
            }
        },
        mounted(){
            let me = this
            var c = Cookie.get('token')
            if(c == undefined){
                me.isLoggedIn = false
            }else{
                me.isLoggedIn = true
            }
        }
    }
</script>