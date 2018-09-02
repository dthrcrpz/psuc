<template>
    <div>
    	<nav>
    		<div class="container">
    			<router-link to="/" class="logo">
    				<img src="/logo.png">
    				<h1>PSU</h1>
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
    export default{
        data(){
            return{
                isLoading: false
            }
        }
    }
</script>