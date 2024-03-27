<div class="pagetitle">
    <h1>إعدادات النظام</h1>

</div><!-- End Page Title -->

<?php

gsite();

if (isset($_POST['update'])) {
    $csrf->verify();
    $siteName = safer($_POST['siteName']);
    $description = safer($_POST['description']);
    $email = safer($_POST['email']);
    $metaTags = safer($_POST['metaTags']);
    $status = numer($_POST['status']);

    // up("logo", "logo", "../files/", 20);
    if (!empty($_FILES['logo']['name'])) {


        $upload = up("logo", "logo", "../files/", 20);


        if ($upload != "uploaded_done") {
            sweet("error", "خطأ", "حدث خطأ اثناء رفع الملف");
        } else {
            dbUpdate("settings", "value = ?", [$filename, "logo"], "WHERE name = ? LIMIT 1");
        }
    }

    $newData = [
        "siteName" => $siteName,
        "description" => $description,
        "email" => $email,
        "metaTags" => $metaTags,
        "status" => $status
    ];

    foreach ($newData as $key => $value) {
        dbUpdate("settings", "value = ?", [$value, $key], "WHERE name = ?");
    }

    sweet("success", "نجاح", "تم تحديث البيانات بنجاح", "here");
}
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">إعدادات النظام الخاص بك</h5>

                    <!-- General Form Elements -->
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">اسم المؤسسة</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="siteName" value="<?php echo $site['siteName'] ?>" placeholder="اسم النظام" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">وصف الموقع</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" placeholder="أدخل الوصف العام للمنصة"><?php echo $site['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">لوقو (شعار) الموقع</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="logo">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">الشعار الحالي</label>
                            <div class="col-sm-10">
                                <img src="../files/<?php echo $site['logo'] ?>" alt="صورة الشعار" width="200">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">ايميل الدعم</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" value="<?php echo $site['email'] ?>" name="email" placeholder="ايميل الموقع" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">الكلمات الدلالية</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $site['metaTags'] ?>" name="metaTags" placeholder="الكلمات البحثية">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">حالة النظام</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" required>

                                    <option value="1" <?php if ($site['status'] == "1") {
                                                            echo "selected";
                                                        } ?>>مفتوح</option>

                                    <option value="0" <?php if ($site['status'] == "0") {
                                                            echo "selected";
                                                        } ?>>مغلق</option>
                                </select>
                            </div>
                        </div>

                        <?php
                        $csrf->input();
                        ?>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" value="التحديث" name="update">
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>


    </div>
</section>
