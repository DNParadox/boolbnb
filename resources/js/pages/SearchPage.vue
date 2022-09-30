<template>
    <div>
      <input list="autocomplete" type="text" placeholder="Search..." v-model="currentSearch" @input="autocomplete()">
      <datalist id="autocomplete">

      </datalist>
      <input type="button" value="submit" @click="printsearch()">

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
    return{
      currentSearch: '',
      currentApartments: [],
      currentSearchPosition: null,
      services: []
    }
  },
  methods:{
    getApartment(){ 
      axios.get('http://127.0.0.1:8000/api/search').then((response)=>{
      
      
      response.data.results.data.forEach((apartment) =>{
        this.currentApartments.push(apartment);
      })
      } 
    )},

    getServices(){
      axios.get('http://127.0.0.1:8000/api/services').then((response)=>{
      console.log(response)
      response.data.results.forEach((service) =>{
        this.services.push(service);
      });
      } 
    )},

    autocomplete(){
      let dataList = document.getElementById('autocomplete');
      console.log(this.currentSearch);
      let suggestions = [];
      axios.get(`https://api.tomtom.com/search/2/geocode/${this.currentSearch}.json?key=lktzYJVNxK8wkz5eqXTI2g6PVqM9Gcmq`)
      .then((response)=>{
        if(response.data.results.length > 0){
          
          for(let i = 0; i < 4; i++) {
        
            let addressHint = `${response.data.results[i].address.streetName}, ${response.data.results[i].address.streetNumber ? `${response.data.results[i].address.streetNumber},` : ""} ${response.data.results[i].address.municipality}, ${response.data.results[i].address.countrySubdivision}`;

            if(response.data.results[i].address.streetName) {
              suggestions.push(addressHint);
            }
          }
          
          dataList.innerHTML = "";

          suggestions.forEach((suggestion) => {
            dataList.innerHTML += `<option>${suggestion}</option>`;
          });

          this.searchedPoint = response.data.results[0].position;
        }

      });
    }
  },
  mounted(){
    this.getApartment(),
    this.getServices()
  }
}
</script>