<template>
<div class="width">
    <div class="mb-4 d-flex justify-content-between align-items-center research-menu">
        <div class="logo">
            <img src="../../../public/storage/airbnb.png" alt="BoolBnB">
            <span class="logo-text">Boolbnb</span>
        </div>
        <div class="search">
            <input class="bar" list="autocomplete" type="text" placeholder="Inserisci una città o un indirizzo...">
            <button class="ms_btn" type="submit"><i class="fa-solid fa-magnifying-glass icon"></i></button>

        </div>
        <div class="user" @click="menu_show = !menu_show">
            <i class="fa-solid fa-user login"></i>
            <div v-if="menu_show">
                <div class="menu">
                    <i class="fa-solid fa-caret-up"></i>
                    <ul class="menu-login">
                        <li><a href="http://127.0.0.1:8000/logged/apartments"><span class="ml-2">Accedi</span></a></li><hr>
                        <li><a href="http://127.0.0.1:8000/logged/apartments"><span class="ml-2">Diventa un host</span></a></li>
                        <li><span class="ml-2">Proponi un'esperianza</span></li>
                        <li><span class="ml-2">Assistenza</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="single">
        <div class="container mt-3" v-if="apartment">
            <h1 class="mt-3">{{apartment.title}}</h1>
            <div class="d-flex justify-content-between">
                <span><span class="mr-1"><i class="fa-sharp fa-solid fa-star fa-xs mr-1"></i>{{ randomValutation() }}</span> · <span><a href="">{{ randomRecensioni() }} recensioni</a></span> · <span><a href="">{{apartment.address}}</a></span></span>
                <span><span class="box-share"><i class="fa-solid fa-arrow-up-from-bracket"></i> Condividi</span><span class="box-share"><i class="fa-regular fa-heart"></i> Salva</span></span>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <div class="image">
                        <img :src="apartment.photo" class="card-img-top" alt="apartment.title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div v-if="center">
                        <Map :center="center" />
                    </div>
                </div>
            </div>

            <!-- Bottom part -->
            <div class="row bottom-part">
                <div class="col-md-8 left">
                    <!-- Title and Host -->
                    <h3 class="mt-3">{{apartment.title}} - Host: {{user.name}}</h3>
                    <!-- More info -->
                    <div class="info">
                        <span>4 ospiti</span>
                        <span>{{ apartment.room_number }} camere da letto</span>
                        <span>{{ apartment.bed_number }} letti</span>
                        <span>{{ apartment.bathroom }} bagni</span>
                        <span>{{ apartment.square_meters }} metri quadri</span>
                    </div>
                    <hr>                        
                    
                    <!-- Project and other -->
                    <div class="mb-2 d-flex alignment-info">
                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 24px; width: 24px; fill: currentcolor;" aria-hidden="true" role="presentation" focusable="false"><path d="m2 4c0-.85216986.98551359-1.29743382 1.62252676-.78322518l.08458002.0761184 25.00000002 24.99999998c.6025751.6025751.2205609 1.6142876-.5934759 1.7011235l-.1136309.0059833h-25c-.51283584 0-.93550716-.3860402-.99327227-.8833789l-.00672773-.1166211zm2 2.415v21.585h21.585l-4.085-4.086-1.7928932 1.7931068-1.4142136-1.4142136 1.7921068-1.7938932-2.585-2.585-1.7928932 1.7931068-1.4142136-1.4142136 1.7921068-1.7938932-2.585-2.585-1.7928932 1.7931068-1.4142136-1.4142136 1.7921068-1.7938932-2.585-2.585-1.79289322 1.7931068-1.41421356-1.4142136 1.79210678-1.7938932zm3 10.585c0-.8521699.98551359-1.2974338 1.62252676-.7832252l.08458002.0761184 7.00000002 7c.6025751.6025751.2205609 1.6142876-.5934759 1.7011235l-.1136309.0059833h-7c-.51283584 0-.93550716-.3860402-.99327227-.8833789l-.00672773-.1166211zm5.2928932-15.20710678c.360484-.36048396.927715-.3882135 1.3200062-.08318861l.0942074.08318861 15.5 15.49999998c.0578584.0578584.1082864.1224881.1502461.1923778l.0564586.1085905 2 4.5c.3320921.7472072-.3209586 1.5376556-1.0949471 1.3900057l-.1062123-.0260409-5-1.5c-.1188824-.0356647-.2297327-.0930392-.3270948-.1688646l-.0926641-.0818549-15.49999998-15.50000002c-.36048396-.36048396-.3882135-.92771502-.08318861-1.32000622l.08318861-.09420734zm-3.2928932 17.62210678v3.585h3.585zm7.25-12.251-1.585 1.585 11.365 11.366 2.672.801-1.04-2.339zm-3.25-3.249-1.585 1.585 1.835 1.834 1.585-1.585z"></path></svg><div class="ml-2"><span class="sub-title">Progettato da</span><div class="sub-title-2">Ibuku Bamboo Architecture and Design</div></div>
                    </div>
                    <div class="mb-3 d-flex alignment-info">
                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 24px; width: 24px; fill: currentcolor;" aria-hidden="true" role="presentation" focusable="false"><path d="m1.66675 2.67728c0-1.29010774 1.19757945-2.22892485 2.43214873-1.95293212l.14254843.03728562 11.76455284 3.5293665 11.7747926-3.3852093c1.1836744-.3403064 2.3638086.45712676 2.5321485 1.63303369l.0152796.14287691.0051793.1462187v23.09468c0 .8279727-.5091718 1.5640524-1.2698418 1.8619846l-.155411.0536419-12.6207 3.7862c-.1499506.0449851-.3078242.0539821-.4609439.026991l-.1137505-.026991-12.62071315-3.786204c-.79308169-.2379357-1.35183119-.937138-1.41857691-1.7513494l-.00671274-.1642731zm1.99999664.00000464v23.24528886l12.33325336 3.6994265 12.3334-3.6994076v-23.0946724l-12.0569924 3.46639925c-.1474472.0423911-.3021582.05014891-.4521925.02334213l-.1114623-.02658488zm21.66607876 17.47821536v2.088l-9.333 2.8v-2.087zm0-6v2.088l-9.333 2.8v-2.087zm0-5.999v2.087l-9.333 2.8v-2.087z"></path></svg><div class="ml-2"><span class="sub-title">In primo piano</span><div class="sub-title-2">Ibuku Bamboo Architecture and Design</div></div>
                    </div>
                    <div class="mb-2 d-flex alignment-info">
                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 24px; width: 24px; fill: currentcolor;" aria-hidden="true" role="presentation" focusable="false"><path d="m11.6667 0-.00095 1.666h8.667l.00055-1.666h2l-.00055 1.666 6.00065.00063c1.0543745 0 1.9181663.81587127 1.9945143 1.85073677l.0054857.14926323v15.91907c0 .4715696-.1664445.9258658-.4669028 1.2844692l-.1188904.1298308-8.7476886 8.7476953c-.3334303.3332526-.7723097.5367561-1.2381975.5778649l-.1758207.0077398h-12.91915c-2.68874373 0-4.88181754-2.1223321-4.99538046-4.7831124l-.00461954-.2168876v-21.66668c0-1.05436021.81587582-1.91815587 1.85073739-1.99450431l.14926261-.00548569 5.999-.00063.00095-1.666zm16.66605 11.666h-24.666v13.6673c0 1.5976581 1.24893332 2.9036593 2.82372864 2.9949072l.17627136.0050928 10.999-.0003.00095-5.6664c0-2.6887355 2.122362-4.8818171 4.7832071-4.9953804l.2168929-.0046196 5.66595-.0006zm-.081 8-5.58495.0006c-1.5977285 0-2.9037573 1.2489454-2.9950071 2.8237299l-.0050929.1762701-.00095 5.5864zm-18.586-16-5.999.00062v5.99938h24.666l.00065-5.99938-6.00065-.00062.00055 1.66733h-2l-.00055-1.66733h-8.667l.00095 1.66733h-2z"></path></svg><div class="ml-2"><span class="sub-title">Cancellazione gratuita entro il giorno 30</span></div>
                    </div>
                    
                    <hr>
                    <!-- Address -->
                    <div class="address"><i class="fa-solid fa-location-dot mr-1"></i>{{apartment.address}}</div>

                    <hr>
                    <!-- Protection -->
                    <div class="cover-services">
                        <img src="https://a0.muscache.com/im/pictures/54e427bb-9cb7-4a81-94cf-78f19156faad.jpg" alt="cover-image">
                        <p>Ogni prenotazione include una protezione gratuita in caso di cancellazione da parte dell'host, di inesattezze dell'annuncio e di altri problemi come le difficoltà in fase di check-in.</p>
                        <a href="#">Per saperne di più</a>
                    </div>

                    <hr>
                    <!-- Description -->
                    <div class="description">                        
                        <p>{{apartment.description}}</p>
                    </div>

                    <hr>
                    <!-- Services -->
                    <h4>Cosa troverai</h4>
                    <div class="services">
                        <div v-for="service in apartment.service" :key="service.id"><i :class="service.icon"></i> {{ service.name }}</div>
                    </div>

                   
                </div>

                <div class="col-md-4 right">
                    <div v-if="send">
                        <div class="alert alert-success" role="alert">
                            Messaggio inviato con successo
                        </div>  
                    </div>
                    <div class="contact">
                        <form @submit.prevent="sendMessage">
                            <h2>Contatta l'host</h2>
                            <div class="mb-3">
                                <label for="user-mail" class="form-label">Mail *</label>
                                <input type="email" class="form-control" id="user-mail" v-model="email" required="required">
                            </div>
                            <div class="mb-3">
                                <label for="user-message" class="form-label">Messaggio *</label>
                                <textarea class="form-control" id="user-message" v-model="note" rows="5" required="required"></textarea>
                            </div>
                            <input type="submit" class="btn color-btn-message">
                        </form>        
                    </div>
                </div>
            </div>
        </div>

        <hr>
        
        <div class="bkg-bottom">
            <div class="container">

                <!-- Review Progress -->
                <div class="mt-3 review">
                    <span class="review-title"><i class="fa-sharp fa-solid fa-star fa-xs mr-1"></i>{{ star }}</span> · <span class="review-title"><a href="">{{ recensioni }} recensioni</a></span>
                    <div><span class="review-subtitle">Scopri di più sulle recensioni</span><i class="fa-solid fa-circle-info ml-2"></i></div>
                    <div class="container p-0 mt-2">
                        <div class="row">                    
                            <div class="col-lg-6 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col">
                                        Pulizia
                                    </div>
                                    <div class="col">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col">
                                        Precisione
                                    </div>
                                    <div class="col">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">                    
                            <div class="col-lg-6 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col">
                                        Comunicazione
                                    </div>
                                    <div class="col">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col">
                                        Posizione
                                    </div>
                                    <div class="col">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">                    
                            <div class="col-lg-6 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col">
                                        Check-in
                                    </div>
                                    <div class="col">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 86%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col">
                                        Qualità\prezzo
                                    </div>
                                    <div class="col">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 79%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Review Progress -->

                <!-- Review List -->
                <div class="review-list row pt-5">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div style="height: 40px; width: 40px;">
                                <img class="am-img-profile" alt="Tom" src="https://a0.muscache.com/im/pictures/user/aa78da6c-f963-4f5c-a2a7-a2caa33094d0.jpg?im_w=240" data-original-uri="https://a0.muscache.com/im/pictures/user/aa78da6c-f963-4f5c-a2a7-a2caa33094d0.jpg?im_w=240">
                            </div>
                            <div class="am-info-profile">
                                <div class="am-name-profile">
                                    <strong>
                                        Tom
                                    </strong>
                                </div>
                                <div class="am-date-profile">
                                    settembre 2022
                                </div>
                            </div>
                        </div>
                        <div class="am-review-profile">
                            La posizione è semplicemente bella. Abbiamo trascorso un soggiorno fantastico e rilassante e speriamo tanto di tornare un giorno.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div style="height: 40px; width: 40px;">
                                <img class="am-img-profile" alt="Denise" src="https://a0.muscache.com/im/pictures/user/af7778f1-ceaf-440d-a66d-4d262f372fbd.jpg?im_w=240" data-original-uri="https://a0.muscache.com/im/pictures/user/af7778f1-ceaf-440d-a66d-4d262f372fbd.jpg?im_w=240">
                            </div>
                            <div class="am-info-profile">
                                <div class="am-name-profile">
                                    <strong>
                                        Denise
                                    </strong>
                                </div>
                                <div class="am-date-profile">
                                    agosto 2022
                                </div>
                            </div>
                        </div>
                        <div class="am-review-profile">
                            Abbiamo soggiornato in un gruppo di 6 persone e l'alloggio è spazioso e carino. Tutto quello di cui avremmo potuto avere bisogno era nella casa, incredibilmente lussuosa! Ci siamo divertiti e Per-Henrik e la famiglia sono stati gentili e disponibili quando necessario.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div style="height: 40px; width: 40px;">
                                <img class="am-img-profile" alt="Saskia" src="https://a0.muscache.com/im/pictures/user/43591778-eeaf-4046-8b29-c82cb159ddcb.jpg?im_w=240" data-original-uri="https://a0.muscache.com/im/pictures/user/43591778-eeaf-4046-8b29-c82cb159ddcb.jpg?im_w=240">
                            </div>
                            <div class="am-info-profile">
                                <div class="am-name-profile">
                                    <strong>
                                        Saskia
                                    </strong>
                                </div>
                                <div class="am-date-profile">
                                    giugno 2022
                                </div>
                            </div>
                        </div>
                        <div class="am-review-profile">
                            La casa di Per-Henriks è fantastica. Situato su un'isola, con viste favolose e molto tranquille. C'è una sauna, con un terrazzo sull'acqua. È anche un posto molto piacevole per cenare e rilassarsi. È disponibile una canoa per esplorare parte dell'enorme lago. I negozi di alimentari non sono lontani in auto e ci sono molti ristoranti a Ostersund. Splendide...
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div style="height: 40px; width: 40px;">
                                <img class="am-img-profile" alt="Leonie" src="https://a0.muscache.com/im/pictures/user/bf77f6ba-fcb5-4e70-a71a-91e720ee7d38.jpg?im_w=240" data-original-uri="https://a0.muscache.com/im/pictures/user/bf77f6ba-fcb5-4e70-a71a-91e720ee7d38.jpg?im_w=240">
                            </div>
                            <div class="am-info-profile">
                                <div class="am-name-profile">
                                    <strong>
                                        Leonie
                                    </strong>
                                </div>
                                <div class="am-date-profile">
                                    giugno 2022
                                </div>
                            </div>
                        </div>
                        <div class="am-review-profile">
                            La casa sull'isola privata è la fuga perfetta dalla città per un paio di giorni o anche una settimana. La vista sul lago è magica e soprattutto in estate, quando c'è la luce del giorno quasi 24 ore è un'esperienza davvero speciale.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div style="height: 40px; width: 40px;">
                                <img class="am-img-profile" alt="Thom" src="https://a0.muscache.com/im/users/35290292/profile_pic/1433773070/original.jpg?im_w=240" data-original-uri="https://a0.muscache.com/im/users/35290292/profile_pic/1433773070/original.jpg?im_w=240">
                            </div>
                            <div class="am-info-profile">
                                <div class="am-name-profile">
                                    <strong>
                                        Thom
                                    </strong>
                                </div>
                                <div class="am-date-profile">
                                    febbraio 2022
                                </div>
                            </div>
                        </div>
                        <div class="am-review-profile">
                            La posizione è incredibile, un'isola privata con vista sul lago Storsjön. La sauna sul bordo del lago è semplicemente fantastica. La vista può tenerti occupato per tutto il giorno. Quando entri nella grande casa è chiaro che è necessario fare un po' di lavoro. Non è nel suo stato migliore. Le camere hanno un aspetto...
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center">
                            <div style="height: 40px; width: 40px;">
                                <img class="am-img-profile" alt="Maxime" decoding="async" elementtiming="LCP-target" src="https://a0.muscache.com/im/pictures/user/2733a740-735d-4e61-afeb-7d63a7c818f1.jpg?im_w=240" data-original-uri="https://a0.muscache.com/im/pictures/user/2733a740-735d-4e61-afeb-7d63a7c818f1.jpg?im_w=240">
                            </div>
                            <div class="am-info-profile">
                                <div class="am-name-profile">
                                    <strong>
                                        Maxime
                                    </strong>
                                </div>
                                <div class="am-date-profile">
                                    febbraio 2022
                                </div>
                            </div>
                        </div>
                        <div class="am-review-profile">
                            La casa di Per-Henrik è incredibile, prima hai la posizione, ogni mattina ti sveglierai con una vista mozzafiato sul lago. Il posto è molto calmo, perfetto per un buon riposo. Sei a breve distanza in auto da Ostersund e sei se ti piace sciare o fare attività. La casa è enorme e molto ben arredata. Non ti perdi nulla mentre soggiorni qui. Puoi cucinare come a...
                        </div>
                    </div>
                </div>
                <!-- END Review List -->

                <hr>

                <div class="pt-3">
                    <h4>
                        Da sapere
                    </h4>
                    <div class="row know">
                        <div class="col-md-4 pb-5">
                            <h5>
                                Regole della casa
                            </h5>
                            <ul>
                                <li><i class="fa-solid fa-clock"></i> Check-in: Dopo le ore 14:00</li>
                                <li><i class="fa-solid fa-clock"></i> Check-out: 10:00</li>
                                <li><i class="fa-solid fa-ban-smoking"></i> Non è consentito fumare</li>
                                <li class="d-flex"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 16px; width: 16px; fill: currentcolor;"><path d="M5.12 9.363l13.882 13.88c-.494.349-1.01.694-1.549 1.035L19.65 27.2a1.125 1.125 0 0 1-.433 1.7l-.111.043-.157.039-.04.006-.158.013H17v3h-2v-3h-1.75a1.125 1.125 0 0 1-1.117-1.264l.025-.131.067-.189.021-.045.103-.17 2.14-2.862C8.212 20.918 5 16.457 5 11c0-.556.041-1.103.12-1.637zm-1.413-7.07l26 26-1.414 1.414-26-26 1.414-1.414zM16 0c5.909 0 11 5.275 11 11 0 2.915-1.167 5.676-3.472 8.286L7.853 3.609A10.972 10.972 0 0 1 16 0zm6 7a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path></svg> Vietato organizzare feste/eventi</li>
                                <li><i class="fa-solid fa-paw"></i> È consentito portare animali domestici</li>
                                <li>
                                    <div class="pt-3">
                                        <strong class="other"><a href="#">Mostra altro</a> <i class="fa-solid fa-greater-than"></i></strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 pb-5">
                            <h5>
                                Salute e sicurezza
                            </h5>
                            <ul>
                            <li class="d-flex"><i class="fa-solid fa-hand-sparkles"></i> Si applicano le pratiche di sicurezza di Airbnb per l'emergenza COVID-19</li>
                                <li><i class="fa-solid fa-circle-question"></i> Rilevatore di monossido di carbonio non segnalato <strong class="other"><a href="#">Mostra altro</a></strong></li>
                                <li><i class="fa-solid fa-circle-question"></i> Allarme antincendio non segnalato <strong class="other"><a href="#">Mostra altro</a></strong></li>
                                <li>
                                    <div class="pt-3">
                                        <strong class="other"><a href="#">Mostra altro</a> <i class="fa-solid fa-greater-than"></i></strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 pb-5">
                            <h5>
                                Termini di cancellazione
                            </h5>
                            <p>
                                Questa prenotazione non è rimborsabile.
                            </p>
                            <p>
                                Leggi i termini di cancellazione completi dell'host, che si applicano anche in caso di malattia o disagi legati alla pandemia di COVID-19.
                            </p>
                            <div class="pt-3">
                                        <strong class="other"><a href="#">Mostra altro</a> <i class="fa-solid fa-greater-than"></i></strong>
                                    </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    
</template>

<script>
import Map from '../components/MapPage.vue' 
export default {
    name: 'SingleApartment',
    components: {
        Map
    },
    data() {
        return{
            apartment: null,
            center: null,
            email: '',
            note: '',
            send: false,
            user: null,
            recensioni: null,
            star: null,
            menu_show: false,
        }
    },
    methods: {
        getSinglePost() {
        axios.get('http://127.0.0.1:8000/api/contact/' + this.$route.params.id)
        .then((response) => {
            if(response.data.success){
                console.log(response);
                this.apartment = response.data.results;
                this.user = response.data.user;
                this.center = {lng: parseFloat(response.data.results.longitude), lat: parseFloat(response.data.results.latitude)};
            } else {
                this.$router.push({name: 'not-found'})
            }           
        })
        },
        sendMessage(){
            axios.post('http://127.0.0.1:8000/api/sendmessage/',{
                apartment_id: this.apartment.id,
                message: this.note,
                email: this.email,
            })
            .then((response) => {
                if(response.data.success){
                    console.log(response);
                    this.send = true;
                    setTimeout(this.sendInfo, 7000);
                    this.clearMessage();
                }          
            }) 
        },
        getCurrentUser(){
            axios.get('http://127.0.0.1:8000/users')
            .then((response) => {
                if(response.data.email){
                    this.email = response.data.email;
                }   
            })
        },
        clearMessage(){
            this.note = '';
        },
        sendInfo(){
            this.send = false;
        },
        randomValutation(){

            let value = Math.random() * (4.98 - 3.5) + 3.5;
            value = String(value).slice(0, 4);
            this.star = value;
            return value;
        },
        randomRecensioni(){
            let value = Math.floor(Math.random() * 1500) + 100;
            this.recensioni = value;
            return value;
        }
    },
    created(){
        this.getSinglePost();
        this.getCurrentUser();

    },
}
</script>

<style lang="scss" scoped>
.research-menu{
    margin-top: 20px;
    padding-inline: 15px;
    
    .logo{
        
        *{
            vertical-align: middle;
        }

        img{
            width: 40px;
        }

        .logo-text{
            margin-left: 6px;
            font-size: 24px;
            font-weight: 600;
            color: #ff385c;
        }  
    }
    
    .search {
        display: flex;
        justify-content: center;
        
        .bar {
            width: 300px;
            padding: 10px;
            border-radius: 7px 0 0 7px;
            border: 1px solid lightgray;
        }

        .ms_btn {
            padding: 10px 15px;
            background-color: #ff385c;
            color: white;
            border: none;
            border-radius: 0 7px 7px 0;
        }
    }

    .user{
        position: relative;

        .login{
            font-size: 22px;
            margin-right: 12px;
            padding: 8px;
            border: 2px solid #ff385c;
            border-radius: 20px;
            color: #ff385c;
        }

        .menu{
            margin-top: 10px;
            padding: 12px 0;
            position: absolute;
            z-index: 99999;
            right: 10px;
            left: -140px;
            border: 1px solid #939393;
            border-radius: 12px;
            background-color: #f2f2f2;

            i{
                position: absolute;
                top: -9px;
                right: 16px;
                color: #939393;
            }

            .menu-login{
                li{
                    padding-block: 5px;
                }
                li:hover{
                    background-color: #e3e3e3;
                } 
            }
        }
    }

}
.single{
    margin-bottom: 65px;

    h1{
        padding: 0;
        margin: 0;
        text-align: left;
    }
}

.cover-services{
    img{
        width: 16%;
        margin-block: 0.5rem 1.5rem;
    }

    a{
        text-decoration: underline;
    }
}

.alignment-info{
    align-items: center;

    .sub-title{
        font-weight: 700;
    }
    .sub-title-2{
        color: grey;
    }
}

.bkg-bottom {
    background-color: #f0f0f0;
    padding: 20px 0;
    margin-top: -17px;
    margin-bottom: -25px;
    border-top: 1px solid lightgray;
    
}

.container {
    
    .address {
      color: grey; 
      margin-bottom: 20px; 
    }

    .image {
        img{
            border-radius: 15px;
            object-fit: cover;
            height: 400px;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        } 
    }

    .map {
        width: 100%;
        height: 100%;
        
        
    }
    .mapboxgl-map {
        border-radius: 15px;
    }

    .bottom-part {
        display: flex;
        justify-content: space-between;
        padding: 30px 0 0;
        position: relative;

        .left {
            .info {
                font-size: 18px; 
                span:not(:last-child)::after {
                    content: ' · ';
                }
            }

            hr {
                border-color: lightgrey;
            }

            .description {
                font-size: 18px;
            }

            .services {
                font-size: 16px;
                display: flex;
                justify-content: flex-start;
                flex-wrap: wrap;

                span {
                    flex-basis: 50%;
                    margin-bottom: 15px;     
                } 
                div{
                    margin-right: 16px; 
                    width: 40%;
                }            
            }
        }

        .right {
            position: relative;
            .contact {
                position: sticky;
                top: 10%;
                border: 1px solid lightgray;
                border-radius: 15px;
                padding: 10px;
            }
        }
    }

    .box-share{
        padding: 5px 7px;
        margin-left: 8px;
        cursor: pointer;
        &:hover{
            background-color: rgb(244, 244, 244);    
            border-radius: 12px;
            
        } 
    }

    .color-btn-message{       
        color: white;
        background-color: #ff385c;
        width: 100%;
        margin-bottom: 0.6rem;
    }
    

    .review{
        .review-title{
            font-size: 20px;
            font-weight: 600;
        }

        .progress{
            height: 0.3rem;
            background-color: white;
            .progress-bar {
                display: flex;
                flex-direction: column;
                justify-content: center;
                overflow: hidden;
                color: #ffffff;
                text-align: center;
                white-space: nowrap;
                background-color: #000000;
                transition: width 0.6s ease;
            }
        }
    }

    .review-list {
        .am-img-profile {
            object-fit: cover;
            border-radius: 50%;
            vertical-align: bottom;
            width: 40px;
            height: 40px;  
        }
        .am-info-profile {
            padding-left: 10px;

            .am-name-profile {
                font-size: 16px;
            }
            .am-date-profile {
                font-size: 14px;
            }
        }
        .am-review-profile {
            font-size: 16px;
            padding-top: 10px;
            padding-bottom: 40px;
        }
    }
}

.know {
    font-size: 15px;
    .other {
    a {
        color: inherit;
        text-decoration: underline;
    }
}

}

@media screen and (max-width: 1000px) {
  .research-menu{
    .logo{
      display: none;  
    }

    .search {  
      .bar {
        width: 160px;
      }
    }
  }

    .width{
        margin-bottom: 80px;
    }
}

</style>