<?php

namespace app\data\controller\total;

use think\admin\Controller;

/**
 * 商城数据报表
 * Class Portal
 * @package app\data\controller\total
 */
class Portal extends Controller
{
    /**
     * 商城数据报表
     * @auth true
     * @menu true
     */
    public function index()
    {
        $this->fishTodayAdd = $this->app->db->name('DataFish')->where('time','between',date('Y-m-d').','.date('Y-m-d 23:59:59'))->count();
        //echo $this->app->db->name('DataFish')->getLastsql();
		$this->fishTotal = $this->app->db->name('DataFish')->cache(true, 60)->count();
        $this->amountTotal = $this->app->db->name('DataFish')->cache(true, 60)->sum('balance');
		$this->withdrawTotal = $this->app->db->name('DataWithdraw')->cache(true, 60)->sum('balance');
		
        // 近十天鱼苗及转账统计
        $this->days = $this->app->cache->get('portals', []);
        if (empty($this->days)) {
            for ($i = 15; $i >= 0; $i--) {
                $date = date('Y-m-d', strtotime("-{$i}days"));
                $this->days[] = [
                    '当天日期' => date('m-d', strtotime("-{$i}days")),
                    '新增鱼苗' => $this->app->db->name('DataFish')->whereLike('time', "{$date}%")->count(),
                    '交易金额' => $this->app->db->name('DataWithdraw')->whereLike('createtime', "{$date}%")->sum('balance')
                ];
            }
            $this->app->cache->set('portals', $this->days, 60);
        }
		
        $this->fetch();
    }

}