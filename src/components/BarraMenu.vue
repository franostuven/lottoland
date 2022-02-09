<template>
  <nav class="grid shadow-5 menu">
      <div class="col-6 col-offset-3 container ">
          <button type="button" class="btn">EuroJackpot</button>
          <button type="button" class="btn sorteo" >EuroJackpot Result & Prize Breakdown</button>
          <button type="button" class="btn">Help & FAQ</button>
      </div>
  </nav>
</template>

<script>
export default {
  //   
   setup() {

  


  }
  
};
</script>

<style>
    .menu{
        top: 150px;
        height: 20vh;
        position: sticky;  /* Lo que hace sticky es que cuando el header llegue a la posicion definida en top, quede fijo como pedgada, tipo fixed  */
        text-decoration: none;
        background-color: white;
        align-items: center;
    }

        /* border-color: black; */
    .sorteo {
        background: var(--orange-200);    
    }

    .fondo{
        background: var(--orange-200);
    }
    .btn:hover {
        font-weight: bold;
        color: var(--bluegray-900);
        background-color: var(--green-300);
    }
</style>