<?php

namespace app\data\command;

use app\data\service\UserUpgradeService;
use think\admin\Command;
use think\admin\Exception;
use think\console\Input;
use think\console\Output;

/**
 * 用户等级重算处理
 * Class UserLevel
 * @package app\data\command
 */
class UserUpgrade extends Command
{
    protected function configure()
    {
        $this->setName('xdata:UserUpgrade');
        $this->setDescription('批量重新计算用户等级');
    }

    /**
     * @param Input $input
     * @param Output $output
     * @return void
     * @throws Exception
     */
    protected function execute(Input $input, Output $output)
    {
        try {
            [$total, $count] = [$this->app->db->name('DataUser')->count(), 0];
            foreach ($this->app->db->name('DataUser')->field('id')->cursor() as $user) {
                $this->queue->message($total, ++$count, "正在计算用户 [{$user['id']}] 的等级");
                UserUpgradeService::instance()->upgrade($user['id']);
                $this->queue->message($total, $count, "完成计算用户 [{$user['id']}] 的等级", 1);
            }
            $this->setQueueSuccess("此次共重新计算 {$total} 个用户等级。");
        } catch (Exception $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            $this->setQueueError($exception->getMessage());
        }
    }
}