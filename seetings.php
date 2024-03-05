<?php include 'header.php'; ?>

<div class="pagetitle">
      <h1>اعدادات النظام</h1>
     
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">اعدادات النظام الخاص بك</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">اسم المؤسسة</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sitename" placeholder="اسم النظام" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">وصف الموقع</label>
                  <div class="col-sm-10">
                    <textarea name="description" class="form-control"  placeholder="أدخل الوصف العام للنظام"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">لوجو(شعار) الموقع</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="logo">
                  </div>
                </div>
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">ايميل الدعم</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="sitename" placeholder="ايميل الموقع" required>
                  </div>
                </div> 
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">الكلمات الدلالية</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="metaTage" placeholder="الكلمات البحثية" required>
                  </div>
                </div>      
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">حالة النظام</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="status"  required>
                        <option value="1">مفتوح</option>
                        <option value="0">مغلق</option>
                    </select>
                  </div>
                </div>                      
                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="تحديث" name="update>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>
<?php include 'footer.php'; ?>

