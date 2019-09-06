<?php ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= __('Profiles') ?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="txtSearch" class="sr-only">Buscar</label>
                            <input type="search" class="form-control" id="txtSearch" placeholder="Buscar...">
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="cboNumRegister" class="mr-2">Mostrar</label>
                            <select class="custom-select" id="cboNumRegister">
                                <option value="10" selected="selected">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="text-lg-right mt-3 mt-lg-0">
                        <a href="<?=$this->Url->build(["controller" => "Profiles", "action" => "add"])?>" class="btn btn-primary waves-effect waves-light" data-animation="fadein" data-overlaycolor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> <?= __('New Profile')?></a>
                    </div>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?= $this->Flash->render() ?>
                <div id="contentList"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->