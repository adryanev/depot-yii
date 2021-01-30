<?php
/**
 * @var $controller string
 * @var $action string
 */

use yii\bootstrap4\Html;
$roles = Yii::$app->user->identity->role->item_name;
var_dump($roles);
?>
<div class="sidebar">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li <?=$controller === 'site'? 'class="active"':'' ?>>
                    <?=Html::a(' <i class="iconsmind-Shop-4"></i><span>Beranda</span>',['/site'])?>
                </li>
                <?php if($roles === 'superadmin'): ?>
                    <li <?=$controller === 'karyawan'? 'class="active"':'' ?>>
                        <?=Html::a(' <i class="iconsmind-Add-UserStar"></i> Karyawan',['/karyawan'])?>
                    </li>
                <?php endif; ?>
                <li <?=$controller === 'pengguna'? 'class="active"':'' ?>>
                    <?=Html::a(' <i class="iconsmind-User"></i> Pengguna',['/site'])?>
                </li>
                <li <?=$controller === 'item'? 'class="active"':'' ?>>
                    <?= Html::a('<i class="iconsmind-Book"></i> Item',['/item'])?>
                </li>
                <li <?=$controller === 'pesanan'? 'class="active"':'' ?>>
                    <?= Html::a('<i class="iconsmind-Dollar"></i> Pesanan',['/pesanan'])?>
                </li>
                <li <?=$controller === 'laporan'? 'class="active"':'' ?>>
                    <?= Html::a('<i class="iconsmind-Receipt"></i> Laporan',['/laporan'])?>
                </li>
            </ul>
        </div>
    </div>
</div>
