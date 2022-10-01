<template>
  <div>
    <div>
      <h2>Servizi aggiuntivi</h2>
      <ul>
        <li v-for="service in services" :key="service.id" >
            {{ service.name }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SearchPage',
  data() {
    return {
      distanceFilter: 20,
      advancedFilter: [],
      currentPosition: this.$route.params.currentPosition,
      allSearchedAparments: this.$route.params.filtered,
      services: this.$route.params.services
    }
  },
  computed: {
    filteredApartments() {
      
      let filteredArray = [];

      this.allSearchedAparments.forEach((apartment)=> {
        if(this.getDistance(parseFloat(this.currentPosition.lat), parseFloat(this.currentPosition.lon), parseFloat(apartment.latitude), parseFloat(apartment.longitude)) < this.distanceFilter) {
            this.filteredArray.push(apartment);
        }
      })

      if(this.advancedFilter.length > 0) {
        let advancedFilteredArray = [];

        filteredArray.forEach((apartment) => {
          if(!this.checkElementsinArray(apartment.service.name, this.advancedFilter)){
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

    checkElementsinArray(fixedArray,inputArray){
    var fixedArraylen = fixedArray.length;
    var inputArraylen = inputArray.length;
    if(fixedArraylen<=inputArraylen)
    {
        for(var i=0;i<fixedArraylen;i++)
        {
            if(!(inputArray.indexOf(fixedArray[i])>=0))
            {
                return false;
            }
        }
    }
    else
    {
        return false;
    }
    return true;
  }

  }
}
</script>

<style>

</style>