<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class PermissionsComponent extends Component {

    public function getPermissionsModule($profiles, $controller) {
        $permissionModule = [];
        if (!empty($profiles)):
            foreach ($profiles as $profile): 
                if (!empty($profile['modules'])): 
                    foreach ($profile['modules'] as $module): 
                        if (strtolower($module['name']) == strtolower($controller)):
                            $permissionModule = $module;
                            break;
                        endif;
                    endforeach;
                endif;
            endforeach;
        endif;
        
        return $permissionModule;
    }
    
}
?>