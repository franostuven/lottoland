<template>
  <header class="container flex justify-content-between header" >
      <div  class="flex align-items-start " >
        <img src="../assets/img/lottoLand.svg" alt="" width="100" height="70" class="pl-2" >
      </div>

      <div class="header-ingreso pr-2">
          <span><i class="bi bi-search" ></i></span> |
          <a href=""><i class="pi pi-user mr-2" ></i>Login</a> |
          <a href=""><i class="pi pi-wallet mr-2" ></i>Register</a> |
          <a href=""><i class="pi pi-shopping-cart"  badge="0"></i></a> 
      </div>
  </header>
</template>

<script setup>
/*      import { defineProps } from "vue";

    const props = defineProps({
        todo: Object
    })
     */
</script>


<style scoped>

  .header{
      padding: 8px;
      height: 90px;
      color:var(--green-500) ;
      top: 0;
      position: fixed;
      z-index: 999;
      background-color:white
/* position: sticky; */ /* Lo que hace sticky es que cuando el header llegue a la posicion definida en top, quede fijo como pedgada, tipo fixed */
    
  }
      /* background-color: var(--surface-300); */

  .header-ingreso{
      margin-top: 12px;
      margin-right: 5px;
      max-width: 1500px;
  }

  .header-ingreso>a{
    color: inherit;
  }



</style>