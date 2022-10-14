<template>
    <footer>
        <div class="d-flex justify-content-between style-footer">
            <div class="ml-3">&copy; Boolbnb, Inc. · <a href="#">Privacy</a> · <a href="#">Termini</a> · <a href="#">Mappa del sito</a> · <a href="#">Dettagli dell'azienda</a> · <a href="#">Destinazioni</a></div>
            <div><i class="fa-solid fa-globe mr-1"></i><a href="#" class="mr-3">Italiano (IT)</a><a href="#" class="mr-3">&euro; EUR</a><a href="#" class="mr-3">Linkedin</a></div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'FooterComponent',
}
</script>


<style lang="scss" scoped>
@import '../../sass/variables.scss';
.style-footer{
    background-color: #f1f1f1;
    border-block: 2px solid #e0e0e0;
    padding-block: 7px;
    position: fixed;
    bottom: 0;
    right: 0;
    width: 100%;
}
</style>