

<template>
  <h1>Requisições</h1>
  <button @click="fazerGet">Fazer Get</button>
  <br>

  <form @submit.prevent="fazerPost">
    <input v-model="nome">
<button type="submit" @click="fazerPost">Fazer Post</button>
  </form>
  

  <li v-for="product in products">
    <p>{{ product.nome }}</p>
  </li>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      products: [],
      nome:"",

    }
  },

  methods: {
    fazerGet() {
      axios
        .get('http://localhost/meus_projetos/modulo_2_semana_1/aula_3/variaveis_super_globais.php')
        .then((response) => {
          this.products = response.data.products
        })
        .catch(() => {
          alert('Houve um erro')
        })
    },

    fazerPost() {
      axios.post(
        'http://localhost/meus_projetos/modulo_2_semana_1/aula_3/variaveis_super_globais.php',
        {
          nome:this.nome
        }
      )
      .then(response =>{
        alert("Cadastrado com sucesso")
      })
      .catch((error)=>{
        alert(error.response.data.error)
      })
    }
  }
}
</script>


