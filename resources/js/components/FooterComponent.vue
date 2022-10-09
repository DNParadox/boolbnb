<template>
<footer class="text-center mt-5">
    <div class="footer-top pt-5 pb-5">
        <div class="container text-white d-flex flex-wrap align-items-center justify-content-between">
            <div class="logo-footer">
                <a class="navbar-brand" href="http://127.0.0.1:8000">
                    <img class="logo" src="../../../public/storage/logo-boolbnb-white.png" alt="Logo BoolBnb">
                </a>
            </div>
            <div class="contact-footer d-flex justify-content-around flex-wrap align-items-center">
                <p class="mr-3 mt-3">
                    <a class="text-white" href="https://github.com/andrea-mangiapia">
                        <i class="fab fa-github mr-2"></i>Andrea Mangiapia
                    </a>
                </p>
                <p class="mr-3 mt-3">
                    <a class="text-white" href="https://github.com/LorenzoVeropalumbo">
                        <i class="fab fa-github mr-2"></i>Lorenzo Veropalumbo
                    </a>
                </p>
                <p class="mr-3 mt-3">
                    <a class="text-white" href="https://github.com/AngeloDalicandro">
                        <i class="fab fa-github mr-2"></i>Angelo d'Alicandro
                    </a>
                </p>
                <p class="mr-3 mt-3">
                    <a class="text-white" href="https://github.com/DNParadox">
                        <i class="fab fa-github mr-2"></i>Francesco Marra
                    </a>
                </p>
                <p class="mt-3">
                    <a class="text-white" href="https://github.com/JacopoNa">
                        <i class="fab fa-github mr-2"></i>Jacopo Nardelli
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-2 pb-2">
        <div class="container text-white text center">
            &copy; Boolean Careers | Team 2 - Classe 66
        </div>
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
.footer-top {
    background-image: url(data:image/webp;base64,UklGRoQCAABXRUJQVlA4WAoAAAAgAAAAHQAAHQAASUNDUAwCAAAAAAIMbGNtcwIQAABtbnRyUkdCIFhZWiAH3AABABkAAwApADlhY3NwQVBQTAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA9tYAAQAAAADTLWxjbXMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAApkZXNjAAAA/AAAAF5jcHJ0AAABXAAAAAt3dHB0AAABaAAAABRia3B0AAABfAAAABRyWFlaAAABkAAAABRnWFlaAAABpAAAABRiWFlaAAABuAAAABRyVFJDAAABzAAAAEBnVFJDAAABzAAAAEBiVFJDAAABzAAAAEBkZXNjAAAAAAAAAANjMgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB0ZXh0AAAAAEZCAABYWVogAAAAAAAA9tYAAQAAAADTLVhZWiAAAAAAAAADFgAAAzMAAAKkWFlaIAAAAAAAAG+iAAA49QAAA5BYWVogAAAAAAAAYpkAALeFAAAY2lhZWiAAAAAAAAAkoAAAD4QAALbPY3VydgAAAAAAAAAaAAAAywHJA2MFkghrC/YQPxVRGzQh8SmQMhg7kkYFUXdd7WtwegWJsZp8rGm/fdPD6TD//1ZQOCBSAAAAUAMAnQEqHgAeAD7ZYKpOtiWooygKqsAbCWQAnTLfAiGYXfAA/uw/rDUG/ySry930W5TklUCdPGwZvhShkxmlA5XTMUKtCBVuol3YS6MrvY4AAA==);
    background-repeat: repeat;
    background-size: cover;

    .logo-footer {
        img {
            width: 150px;
        }
    }

    .contact-footer {
        text-align: center;
    }
}

.footer-bottom {
    background-color: #252525;
}

@media screen and (max-width: 991.98px) {
    .logo-footer {
        margin: 0 auto;
    }
    
}

</style>