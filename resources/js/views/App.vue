<template>
    <div>
        <HeaderComponent/>

        <main>
            <router-view></router-view>
        </main>

        <FooterComponent/>
    </div>
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import FooterComponent from '../components/FooterComponent.vue' 

export default {
    name: 'App',
    components: {
        HeaderComponent,
        FooterComponent
    }
}

</script>

<style>
    @import '../../sass/frontend/_header.scss';
</style>