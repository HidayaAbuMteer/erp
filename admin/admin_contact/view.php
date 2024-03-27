<?php 
$id =numer($_GET['id']);
dbSelect("contact_admin", "*", "WHERE id = ? LIMIT 1", [$id] );
if($countrows == 0){
    sweet("error", "خطأ", "الرسالة غير موجودة ", "acontact");
    die();
}
// messageحفظ البيانات في المتغير
$message = $rows[0];

switch($message['priority']){
  case 2:
    $priority = "عاجل";
    break;
  case 1:
    $priority =  "متوسط";
    break;
  default;
    $priority =  "عادي";
    break;
     }
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">عرض الرسالة <?php echo $message['subject']?>   </h5>

                    <!-- General Form Elements -->
                   
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">اسم الموظف</label>
                            <div class="col-sm-10">
                                <?php 
                                dbSelect("users", "name", "WHERE id = ? LIMIT 1", [$message['user_id']]);
                                $user = $rows[0]['name'];
                                ?>
                                <input type="text" class="form-control"  value="<?php echo $user ?>" disabled readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">الاولوية  </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="<?php echo $message['priority'] ?>" disabled readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">عنوان الرسالة </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  value="<?php echo $message['subject'] ?>" disabled readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">نص الرسالة </label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" disabled readonly><?php echo $message['text'] ?></textarea>
                            </div>
                        </div>
                        
                </div>
            </div>

        </div>


    </div>
</section>

