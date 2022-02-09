<template>
    <Menu  />

    <div class="barra mb-4"></div>
 
    <barra-menu/>
    <listar-numeros/>
</template>
<!-- 

  <div id="nav">
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>
  </div>
  <router-view />
</template> -->

<script>
import Menu from './components/Menu';
import BarraMenu from './components/BarraMenu';
import listarNumeros from './components/ListarNumeros';
import {provide} from 'vue';

export default{
  components:{
    Menu,
    BarraMenu,
    listarNumeros
  },
  setup() {
     let url ="consumoApi.php"; // PRODCUCCION

      provide('url', url);
  },
}
</script>

<style  scoped>
 
  .barra{
    top: 90px;
    padding: 1rem;
    background-color:white;
    background: linear-gradient(to bottom right,rgb(161, 202, 36), rgb(134, 150, 90));
    height: 60px;
    display: block;
    position:sticky; 
  }


</style>