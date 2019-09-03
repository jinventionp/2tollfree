<?php ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= __('Advertisements') ?></h4>
        </div>
    </div>
</div>     
<!-- end page title --> 
<form action="/file-upload">
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
  <div class="dropzone" id="myDropzone"></div>
</form>
<script type="text/javascript">
    //Dropzone.autoDiscover = false;
    /*var myDropzone = new Dropzone("div#myDropzone", {
        url: 'upload.php', 
        autoProcessQueue: false, 
        uploadMultiple: true, 
        parallelUploads: 5, 
        maxFiles: 1, 
        maxFilesize: 1, 
        acceptedFiles: 'image/*', 
        addRemoveLinks: true,
        url: "upload.php",
        paramName: "file",
        acceptedFiles: 'image/*',
        maxFilesize: 2,
        maxFiles: 3,
        thumbnailWidth: 160,
        thumbnailHeight: 160,
        thumbnailMethod: 'contain',
        previewTemplate: previewTemplate,
        autoQueue: true,
        previewsContainer: "#previews",
        clickable: ".fileinput-button"
    });*/
</script>
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
                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#modalAdd" data-url="<?=$this->Url->build(["controller" => "Advertisements", "action" => "add"])?>" data-title="<?= __('New Advertisement')?>" id="openModalAdd"><i class="mdi mdi-plus-circle mr-1"></i><?= __('New Advertisement')?></button>
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