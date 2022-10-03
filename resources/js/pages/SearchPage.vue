<template>
  <div>
    <h2>Filtri per la ricerca aggiuntiva</h2>
    <div class="container m-3 d-flex">  
      <div class="mr-4">
        <h4>Servizi</h4>
        <ul class="ul-service">
          <li v-for="service in services" :key="service.id" @change="clickHandler($event,advancedFilter)">
            <input type="checkbox"  :value="service.name" :id="service.name">
            <label :for="service.name">{{service.name}}</label>
          </li>
        </ul>
      </div>
      <div class="d-none">{{ advancedFilter }}</div>
      <div>
        <h4>Stanze e letti</h4>
        <div class="alignment"><span class="serch-text">Letti</span><div><span class="circle" @click="bedsNumber--" :class="bedsNumber == 1 ? 'disabled' : ''"><i class="fa-solid fa-minus"></i></span><span class="number-search">{{ bedsNumber }}</span><span class="circle" @click="bedsNumber++" :class="bedsNumber == 20 ? 'disabled' : ''"><i class="fa-solid fa-plus"></i></span></div></div>
        <div class="alignment"><span class="serch-text">Camere</span><div><span class="circle" @click="roomsNumber--" :class="roomsNumber == 1 ? 'disabled' : ''"><i class="fa-solid fa-minus"></i></span><span class="number-search">{{ roomsNumber }}</span><span class="circle" @click="roomsNumber++" :class="roomsNumber == 20 ? 'disabled' : ''"><i class="fa-solid fa-plus"></i></span></div></div>
        <div><h5>Distanza</h5><div class="slidecontainer"><input type="range" min="1" max="50" v-model="distanceFilter" class="slider" id="myRange"></div></div>
      </div> 
    </div>

    <div class="container" >
      <div class="row">
            <!-- Col -->
            <div class="col d-flex">
                <!-- Card -->
              <div class="card mx-sm-auto mx-md-0" v-for="Print in filteredApartments" :key="Print.id">
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
export default {
  name: 'SearchPage',
  data() {
    return {
      distanceFilter: 20,
      roomsNumber: 1,
      bedsNumber: 1,
      advancedFilter: [],
      currentPosition: this.$route.params.currentPosition,
      allSearchedAparments: this.$route.params.filtered,
      services: this.$route.params.services,
    }
  },
  computed: {
    filteredApartments() {  
      let filteredArray = [];

      this.allSearchedAparments.forEach((apartment)=> {
        let distanceFromSearch = this.getDistance(parseFloat(this.currentPosition.lat), parseFloat(this.currentPosition.lon), parseFloat(apartment.latitude), parseFloat(apartment.longitude));
        if( distanceFromSearch < this.distanceFilter &&
        apartment.room_number >= this.roomsNumber &&
        apartment.bed_number >= this.bedsNumber) {
          apartment.distance = distanceFromSearch;
          filteredArray.push(apartment);
        }
      });

      filteredArray = filteredArray.sort((a, b) => a.distance - b.distance);

      if(this.advancedFilter.length > 0) {
        const advancedFilteredArray = [];

        filteredArray.forEach((apartment) => {

          let apartmentServices = [];
          apartment.service.forEach((singleService)=>{
            apartmentServices.push(singleService.name);
          });

          if(this.isTrue(this.advancedFilter, apartmentServices)){
            advancedFilteredArray.push(apartment);
          }
        });
        return advancedFilteredArray;
      };
      return filteredArray;
    }
  },
  methods: {
    getDistance(latitude1,longitude1,latitude2,longitude2){ 
      // R: raggio della terra (paragonabile ad una sfera) in chilometri
      let R = 6371;
      let deltaLat = this.degreeToRadians(latitude1 - latitude2);
      let deltaLon = this.degreeToRadians(longitude1 - longitude2);

      let lat1 = this.degreeToRadians(latitude1);
      let lat2 = this.degreeToRadians(latitude2);

      var a = Math.sin(deltaLat/2) * Math.sin(deltaLat/2) +
      Math.cos(lat1) * Math.cos(lat2) * Math.sin(deltaLon/2) * Math.sin(deltaLon/2);

      var c = 2 * Math.atan2(Math.sqrt(a),Math.sqrt(1-a));
      var d = R * c;

      return d;
    },
    degreeToRadians(degrees)
    {
      var pi = Math.PI;
      return degrees * (pi/180);
    },

    isTrue(arr, arr2){
      return arr.every(i => arr2.includes(i));
    },

    clickHandler(e,advancedFilter) {
      let arr = this.advancedFilter;
      // e.target.classList.toggle('active');
      if(arr.includes(e.target.value)) {
        arr = arr.filter(item => item !== e.target.value);    
      } else {
        arr.push(e.target.value);
      }

      this.advancedFilter = arr;
    }
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

    // h4 {
    //     font-weight: bold;
    // }

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
    border: 2px solid black;
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
    width: 100%;
    
    #myRange{
      width: 100%;
    }
  }

  .disabled{
    color : darkGray;
    font-style: italic;
    border: 2px solid darkGray;
    /*property for disable input element like*/
    pointer-events: none;
  }
</style>