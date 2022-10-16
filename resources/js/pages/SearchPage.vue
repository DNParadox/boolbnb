<template>
  <div class="width">
    <div class="mb-4 d-flex justify-content-between align-items-center research-menu">
      <div class="logo">
        <img src="../../../public/storage/logo-boolbnb.png" alt="BoolBnB">
        <!-- <img src="../../../public/storage/airbnb.png" alt="BoolBnB"> -->
        <!-- <span class="logo-text">Boolbnb</span> -->
      </div>
      <div class="search">
        <input class="bar" list="autocomplete" type="text" placeholder="Inserisci una città o un indirizzo...">
        <button class="ms_btn" type="submit"><i class="fa-solid fa-magnifying-glass icon"></i></button>
      </div>
      <div class="user" @click.prevent="menu_show = !menu_show">
        <i class="fa-solid fa-user login"></i>
        <div v-if="menu_show">
            <div class="menu">
                <i class="fa-solid fa-caret-up"></i>
                <ul class="menu-login">
                  <li><a href="http://127.0.0.1:8000/logged/apartments"><span class="ml-2">Accedi</span></a></li><hr>
                  <li><a href="http://127.0.0.1:8000/logged/apartments"><span class="ml-2">Diventa un host</span></a></li>
                  <li><span class="ml-2">Proponi un'esperianza</span></li>
                  <li><span class="ml-2">Assistenza</span></li>
                </ul>
            </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container-fluid">

      <h2 class="text-center">Filtri per la ricerca aggiuntiva</h2>
      <div class="container d-flex justify-content-center">  
        <!-- Row -->
        <div class="row">

          <!-- Col -->
          <div class="col d-flex justify-content-center">
            <div class="card style_filer d-flex">
              <h4>Servizi</h4>
              <ul class="ul-service">
                <li v-for="service in services" :key="service.id" @change="clickHandler($event)">
                  <input class="checkbox" type="checkbox"  :value="service.name" :id="service.name">
                  <label :for="service.name">{{service.name}}</label>
                </li>
              </ul>
          </div>
          </div>


          <div class="d-none">{{ advancedFilter }}</div>

            <!-- Col -->
            <div class="col d-flex justify-content-center">
              <div class="card style_filer d-flex">
                <h4>Stanze e letti</h4>
                <div class="alignment">
                  <span class="serch-text">Letti</span>
                  <div>
                    <span class="circle" @click="bedsNumber--" :class="bedsNumber == 1 ? 'disabled' : ''">
                      <i class="fa-solid fa-minus"></i></span><span class="number-search">{{ bedsNumber }}
                    </span>
                    <span class="circle" @click="bedsNumber++" :class="bedsNumber == 20 ? 'disabled' : ''">
                      <i class="fa-solid fa-plus"></i>
                    </span>
                  </div>
                </div>


                <div class="alignment">
                    <span class="serch-text">Camere</span>
                    <div>
                        <span class="circle" @click="roomsNumber--" :class="roomsNumber == 1 ? 'disabled' : ''">
                          <i class="fa-solid fa-minus"></i>
                        </span>
                        <span class="number-search">{{ roomsNumber }}</span>
                        <span class="circle" @click="roomsNumber++" :class="roomsNumber == 20 ? 'disabled' : ''"><i class="fa-solid fa-plus"></i></span>
                      </div>
                </div>


                <div class="alignment">
                  <span class="serch-text">Distanza</span>
                  <div class="slidecontainer">
                    <input type="range" min="1" max="50" v-model="distanceFilter" class="slider" id="myRange">
                  </div>
                </div>
                <div id="contenitore-filter">
                  <button class="btn" @click="filterByApi()">Aggiungi filtri</button>
                </div>
              </div> 
            </div>
          </div>

      </div>

      <div class="container-fluid">
        <div class="row d-flex" v-if="allSearchedAparments.length > 0">
            <!-- Col -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12" v-for="Print in allSearchedAparments" :key="Print.id">
                <!-- Card -->
              <div class="card bnb_style style-apartment">
                  <!-- Inside Card -->
                <router-link :to="{name: 'single-apartment', 
                  params: { id: Print.id }
                }">
                  <img :src="Print.photo" class="card-img-top" alt="...">
                  <div class="card-body">               
                    <h4>{{ Print.title }}</h4>
                    <div class="description">
                        <div>{{ getText(Print.address)  }}</div>
                        <span>{{ Print.room_number }} camere · </span>
                        <span>{{ Print.bed_number }} letti · </span>
                        <span>{{ Print.bathroom }} bagni</span>
                        <div>{{Print.price ? Print.price + '€ a notte': 'Per info contatta la struttura' }} </div>
                    </div> 
                  </div>
                </router-link>  
              </div> 
            </div>          
        </div>
        <div v-else class="not_found">
          <h2>Non ci sono appartamenti con questi filtri</h2>
        </div>
      </div>
      
    </div>
  </div>

 
</template>

<script>
import { onMounted } from 'vue';
export default {
  name: 'SearchPage',
  data() {
    return {
      distanceFilter: 20,
      roomsNumber: 1,
      bedsNumber: 1,
      advancedFilter: [],
      services: [],
      currentPosition: this.$route.params.currentPosition,
      allSearchedAparments: [],
    }
  },
  methods: {
    getServices(){
      axios.get('http://127.0.0.1:8000/api/services').then((response)=>{
      this.services = response.data.results;
    } 
    )},
    filterByApi(){
      axios.get('http://127.0.0.1:8000/api/filterby/' + this.distanceFilter +'/'+ this.roomsNumber +'/'+ this.bedsNumber +'/'+ this.currentPosition.lat +'/'+ this.currentPosition.lon ,{
        params:{
          service : this.advancedFilter,
        },
      })
      .then((response)=>{
        console.log(response);
        this.allSearchedAparments = response.data.apartments;
      })
    },
    clickHandler(e) {
      let arr = this.advancedFilter;
      if(arr.includes(e.target.value)) {
        arr = arr.filter(item => item !== e.target.value);    
      } else {
        arr.push(e.target.value);
      }
      this.advancedFilter = arr;
    },
    getText(text){
      let sliced = text;
      if(text.length > 24){
        sliced = sliced.slice(0, 24) + '...';
      }

      return sliced;
    },
  },
  mounted(){
    this.getServices();
    this.filterByApi(); 
  }
}
</script>

<style lang="scss" scoped>
.research-menu{
  margin-top: 20px;
  padding-inline: 15px;
  
  .logo{
      
    *{
      vertical-align: middle;
    }

    img{
      width: 130px;
    }

    .logo-text{
      margin-left: 6px;
      font-size: 24px;
      font-weight: 600;
      color: #ff385c;
    }  
  }
    
  .search {
    display: flex;
    justify-content: center;
    
    .bar {
      width: 300px;
      padding: 10px;
      border-radius: 7px 0 0 7px;
      border: 1px solid lightgray;
    }

    .ms_btn {
      padding: 10px 15px;
      background-color: #ff385c;
      color: white;
      border: none;
      border-radius: 0 7px 7px 0;
    }
  }

  .user{
    position: relative;

    .login{
      font-size: 22px;
      margin-right: 12px;
      padding: 8px;
      border: 2px solid #ff385c;
      border-radius: 20px;
      color: #ff385c;
    }

    .menu{
      margin-top: 10px;
      padding: 12px 0;
      position: absolute;
      z-index: 99999;
      right: 10px;
      left: -140px;
      border: 1px solid #939393;
      border-radius: 12px;
      background-color: #f2f2f2;

      i{
        position: absolute;
        top: -9px;
        right: 16px;
        color: #939393;
      }

      .menu-login{
        li{
          padding-block: 5px;
        }
        li:hover{
          background-color: #e3e3e3;
        } 
      }
    }
  }

}

@media screen and (max-width: 1000px) {
  .research-menu{
    .logo{
      display: none;  
    }

    .search {  
      .bar {
        width: 160px;
      }
    }  
  }
  .width{
    margin-bottom: 80px;
  }
}

.width{
  margin-bottom: 50px;
}

.not_found{
  display: flex;
  justify-content: center;
  margin: 40px;
  box-shadow: rgba(0, 0, 0, 0.3);
  border: #D8D8D8 1px solid;
  border-radius: 24px;
}
.bnb_style {
  margin-top: 3rem;;
  border: none;
  background-color: inherit;
  
  img {
    border-radius: 24px;
    aspect-ratio: 1 / 1;
  }
  .card-body {
    padding-left: 0;
  }

  .description {
    color: grey;
  }

  a {
    margin-top: 7px;
  }
}
.style_filer {
  margin-top: 0.2rem;
  border: #D8D8D8 1px solid;
  background-color:  	#F0F0F0;
  border-radius: 24px;
  padding-block: 10px;
  padding-inline: 24px;
  width: 330px;
  // box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;

  h4{
    text-align: center;
  }
  img {
    border-radius: 24px;
    width: 300px;
    height: 280px;
  }
  .card-body {
    padding-left: 0;
  }

  .description {
    color: grey;
  }

  a {
    margin-top: 7px;
  }
}

h2{
  margin: 30px 80px;
}
.ul-service {
  display: flex;
  width: 290px;
  flex-direction: column;
  height: 200px;
  flex-wrap: wrap;

  li{
    margin-right: 16px;
  }
}

.circle{
  color: black;
  border: #ff385c 2px solid;
  padding: 5px 10px;
  border-radius: 50%;
  vertical-align: middle;
  cursor: pointer;
}
.serch-text{
  font-size: 1.1rem;
}

.number-search{
  margin-inline: 12px;
  font-size: 20px;
  vertical-align: middle;
}

.alignment{
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.slidecontainer{
  
  #myRange{
    width: 90%;
  }
}

.disabled{
  color : darkGray;
  font-style: italic;
  border: 2px solid darkGray;
  /*property for disable input element like*/
  pointer-events: none;
}

.btn{
  background-color: #ff385c;
  color:white;
  font-weight: bold;
}

.checkbox{
  accent-color:#ff385c;
}
</style>