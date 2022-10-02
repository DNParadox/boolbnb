<template>
  <div>
    <div id='map' class="map" style="width:100%;height:400px" ref="mapRef"></div> 
  </div> 
</template>

<script>

import { onMounted, ref } from 'vue'

export default {
  name: 'Map', 
  props: {
    center: Array,
  },
  setup() { 

    const mapRef = ref('mapRef'); 

    onMounted(() => { 

      const tt = window.tt; 

      var map = tt.map({ 

        key: 'lktzYJVNxK8wkz5eqXTI2g6PVqM9Gcmq', 

        container: mapRef.value, 
        center: this.center,
        style: 'tomtom://vector/1/basic-main',
        zoom: 15, 

      }); 

      map.addControl(new tt.FullscreenControl()); 

      map.addControl(new tt.NavigationControl());  

    })
    function addMarker(map) { 

      const tt = window.tt; 

      var location = this.center; 

      var popupOffset = 25; 



      var marker = new tt.Marker().setLngLat(location).addTo(map); 

      var popup = new tt.Popup({ offset: popupOffset }).setHTML("Your address!"); 

      marker.setPopup(popup).togglePopup(); 

    }
    return { 

      mapRef, 

    }; 

  } 
}
</script>

<style> 

#map { 
  border-radius: 15px;
  box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

</style>