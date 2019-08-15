<?php ?>
<ul class="metismenu" id="side-menu">

    <li class="menu-title"> Menu Principal </li>

    <li>
        <a href="<?=$this->Url->build(["controller" => "Customers", "action" => "dashboard"])?>">
            <i class="fe-airplay"></i>
            <span> Panel Principal </span>
        </a>
    </li>

    <li>
        <a href="<?=$this->Url->build(["controller" => "Customers", "action" => "generatecode"])?>">
            <i class="fe-phone-call"></i>
            <span> <?= __('Call Box') ?></span>
        </a>
    </li>

    <li>
        <a href="javascript: void(0);">
            <i class="fe-settings"></i>
            <span> Configuración </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="nav-second-level" aria-expanded="false">
            <li>                                        
                <a href="<?=$this->Url->build(["controller" => "Customers", "action" => "index"])?>"> <?= __("Customers")?> </a>
            </li>
            <li>
                <a href="<?=$this->Url->build(["controller" => "Users", "action" => "index"])?>"> <?= __("Users")?> </a>
            </li>
            <li>
                <a href="<?=$this->Url->build(["controller" => "Profiles", "action" => "index"])?>"> <?= __("Profiles")?> </a>
            </li>
            <li>
                <a href="<?=$this->Url->build(["controller" => "Roles", "action" => "index"])?>"> <?= __("Roles")?> </a>
            </li>
            <li>
                <a href="<?=$this->Url->build(["controller" => "Advertisements", "action" => "index"])?>"> <?= __("Advertisements")?> </a>
            </li>
            <li>
                <a href="<?=$this->Url->build(["controller" => "Phones", "action" => "index"])?>"> <?= __("Phones")?> </a>
            </li>
            <li>
                <a href="<?=$this->Url->build(["controller" => "Modules", "action" => "index"])?>"> <?= __("Modules")?> </a>
            </li>
            <li>
                <a href="<?=$this->Url->build(["controller" => "Fields", "action" => "index"])?>"> <?= __("Fields")?> </a>
            </li>
        </ul>
    </li>

</ul>