<template>
  <div>
    <div id='map' ref="mapRef"></div> 
  </div> 
</template>

<script>

import { onMounted, ref } from 'vue'

export default {
  name: 'Map', 

  setup() { 

    const mapRef = ref('mapRef'); 

    onMounted(() => { 

      const tt = window.tt; 

      var map = tt.map({ 

        key: 'lktzYJVNxK8wkz5eqXTI2g6PVqM9Gcmq', 

        container: mapRef.value, 
        center: [14.44444,41.044444],
        style: 'tomtom://vector/1/basic-main',
        zoom: 15, 

      }); 

      map.addControl(new tt.FullscreenControl()); 

      map.addControl(new tt.NavigationControl()); 
      
      var marker = new tt.Marker().setLngLat(center).addTo(map); 
      var popup = new tt.Popup({ offset: popupOffset }).setHTML("Your address!");
      marker.setPopup(popup).togglePopup();  

    })
    return { 

      mapRef, 

    }; 

  } 
}
</script>

<style> 

#map { 

  height: 50vh; 

  width: 50vw; 

} 

</style>