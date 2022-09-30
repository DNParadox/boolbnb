<template>
<div>
    <!-- <header class="register_header">
        <div class="row">
            <div class="logo">
                <figure class="logosize">
                    <a href="http://localhost:8000/">
                        <img src="../../../public/storage/airbnb.png" alt="BoolBnB">
                    </a>
                </figure>
            </div>

            <div class="input d-flex">
                <input class="search" type="text" placeholder="Cerca...">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>

            <div class="login">
                <a href="/register">Registrati</a>
                <a href="/login">Accedi</a>
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
    </header>-->

    <header class="guestheader">
        <!-- Container -->
        <div class="container-fluid h-100">
            <!-- Row -->
            <div class="row d-flex align-items-center h-100">
                <!-- Col Left -->
                <div class="col d-md-flex">
                    <figure class="logosize">
                        <a href="http://localhost:8000/">
                            <img src="../../../public/storage/airbnb.png" alt="BoolBnB">
                        </a>
                    </figure>
                </div>

                <!-- Col Center-->
                <div class="col d-none  d-lg-flex">
                    <div class="inputcontainer pb d-flex">
                        <input class="inputmod" type="text" placeholder="Cerca">
                        <div class="circle">
                            <i class="fa-solid fa-magnifying-glass icon"></i>
                        </div>
                    </div>
                </div>

                <!-- Col Right -->
                <div class="col d-flex justify-content-end">
                    <!-- <button btn> <i class="fa-solid fa-bars"></i> </button> -->
                        <!-- <a href="/register">Registrati</a>
                        <a href="/login">Accedi</a> -->
            <div class="profile_header">
                <div class="icon-container pb dropdown-btn"> <i class="fa-solid fa-user icon"></i></div>
                    <ul class="dropdown-container tr">

                        <!-- Implementare in seguito dropdown menu  -->

                            <!-- <li class="nav-item"> 
                                <a class="nav-link" href="#">
                                Messaggi
                                </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            Logout
                            </a>

                            <form id="logout-form" action="" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="f-banner">
        <div class="container">
            <div class="text-center">
                    <router-link :to="{name: 'search'}"><h2>Ricerca case e appartamenti in affitto</h2></router-link>
            </div>
        </div>
    </div>
</div>
    

</template> 



<script>
export default {
    name: 'HeaderComponent',
}
</script>


<style lang="scss" scoped>
.f-banner {
    background: linear-gradient(to right, blue, red);
    padding: 60px 0;

    .container {
        h2 {
            color: white;
            font-size: 35px;
        }
    }
}
.guestheader{
        height: 80px;
        font-size: 1.25rem;
        .pb {
            padding-block: 8px;
        }
        .inputcontainer {
            border: 1px solid black;
            padding-inline: 10px;
            border-radius: 24px;
            background-color: white;
            padding-block: 10px;
            .circle {
                height: 28px;
                width: 28px;
                border-radius: 50%;
                background-color: #ff385c;
                color: white;
            }
            .inputmod{
                border: none;
                padding-left: 3px;
                line-height: 0; 
            }
            .inputmod:focus{
                border: none;
            }
        }
        .icon-container {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ff385c;;
            border: 1px solid black;
            cursor: pointer;
        }
        .icon-container:active{
            border: 2px solid black;
        }

        .icon {
            color: white;
            border-radius: 50%;
            display: flex;
            height: 100%;
            width: 100%;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        } 
}
</style>