<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">اعطاء عقوبة لموظف</h5>

                    <?php 
                    
                     if(isset($_POST['submit'])){
                        $csrf->verify();
                        $employee = numer($_POST['employee']);
                        $punish = safer($_POST['punish']);
                        $note = safer($_POST['note']);
                        if(!empty($employee) and !empty($punish)){
                            dbInsert("punish", "user_id, punish, note, date", [$employee, $punish, $note, date("Y-m-d")]);
                               // ادراج الاشعار في قاعدة البيانات
                            $alert_text=" تم اعطائك عقوبة  :". $punish;
                            dbInsert("alerts","user_id, text, seen, date", [$employee, $alert_text, 0, date("Y-m-d H-i-s") ]);
                            sweet("success", "نجاح", "تم اعطاء العقوبة بنجاح", "punish");
                        }else{
                            sweet("error", "خطأ", "اسم الموظف والسبب مطلوب");

                        }
                     }

                    ?>

                    <!-- General Form Elements -->
                    <form method="POST" action="" >
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"> الموظف</label>
                            <div class="col-sm-10">
                               <select name="employee" class="form-control" required>
                                  <?php 
                                  dbSelect("users","id, name, employee_id");
                                  foreach($rows as $row){
                                    echo'<option value="'.$row['id'].'">'.$row['name'].'-'.$row['employee_id'].'</option>';
                                  }
                                  ?>
                               </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"> نوع العقوبة</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="punish" required>
                                    <option value="تأخر"> تأخر</option>
                                    <option value="عدم تحقيق الاهداف"> عدم تحقيق الاهداف</option>
                                    <option value="النوم"> النوم</option>
                                    <option value="الخروج قبل انتهاء الدوام"> الخروج قبل انتهاء الدوام</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">سبب العقوبة</label>
                            <div class="col-sm-10">
                                <textarea name="note" class="form-control" placeholder="سبب اعطاء الموظف هذه العقوبة"></textarea>
                            </div>
                        </div>


                        <?php
                        $csrf->input();
                        ?>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-danger" value="اعطاء العقوبة" name="submit">
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>


    </div>
</section>
