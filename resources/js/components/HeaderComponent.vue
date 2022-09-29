<template>
    <header>
        <div class="logo">
            <span>BOOLBNB</span>
        </div>

        <div class="input">
            <input class="search" type="text" placeholder="Cerca...">
        </div>

        <div class="login">
            <a href="#">Registrati</a>
            <a href="#">Accedi</a>
        </div>
    </header>
</template>

<script>
export default {
    name: 'HeaderComponent'
}
</script>

<style lang="scss" scoped>
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;

    .logo {
        margin: 30px;
    }

    .search {
            margin-top: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 100px;
            border-radius: 20px;
        }

    .login {
        margin: 30px;
        font-size: 20px;

        a {
            margin-right: 15px;
        }
    }
}
</style>