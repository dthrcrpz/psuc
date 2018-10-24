<template>
    <div>
        <nav>
            <div class="container">
                <router-link to="/" class="logo">
                    <img src="/logo.png">
                    <h1>PSU</h1>
                </router-link>
                <div class="right-nav">
                    <router-link to="/" class="normal home-link" v-if="onAdminPanel == false">Home </router-link>
                    <router-link to="/admin-panel" class="normal home-link" v-if="onAdminPanel">Home </router-link>
                    <router-link to="/complaints" class="normal" v-if="isClientLoggedIn || isAdminLoggedIn">View Complaints</router-link>
                    <button class="logout" @click="logout()" v-if="isAdminLoggedIn"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                    <button class="logout" @click="clientLogout()" v-if="isClientLoggedIn"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                </div>
                <div class="mobile-right-nav">
                    <a href="javascript:void(0)" @click="toggleMobNav()"><i :class="(showMobNav) ? 'fa fa-times' : 'fa fa-bars'" aria-hidden="true"></i></a>
                </div>
    		</div>
    	</nav>
    	<router-view style="margin-top: 70px"/>
        <transition name="fade">
            <div class="loading-container" v-if="isLoading"></div>
        </transition>
        <div :class="(showMobNav) ? 'mobile-overlay-nav active' : 'mobile-overlay-nav'">
            <a @click="showMobNav = false" href="/" class="normal home-link" v-if="onAdminPanel == false">Home </a>
            <a @click="showMobNav = false" href="/admin-panel" class="normal home-link" v-if="onAdminPanel">Home </a>
            <a @click="showMobNav = false" href="/complaints" class="normal" v-if="isClientLoggedIn || isAdminLoggedIn">View Complaints</a>
            <div class="logout-container" v-if="isAdminLoggedIn">
                <a href="javascript:void(0)" @click="logout()"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </div>
            <div class="logout-container" v-if="isClientLoggedIn">
                <a href="javascript:void(0)" @click="clientLogout()"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookie from 'js-cookie'
    import jwt from 'jsonwebtoken'
    export default{
        data() {
            return{
                isLoading: false,
                isAdminLoggedIn: false,
                isClientLoggedIn: false,
                decodedClientToken: '',
                decodedAdminToken: '',
                onAdminPanel: true,
                showMobNav: false
            }
        },
        methods: {
            toggleMobNav() {
                let me = this
                me.showMobNav = !me.showMobNav
            },
            logout() {
                let me = this
                me.isLoading = true
                Cookie.remove('admin-token')
                setTimeout(function() {
                    me.isLoading = false
                    me.isAdminLoggedIn = false
                    me.$router.push('/admin-panel')
                    me.showMobNav = false
                }, 1000)
            },
            clientLogout() {
                let me = this
                me.isLoading = true
                Cookie.remove('client-token')
                setTimeout(function() {
                    me.isLoading = false
                    me.isClientLoggedIn = false
                    me.$router.push('/')
                    me.showMobNav = false
                }, 1000)
            }
        },
        mounted() {
            let me = this

            // for checking of admin auth state
            var c = Cookie.get('admin-token')
            if(c == undefined) {
                me.isAdminLoggedIn = false
            }else{
                jwt.verify(Cookie.get('admin-token'), process.env.VUE_APP_JWT_SECRET, (err, decoded) => {
                    if(!err) {
                        me.isAdminLoggedIn = true
                        me.decodedAdminToken = decoded
                    }else{
                        me.isAdminLoggedIn = false
                    }
                })
            }

            // for checking of client auth state
            var x = Cookie.get('client-token')
            if(x == undefined) {
                me.isClientLoggedIn = false
            }else{
                jwt.verify(Cookie.get('client-token'), process.env.VUE_APP_JWT_SECRET, (err, decoded) => {
                    if(!err) {
                        me.isClientLoggedIn = true
                        me.decodedClientToken = decoded
                    }else{
                        me.isClientLoggedIn = false
                    }
                })
            }
        }
    }
</script>