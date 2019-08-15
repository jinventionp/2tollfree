<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class PermissionsComponent extends Component {

    public function getPermissionsModule($profiles, $controller) {
        $permissionModule = array();
        if (!empty($profiles)):
            foreach ($profiles as $profile):
                if (!empty($profile['Module'])):
                    foreach ($profile['Module'] as $module):
                        if ($module['controller_name'] == $controller):
                            $permissionModule = $module;
                            break;
                        endif;
                    endforeach;
                endif;
            endforeach;
        endif;
        //pr($permissionModule);
        return $permissionModule;
    }
    
}
?>