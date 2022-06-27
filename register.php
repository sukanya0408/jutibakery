<!DOCTYPE html>
<html lang="en">

<head>
  <title>สมัครสมาชิก</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="juti_bakery mt-5 pt-6">
    <div class="row">
      <div class="col-12 col-sm-8 col-md-6 m-auto">
      <div class="card border-0 shadow">
          <div class="card-header text-black bg-warning text-center">
            <h3>สมัครสมาชิก</h3>
          </div>
          <div class="card-body">
            <form class="row g-3">
              <div class="col-md-6">
                <label class="form-label">ชื่อ :</label>
                <input type="text" name="ctm_name" class="form-control" />
              </div>
              <div class="col-md-6">
                <label class="form-label">นามสกุล :</label>
                <input type="text" name="ctm_sname" class="form-control" />
              </div>
              <div class="col-md-6">
                <label class="form-label">ชื่อผู้ใช้ :</label>
                <input type="text" name="ctm_user" class="form-control" />
              </div>
              <div class="col-md-6">
                <label class="form-label">รหัสผ่าน :</label>
                <input type="password" name="ctm_password" class="form-control" />
              </div>
              <div class="col-md-6">
                <label class="form-label">เบอร์โทรศัพท์:</label>
                <input type="text" name="ctm_phone" class="form-control" />
              </div>
              <div class="col-md-6">
                <label class="form-label">อีเมล:</label>
                <input type="text" name="ctm_email" class="form-control" />
              </div>
              <div class="col-12">
                <label class="form-label">ที่อยู่:</label>
                <input type="text" name="ctm_address" class="form-control" />
              </div>
              <div class="mb-6 text-center">
                <button type="submit" name="save_cus" class="btn btn-warning">สมัครสมาชิก</button>
              </div>
              <div class="container signin center">
                <p class="text-center">เป็นสมาชิกแล้ว<a href="login.php"> เข้าสู่ระบบ </a></p>
          </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
