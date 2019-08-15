<?php 
$this->Paginator->setTemplates([
    'first'  => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'last'  => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
]);
?>
<div class="paginator">
    <ul class="pagination">
        <?=$this->Paginator->first('<< ' . __('first'))?>
        <?=$this->Paginator->prev('<' . __('previous'))?>
        <?=$this->Paginator->numbers()?>
        <?=$this->Paginator->next(__('next') . ' >')?>
        <?=$this->Paginator->last(__('last') . ' >>')?>
    </ul>
    <p><?=$this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')])?></p>
</div>