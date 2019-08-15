<?php ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= __('Phones') ?></h4>
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
                        <!-- Responsive modal -->
                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#modalAdd" data-url="<?=$this->Url->build(["controller" => "Phones", "action" => "add"])?>" data-title="<?= __('New Phone')?>" id="openModalAdd"><i class="mdi mdi-plus-circle mr-1"></i><?= __('New Phone')?></button>
                    </div>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="msgFormActions"></div> 
                <div id="contentList"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->