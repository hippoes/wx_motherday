<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

/**
 * Class My_Model extends CI_Model
 * @author
 */
class weixin_param extends MY_Model
{
    protected $table = '';         // 默认取控制器的类名,继承时最好定义

    public function __construct()
    {
        parent::__construct();

        if (!$this->table) {
            $this->table = strtolower($this->router->class);
        }
        // TODO: 处理数据表字段 ，判定在create , edit 的数据字段为子集
    }


}