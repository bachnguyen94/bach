<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @property null layout
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public function index()
    {
        // This is homepage
        $this->paginate = ['limit'=>2];
        $this->buildAjaxMore('Menus','ajax_more','list',['container'=>'#divMore','link'=>'.hw-ajax-more']);
    }
    
    public function cake()
    {
        // This is default action of cake to check configuration
    }

    public function change_language($lang)
    {
        $this->request->session()->write('Config.language', $lang);
        I18n::locale($lang);
        $this->redirect($this->referer());
    }
}