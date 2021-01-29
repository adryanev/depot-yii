<?php
/**
 * @var $controller string
 * @var $action string
 */
?>
<div class="sidebar">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li <?=$controller === 'site'? 'class="active"':'' ?>>
                    <a href="#dashboard">
                        <i class="iconsmind-Shop-4"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li <?=$controller === 'pengguna'? 'class="active"':'' ?>>
                    <a href="#layouts">
                        <i class="iconsmind-Digital-Drawing"></i> Pengguna
                    </a>
                </li>
                <li <?=$controller === 'item'? 'class="active"':'' ?>>
                    <?=\yii\bootstrap4\Html::a('<i class="iconsmind-Digital-Drawing"></i> Item',['item/index'])?>
                </li>
                <li <?=$controller === 'pesanan'? 'class="active"':'' ?>>
                    <a href="#applications">
                        <i class="iconsmind-Air-Balloon"></i> Pesanan
                    </a>
                </li>
                <li <?=$controller === 'laporan'? 'class="active"':'' ?>>
                    <a href="#ui">
                        <i class="iconsmind-Pantone"></i> Laporan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
