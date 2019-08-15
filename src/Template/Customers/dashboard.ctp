<?php $base = $this->request->getAttribute('webroot');?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
        	<div class="page-title-right"></div>
            <h4 class="page-title"> Panel Principal </h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
	<div class="col-xl-12">
		<div class="card-box">
            <input type="hidden" name="urlsChart" id="urlsChart" value='<?=$urlsChart?>'>
            <input type="hidden" name="dateStart" id="dateStart" value='<?=$dateStart?>'>
            <input type="hidden" name="dateEnd" id="dateEnd" value='<?=$dateEnd?>'>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group mb-1">
                        <?= $this->Form->select('customersChart', $customers, ['id' => 'customersChart', "class" => "form-control", "data-toggle" => "select2"]);?>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group mb-1">
                        <div class="input-group">
                            <input type="text" class="form-control" id="interval-datepicker" placeholder="2018-10-03 a 2018-10-10">
                            <div class="input-group-append">
                                <span class="input-group-text bg-blue border-blue text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group mb-1">
                        <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2" id="exportCSV" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Descargar CSV">
                            <i class="fe-download"></i>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>                    
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="msgChart"></div>
                </div>
            </div>
            <!--<h4 class="header-title mb-3">Resumen de Llamadas</h4>-->
            <!--<div id="sales-analytics" class="flot-chart mt-4 pt-1" style="height: 375px;"></div>-->
            <div class="pt-1" id="containerChart"></div>
        </div> <!-- end card-box -->		
	</div>
</div>
<!-- end row -->