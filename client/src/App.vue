<template>
    <div>
    	<nav>
    		<div class="container">
    			<router-link to="/" class="logo">
    				<img src="/logo.png">
    				<h1>PSU</h1>{{ isLoggedIn }}
    			</router-link>
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