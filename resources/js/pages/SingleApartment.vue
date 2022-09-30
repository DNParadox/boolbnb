<template>
    <div class="single">
        <div class="container">
            <h2 class="mt-3">Appartamento 38. Nuovissimo appartamento esclusivo per famiglie</h2>
            <div class="address">Via Wörtherberg, Salisburgo</div>
            <div class="image">
                <img class="w-75" src="https://a0.muscache.com/im/pictures/miso/Hosting-52831868/original/fc07e2be-ff78-425f-8e35-1d0bda1fd9ac.jpeg?im_w=720" alt="immagine">
            </div>

            <div class="bottom-part">
                <div class="left">
                    <div class="info">
                        <span>2 camere da letto</span>
                        <span>5 letti</span>
                        <span>1 bagno</span>
                        <span>80 metri quadri</span>
                    </div>

                    <hr>

                    <div class="description">
                        <p>
                            Meraviglioso ed esclusivo appartamento adatto alle famiglie con ampia terrazza coperta e giardino privato, con vista sulle montagne panoramiche.
                            Goditi la serenità a pochi passi dal bellissimo borgo di Rauris e dai suoi negozi e ristoranti tradizionali.
                        </p>
                    </div>

                    <hr>

                    <h4>Cosa troverai</h4>
                    <div class="services">
                        <span><i class="fa-solid fa-wifi"></i> wi-fi</span>
                        <span><i class="fa fa-car" aria-hidden="true"></i> Posto macchina</span>
                        <span><i class="fas fa-swimming-pool"></i> Piscina</span>
                        <span><i class="fas fa-water"></i> Sauna</span>
                        <span><i class="fas fa-dumbbell"></i> Palestra</span>
                        <span><i class="fas fa-dog"></i> Animali ammessi</span>
                    </div>

                    <hr>
                </div>

                <div class="right">
                    <div class="contact">
                        <h2>Contatta l'host</h2>
                        <form>
                            <div class="mb-3">
                                <label for="user-mail" class="form-label">Mail</label>
                                <input v-model="userMail" type="email" class="form-control" id="user-mail">
                            </div>
                            <div class="mb-3">
                                <label for="user-message" class="form-label">Messaggio</label>
                                <textarea v-model="userMessage" class="form-control" id="user-message" rows="5"></textarea>
                            </div>

                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>

            </div>

            
        </div>
    </div>
</template>

<script>
export default {
    name: 'SingleApartment',
}
</script>

<style lang="scss" scoped>
.container {
    .address {
      color: grey; 
      margin-bottom: 20px; 
    }

    .image {
        img{
            border-radius: 15px;
        } 
    }

    .bottom-part {
        display: flex;
        justify-content: space-between;

        .left {
            width: 50%;

            .info {
                margin-top: 25px;
                font-size: 18px; 
                span:not(:last-child)::after {
                    content: ' | ';
                }
            }

            hr {
                border-color: lightgrey;
            }

            .description {
                font-size: 18px;
            }

            .services {
                font-size: 18px;
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;

                span {
                    flex-basis: 50%;
                    margin-bottom: 15px;
                }
                
            }
        }

        .right {
            padding-top: 60px;
            padding-left: 50px;
            width: 40%;

            .contact {
                border: 1px solid lightgray;
                border-radius: 15px;
                padding: 10px;
            }
        }
    }
    
}
</style>