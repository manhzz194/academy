<form method="post" action="<?php echo site_url('cbseexam/exam/entrystudents') ?>" id="allot_exam_student">
    <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
    <?php
    if (isset($resultlist) && !empty($resultlist)) {
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class=" table-responsive ptt10">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th class="text-center"><input type="checkbox" class="select_all"/></th>
                                <th><?php echo $this->lang->line('student_name'); ?></th>
                                <th>Mã SV</th>                                 
                                <th><?php echo $this->lang->line('class'); ?> (<?php echo $this->lang->line('section'); ?>)</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th><?php echo $this->lang->line('gender'); ?></th>
                            </tr>
                            <?php
                            if (empty($resultlist)) {
                                ?>
                                <tr>
                                    <td colspan="7" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                                </tr>
                                <?php
                            } else {
                                $counter = 1; 
                                foreach ($resultlist as $student) {
                                    ?>
                                    <tr>
                                        <td class="d-flex justify-content-center">
                                            <input type="hidden" name="all_students[]" value="<?php echo $student['student_session_id']; ?>">
                                            <input type="hidden" name="student_<?php echo $student['student_session_id']; ?>" value="<?php echo $student['id']; ?>">
                                            <input class="checkbox" type="checkbox" name="student_session_id[]"  value="<?php echo $student['student_session_id']; ?>" <?php if($student['exam_student_id']!=0){ echo "checked"; }?> />
                                        </td>
                                        <td><?php echo $this->customlib->getFullName($student['firstname'],$student['middlename'],$student['lastname'],$sch_setting->middlename,$sch_setting->lastname);?></td>
                                        <td><?php echo $student['admission_no']; ?></td>                                        
                                        <td><?php echo $student['class']." (".$student['section'].")"; ?></td>
                                        <td><?php echo $student['mobileno']; ?></td>
                                        <td><?php echo $student['email']; ?></td>
                                        <td><?php echo $this->lang->line(strtolower($student['gender'])); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php if ($this->rbac->hasPrivilege('cbse_exam_assign_view_student', 'can_edit')) { ?>
                    <div class="modal-footer mx-nt-lr-15 pb0">
                        <button type="submit" class="btn btn-primary pull-right" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait.."><?php echo $this->lang->line('save'); ?>
                         </button>
                    </div>     
                <?php } ?>
            </div>
        </div>
        <?php
    } else {
        ?>        
        <div class="alert alert-danger "><?php echo $this->lang->line('no_record_found'); ?></div>
        <?php
    }
    ?>
</form>