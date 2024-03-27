<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">منح حافز لموظف</h5>

                    <?php 
                    
                     if(isset($_POST['submit'])){
                        $csrf->verify();
                        $employee = numer($_POST['employee']);
                        $title = safer($_POST['title']);
                        $text = safer($_POST['text']);
                        if(!empty($employee) and !empty($title)){
                            dbInsert("rewards", "user_id, title, text, date", [$employee, $title, $text, date("Y-m-d")]);
                               // ادراج الاشعار في قاعدة البيانات
                            $alert_text=" تم منحك حافز  :". $title;
                            dbInsert("alerts","user_id, text, seen, date", [$employee, $alert_text, 0, date("Y-m-d H-i-s") ]);
                            sweet("success", "نجاح", "تم منح الحافز للموظف بنجاح", "rewards");
                        }else{
                            sweet("error", "خطأ", "اسم الموظف واسم الحافز مطلوب");

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
                            <label class="col-sm-2 col-form-label"> اسم الحافز</label>
                            <div class="col-sm-10">
                              <input type="text" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">سبب المنح</label>
                            <div class="col-sm-10">
                                <textarea name="text" class="form-control" placeholder="سبب منح الموظف هذه الحافز"></textarea>
                            </div>
                        </div>


                        <?php
                        $csrf->input();
                        ?>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-success" value="منح الحافز " name="submit">
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>


    </div>
</section>
