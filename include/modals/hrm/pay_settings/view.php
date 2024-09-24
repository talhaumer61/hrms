<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();
$condition = array(
                     'select'       =>  'ps.payset_id,ps.payset_status,ps.id_emply,ps.id_head,ps.head_value,e.emply_name,e.emply_grosssalary,sh.head_name,sh.head_type'
                    ,'join'         =>  '
                                            LEFT JOIN '.EMPLOYEES.' e       ON e.emply_id   = ps.id_emply
                                            LEFT JOIN '.SALARY_HEADS.' sh   ON sh.head_id   = ps.id_head
                                        '
                    ,'where'        =>  array(
                                                 'ps.is_deleted'  => 0
                                            )
                    ,'search_by'    =>  'AND ps.payset_id IN ('.cleanvars($_GET['payset_id']).')'
                    ,'group_by'     =>  'ps.payset_id'
                    ,'order_by'     =>  'ps.payset_id ASC'
                    ,'return_type'  =>  'all'
);
$PAY_SETTINGS     = $dblms->getRows(PAY_SETTINGS.' ps', $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-warning p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-eye-fill align-bottom me-2"></i>View Pay Detail</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <div class="modal-body">
            <div class="table-responsive table-card">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="40" class="text-center">Sr.</th>
                            <th>Name</th>
                            <th width="100" class="text-center">Type</th>
                            <th width="10" class="text-center"></th>
                            <th width="100" class="text-center">Amount</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $allowance  = 0;
                        $deducation = 0; 
                        $sr = 0; 
                        foreach($PAY_SETTINGS as $key => $val):
                            $sr++;
                            echo '
                            <th>'.$sr.'</th>
                                <td>'.$val['head_name'].'</td>
                                <td width="100" class="text-center">'.get_HeadType($val['head_type']).'</td>
                                <td width="5" class="text-center">=</td>
                                <td width="100" class="text-right">Rs '.number_format($val['head_value']).'.00</td>
                            </tr>';
                            $allowance  = ($val['head_type'] == 1)? ($allowance + $val['head_value']): 0;
                            $deducation = ($val['head_type'] == 2)? ($deducation + $val['head_value']): 0;
                        endforeach;
                        echo '
                    </tbody>
                </table>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="text-right">Gross Salary</th>
                            <td width="5" class="text-center">=</td>
                            <th width="100" class="text-right">Rs '.number_format($val['emply_grosssalary']).'.00</th>
                        </tr>
                    </thead>
                    <thead class="table-danger">
                        <tr>
                            <td class="text-right">Deduction</td>
                            <td width="5" class="text-center">=</td>
                            <td width="100" class="text-right">Rs '.number_format($deducation).'.00</td>
                        </tr>
                    </tbody>
                    <thead class="table-light">
                        <tr>
                            <th class="text-right">Net Salary</th>
                            <td width="5" class="text-center">=</td>
                            <th width="100" class="text-right">Rs '.number_format((($val['emply_grosssalary'] + $allowance) - $deducation)).'.00</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>';
?>