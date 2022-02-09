<template>
    <div class="grid mt-5">
        <div class="col-8 col-offset-2 container listarNumeros">
            <p>EUROJACKPOT RESULTS & WINNING NUMBERS</p>
            <hr>

            <h6>EuroJackpot Results for {{dateDrawin}}</h6> 
            <button @click="api">Results</button>
            <br>
            <div class="mt-4  numbersWin">
                <span v-for="(num, index) in numbers" :key="index">
                 <!--   <p>indice {{index}} - {{num}} - </p>-->
                    <span v-if="num !== '+'">
                       <Button  class="p-button-rounded p-button-outlined ml-1">{{num}}</Button> 
                    </span>
                    <span v-else-if="num === '+' " >
                        <!-- <i class="bi bi-plus-circle"></i> -->
                       <Button  class="p-button-rounded p-button-warnin ml-1 ">{{num}}</Button> 
                    </span>
                </span>     
            </div>
        </div>
        <div class="col-6 col-offset-2 " >
            <table class="table">
                <thead>
                    <th>Tier</th>
                    <th>Match</th>
                    <th>Winners</th>
                    <th>Amount</th>
                </thead>
                <tbody >
                    <tr v-for="win, idx in odds" :key='idx'>
                        <td>{{roman[idx]}}</td>
                        <td>{{match[idx]}}</td>
                        <td>{{win.winners}}x</td>
                        <td>{{win.prize/100}}</td>
                    </tr>
                </tbody>
            </table>       
        </div>
        <div class="col-4"></div>
    </div>
</template>



<script>
    import {ref, onMounted, inject} from 'vue';
 //   import cors from 'cors';


    export default {

        setup() {

            const url = inject('url');
            let numbers = ref([]);
            let odds = ref({});
            let dateDrawin = ref();

            const match = ref(['5 numbers + 2 Euronumbers', '5 numbers + 1 Euronumbers','5 numbers + 0 Euronumbers', '4 numbers + 2 Euronumbers',
                        '4 numbers + 1 Euronumbers', '4 numbers + 0 Euronumbers','3 numbers + 2 Euronumbers', '2 numbers + 2 Euronumbers',
                        '3 numbers + 1 Euronumbers', '3 numbers + 0 Euronumbers','1 numbers + 2 Euronumbers', '2 numbers + 1 Euronumbers']);

            const roman = ref(['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII']);


            const fillTable = (odds) => {
                let newOdds = [];
                
                for (const key in odds) {
                    if (Object.hasOwnProperty.call(odds, key)) {
                        newOdds.push( odds[key]);
                    }
                }
                
                const result = newOdds.filter(el=> el.prize !== 0);
                
                result.sort(function (a, b) {
                    if (a.prize > b.prize) {
                        return -1;
                    }
                    if (a.prize < b.prize) {
                        return 1;
                    }
                    return 0;
                });


                return result;
            }


            //  WITH FETCH FAIL
            //  const api = async () => {
            //     try {
            //         let res = await fetch('api.json')
            //         json = await res.json();
            //         console.log(json);

            //     }catch(err){
            //         console.log(err.statusText )
            //     }
            // }

        //    const api = async () => {
            // const api =  () => {
            //     try {
            //         console.log("Ingreso");
            //        // const res = await fetch('http://www.lottoland.com/api/drawings/euroJackpot')
            //         const res =  fetch('http://www.lottoland.com/api/drawings/euroJackpot')
            //         console.log('res ',res);
            //         const data =  res.json();
            //        // const data = await res.json();
            //         console.log(data);
            //     } catch (err) {
            //         let message = err.statusText || "Ocurrio un error";
            //     }
            // }
  

            //  error of Cors  PHP CON AXIOS  - Work with local api
             const api =  async() => {    
                
                await axios.get('api.json')
                    .then(response=>{
                        const dato = response.data;
             
                        // --------------------------------------------- numbers drawin

                        for (let index = 0; index <10; index++) {
                    
                            if(dato.last.numbers[index] !== undefined){
                                numbers.value.push(dato.last.numbers[index]);
                            }else{
                                break
                            }
                        }  	
                        numbers.value.push('+');
                        // ---------------------------------------------- eruro Number drawin
                        for (let index = 0; index <10; index++) {
                        
                            if(dato.last.euroNumbers[index] !== undefined){
                                 numbers.value.push(dato.last.euroNumbers[index]);
                            }else{
                              break
                            }
                        }  	


                     //   console.log('Numeros win ', numbers.value)
                     //   console.log('Numeros ext ', euroNumbers.value)
                        // ------------------------------------------------------ date drawin
                        const year =  dato.last.date.year,
                            month =   dato.last.date.month === 0 ? 0 : dato.last.date.month -1 ,
                            day =  dato.last.date.day ;
                        dateDrawin.value = new Date( year, month, day).toDateString();
                //       console.log(year, month, day)

                        // ------------------------------------------------------ extract win person

                        odds.value = fillTable(dato.last.odds);

                })
                .catch(function (error) {
                    console.log(error.response);
                })
            };

            return{dateDrawin, api, numbers, dateDrawin, odds, match, roman}
        }
    };
</script>

<style scoped>
    .listarNumeros{
        margin-top: 15vh;

    }

    p{
        font-size: 18px;
        font-family: "KievitWebProBold";
        font-weight: bold;

    }

    .block{
        display: inline-block;
        flex-direction: row;
        flex-wrap: nowrap;
    }

    .numbersWin {
    
        position: relative;
        animation-name: numberRun;
        animation-duration: 6s;
        overflow:hidden;
    }
        
    @keyframes numberRun {
        from {right: -1200px;}
        to {right: 0px;}
    }
    

    /* ------------------------------------  */ 
/*     table {
        border: 2px solid #070808;
        border-radius: 3px;
        background-color: #fff;
    }

    th {
        background-color:#fff;
        color: rgba(0, 0, 0, 0.66);
        cursor: pointer;
    }

    td {
       background-color: #f9f9f9;
    }

    th, td {
       min-width: 120px;
        padding: 10px 20px;
    }
 */


</style>