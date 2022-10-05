<template>


  <div class="container-fluid">

    <h2 class="text-center">Filtri per la ricerca aggiuntiva</h2>
    <div class="container d-flex">  
      <!-- Row -->
      <div class="row row-cols-">

        <!-- Col -->
        <div class="col-lg-6 col-md-12">
          <div class="mr-4 card">
            <h4>Servizi</h4>
            <ul class="ul-service">
              <li v-for="service in services" :key="service.id" @change="clickHandler($event)">
                <input type="checkbox"  :value="service.name" :id="service.name">
                <label :for="service.name">{{service.name}}</label>
              </li>
            </ul>
         </div>
        </div>


      <div class="d-none">{{ advancedFilter }}</div>

      <!-- Col -->
        <div class="col-lg-6 col-md-12">
          <div class="card">
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


            <div>
              <h5>Distanza</h5>
              <div class="slidecontainer">
                <input type="range" min="1" max="50" v-model="distanceFilter" class="slider" id="myRange">
              </div>
            </div>

          </div> 

          <div>
            <button @click="filterByApi()">Aggiungi filtri</button>
          </div>
          </div>
        </div>

    </div>

    <div class="container-fluid" v-if="allSearchedAparments.length > 0">
      <div class="row">
            <!-- Col -->
            <div class="col d-flex">
                <!-- Card -->
              <div class="card mx-sm-auto mx-md-0" v-for="Print in allSearchedAparments" :key="Print.id">
                  <!-- Inside Card -->
                <router-link :to="{name: 'single-apartment', 
                    params: { id: Print.id }
                }">
                  <img :src="Print.photo" class="card-img-top" alt="...">
                  <div class="card-body">               
                    <h4>{{ Print.title }}</h4>
                    <div class="description">
                        <div>{{ Print.address }}</div>
                        <span>{{Print.price}} € a notte</span>
                    </div> 
                  </div>
                </router-link>  
              </div> 
            </div>          
        </div>
    </div>
    <div v-else>
      <h2>non ci sono appartamenti con questi filtri</h2>
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
    }
  },
  mounted(){
    this.getServices();
    this.filterByApi(); 
  }
}
</script>

<style lang="scss" scoped>
  .card {
    margin-top: 3rem;;
    border: none;
    background-color: inherit;
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
    width: 20px;
    vertical-align: middle;
    cursor: pointer;
  }
  .serch-text{
    font-size: 18px;
  }

  .number-search{
    margin-inline: 12px;
    font-size: 20px;
    vertical-align: middle;
  }

  .alignment{
    display: flex;
    justify-content: space-between;
    width: 250px;
    margin-bottom: 15px;
  }

  .slidecontainer{
    width: 80%;
    
    #myRange{
      width: 70%;
      margin-inline: 10px;
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

  input[type="range"]::-moz-range-progress {
    background-color:  #ff385c;
  } 


  input[type="range"]::-moz-range-track {  
    background-color: black
  }
  
  .card {
    background-color: lightblue;
  }
</style>