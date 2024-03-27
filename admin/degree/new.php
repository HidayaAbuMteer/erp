<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">منح شهادة  لموظف</h5>

                    <?php 
                    
                     if(isset($_POST['submit'])){
                        $csrf->verify();
                        $employee = numer($_POST['employee']);
                        $degree = safer($_POST['degree']);
                        $note = safer($_POST['note']);
                        if(!empty($employee) and !empty($degree)){
                            //ادراج الشهادة في قاعدة البيانات
                            dbInsert("degree", "user_id, degree, note, date", [$employee, $degree, $note, date("Y-m-d")]);
                            // ادراج الاشعار في قاعدة البيانات
                            $alert_text="تم منحك شهادة جديدة :". $degree;
                            dbInsert("alerts","user_id, text, seen, date", [$employee, $alert_text, 0, date("Y-m-d H-i-s") ]);
                            
                            // رسالة نجاح 
                            sweet("success", "نجاح", "تم منح الشهادة  بنجاح", "degree");
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
                            <label class="col-sm-2 col-form-label"> نوع الشهادة</label>
                            <div class="col-sm-10">
                               <input type="text" class="form-control" name="degree" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">سبب منح الشهادة</label>
                            <div class="col-sm-10">
                                <textarea name="note" class="form-control" placeholder="سبب اعطاء الموظف هذه الشهادة"></textarea>
                            </div>
                        </div>


                        <?php
                        $csrf->input();
                        ?>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-success" value="منح الشهادة " name="submit">
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>


    </div>
</section>
