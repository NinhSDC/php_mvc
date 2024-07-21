var url = "https://localhost:7055";

function checkChanges() {
  const updateButton = document.getElementById("update_UserInfo");
  updateButton.style.display = "block";
}
function checkPasswordStrength(input) {
  const password = input.value;
  const result = zxcvbn(password);
  const resultText = result.score;
  const strengthText = document.getElementById("password-strength");
  const strengthCol = document.querySelector(
    ".UserInfo_right_content_password-ColStrength"
  );

  if (password === "") {
    strengthText.style.display = "none";
    strengthCol.style.width = "0%";
    strengthCol.style.backgroundColor = "transparent";
  } else {
    strengthText.style.display = "block";
    if (resultText === 0) {
      strengthText.innerHTML = `Độ mạnh mật khẩu: Rất Thấp`;
      strengthText.style.color = "red";
      strengthCol.style.width = "14%";
      strengthCol.style.backgroundColor = "red";
    } else if (resultText === 1) {
      strengthText.innerHTML = `Độ mạnh mật khẩu: Thấp`;
      strengthText.style.color = "#ff6a00";
      strengthCol.style.width = "28%";
      strengthCol.style.backgroundColor = "#ff6a00";
    } else if (resultText === 2) {
      strengthText.innerHTML = `Độ mạnh mật khẩu: Trung Bình`;
      strengthText.style.color = "#f2d000";
      strengthCol.style.width = "44%";
      strengthCol.style.backgroundColor = "#f2d000";
    } else if (resultText === 3) {
      strengthText.innerHTML = `Độ mạnh mật khẩu: Cao`;
      strengthText.style.color = "#6dd36d";
      strengthCol.style.width = "58%";
      strengthCol.style.backgroundColor = "#6dd36d";
    } else if (resultText >= 4) {
      strengthText.innerHTML = `Độ mạnh mật khẩu: Rất Cao`;
      strengthText.style.color = "#1ab01a";
      strengthCol.style.width = "70%";
      strengthCol.style.backgroundColor = "#1ab01a";
    }
  }
}
function update_UserInfo() {
  var notification = document.getElementById("notification");

  var user_Name = document.getElementById("User_Name").value;
  var user_PhoneNumber = document.getElementById("User_PhoneNumber").value;
  var user_Email = document.getElementById("User_Email").value;
  var user_Pass = document.getElementById("User_Pass").value;
  var user_PassNew = document.getElementById("User_PassNew").value;
  var user_Address = document.getElementById("User_Address").value;

  if (!isEmail(user_Email)) {
    notification.style.color = "red";
    notification.innerHTML = `* Định Dạng email Chưa Đúng '@gmail.com' *`;
    return;
  }
  if (isNaN(user_PhoneNumber)) {
    notification.style.color = "red";
    notification.innerHTML = `* Vui Lòng Không Nhập Ký Tự Hoặc Chứ Cái Vào Số Điện Thoại *`;
    return;
  } else if (user_PhoneNumber.length != 10) {
    notification.style.color = "red";
    notification.innerHTML = `* Vui Lòng Không Nhập Đủ 10 Số Điện Thoại *`;
    return;
  }
  if (
    user_Name == "" ||
    user_PhoneNumber == "" ||
    user_Email == "" ||
    user_Address == ""
  ) {
    notification.style.color = "red";
    notification.innerHTML = `* Vui Lòng Nhập Đầy Đủ thông Tin *`;
    return;
  }
  if (user_Pass != "" && user_PassNew == "") {
    notification.style.color = "red";
    notification.innerHTML = `* Vui Lòng Nhập Mật Khẩu Mới *`;
    return;
  } else if (user_Pass == "" && user_PassNew != "") {
    notification.style.color = "red";
    notification.innerHTML = `* Vui Lòng Nhập Mật Khẩu Hiện Tại *`;
    return;
  } else if (user_Pass == "" && user_PassNew == "") {
    user_Pass = "Null";
    user_PassNew = "Null";
  }

  data = {
    User_Name: user_Name,
    User_PhoneNumber: user_PhoneNumber,
    User_Email: user_Email,
    User_Pass: user_Pass,
    User_PassNew: user_PassNew,
    User_Address: user_Address,
  };
  $.ajax({
    type: "POST",
    url: "/php_mvc/User/UpdateUser",
    data: data,
    success: function (response) {
      console.log(response);
      if (response == "False") {
        notification.style.color = "red";
        notification.innerHTML = `* Quá Trình Cập Nhật Xảy Ra Lỗi Chúng Tôi Sớm Sữa Chữa *`;
      } else if (response == "True") {
        window.location.href = "/php_mvc/User";
      }
    },
    error: function (response) {
      console.log("Lỗi trong quá trình gửi yêu cầu AJAX");
    },
  });
}
function isEmail(input) {
  // Biểu thức chính quy kiểm tra xem chuỗi có phải là một địa chỉ email hợp lệ hay không
  const emailPattern = /\S+@\S+\.\S+/;

  // Kiểm tra với biểu thức chính quy
  if (emailPattern.test(input)) {
    return true;
  } else {
    return false;
  }
}
function updateImg(id, file) {
  let formData = new FormData();
  formData.append("id", id);
  formData.append("imgFile", file);

  $.ajax({
    url: `${url}/api/customers/changeImage`,
    data: formData,
    // cache: false,
    contentType: false,
    processData: false,
    method: "POST",
    success: function (data) {
      window.location.href = "/php_mvc/User/";
    },
    error: (err) => {
      window.location.href = "/php_mvc/User/";
    },
  });
}
function detailOrder(IdOrder) {
  // console.log(IdOrder)
}

$("#file-input").on("change", function () {
  updateImg($(this).data("id"), this.files[0]);
});
$(".DetailOrder").on("click", function () {
  var dataId = $(this).data("id");
  console.log(dataId);

  $.ajax({
    url: "/php_mvc/User/OrderDetail/" + dataId,
    method: "GET",
    success: (res) => {
      console.log(res);
      $("#showDetailOrder").html(res);
    },
    error: (err) => {
      console.log(err);
    },
  });
});
