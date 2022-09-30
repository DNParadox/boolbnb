<template>
    <div>
      <input list="autocomplete" type="text" placeholder="Search..." v-model="currentSearch" @input="autocomplete()">
      <datalist id="autocomplete">

      </datalist>
      <input type="button" value="submit" @click="printsearch()">
    </div>
</template>

<script>
export default {
  name: 'SearchPage',
  data() {
    return{
      currentSearch: '',
    }
  },
  methods:{
    getApartment(){ 
      axios.get('http://127.0.0.1:8000/api/search').then((response)=>{
        
        console.log(response.data.results.data)
      } 
    )},
    printsearch(){
      console.log(this.currentSearch)
    },
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
        }

      });
    }
  },
  mounted(){
    this.getApartment();
  }
}
</script>