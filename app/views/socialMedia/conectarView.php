<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body text-center"><img src="<?php echo url('/assets/twitter_logo_icon.png') ?>" alt="Twitter Logo" height="50" width="50">
                    <h5 class="card-title mt-3">Twitter</h5>
                    <h6 class="card-subtitle text-muted">Perfil</h6><button id="conect_twitter" class="btn btn-primary mt-3 conectar" id="Twitter">Conectar Twitter</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center"><img src="<?php echo url('/assets/facebook_icon.png') ?>" alt="Facebook Logo" height="50" width="50">
                    <h5 class="card-title mt-3">Facebook</h5>
                    <h6 class="card-subtitle text-muted">Pagina o grupo</h6><button id="conect_facebook" class="btn btn-primary mt-3 conectar" id="Facebook">Conectar Facebook</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center"><img src="<?php echo url('/assets/instagram_logo_icon.png') ?>" alt="Instagram Logo" height="50" width="50">
                    <h5 class="card-title mt-3">Instagram</h5>
                    <h6 class="card-subtitle text-muted">Cuenta de empresa</h6><button class="btn btn-primary mt-3 conectar" id="Instagram">Conectar Instagram</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center"><img src="<?php echo url('/assets/tiktok_media_icon.png') ?>" alt="Tiktok Logo" height="50" width="50">
                    <h5 class="card-title mt-3">Tiktok</h5>
                    <h6 class="card-subtitle text-muted">Perfil</h6><button class="btn btn-primary mt-3 conectar" id="Tiktok">Conectar Tiktok</button>
                </div>
            </div>
        </div>
    </div><!---->
    <div class="modal fade" tabindex="-1" aria-labelledby="pageSelectionModalLabel" aria-hidden="!showModal" style="">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pageSelectionModalLabel">Selecciona una página</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row"></div>
                </div>
            </div>
        </div>
    </div><!---->
</div>