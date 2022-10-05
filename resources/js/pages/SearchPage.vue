<template>


  <div class="container-fluid">

    <h2 class="text-center">Filtri per la ricerca aggiuntiva</h2>
    <div class="container d-flex">  
      <!-- Row -->
      <div class="row">

        <!-- Col -->
        <div class="col  d-flex justify-content-center">
          <div class="card d-flex">
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
            <div class="card d-flex">
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
      <div class="row">
            <!-- Col -->
            <div class="col d-flex">
                <!-- Card -->
              <div class="card mx-sm-auto mx-md-0" v-for="Print in allSearchedAparments" :key="Print.id">
                  <!-- Inside Card -->
                <img :src="Print.photo" class="card-img-top" alt="...">
                <div class="card-body">
                    <router-link :to="{name: 'single-apartment', 
                    params: { id: Print.id }
                    }">
                      <h4>{{ Print.title }}</h4>
                      <div class="description">
                          <div>{{ Print.address }}</div>
                          <span>{{Print.price}} € a notte</span>
                      </div>
                    </router-link>
                </div>  
              </div> 
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
      axios.get('http://127.0.0.1:8000/api/filterby/', {
        params : {
          distance: this.distanceFilter,
          room_number: this.roomsNumber,
          bed_number: this.bedsNumber,
          latitude: this.currentPosition.lat,
          longitude: this.currentPosition.lon,
          services: JSON.stringify(this.advancedFilter)
        }
      }).then((response)=>{
        console.log(JSON.stringify(this.advancedFilter))
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
    margin-top: 0.2rem;
    border: #D8D8D8 1px solid;
    background-color:  	#F0F0F0;
    border-radius: 24px;
    padding-block: 10px;
    padding-inline: 30px;
    width: 330px;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
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