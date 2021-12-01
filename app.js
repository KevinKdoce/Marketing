$(document).ready(function () {
  getRbd();
  getComuna();
  getSchool();
});

const getSchool = () => {
  $(function(){
    let school = $('#getSchool');
    $('#getSchool').change(function(){
        $("#js-example-basic-single option[value='" + $('#getSchool').val() + "']").attr('value');
    });
  });
  let value = school;
  let school = $('#getSchool').value = value;
  
  school.keyup((e) => {
    var url = "index.php";
    $.getJSON(url, {_num1: school.val()}, (colleges) => {
      $.each(colleges, (i, college) => {
        $('#dependencia').val(college.dependencia);
        $('#comuna').val(college.comuna);
        $('#colegio').val(college.colegio);
      });
    });
  });
}

let dataRbd = $("#rowRbd");
let dataComuna = $("#comuna");

const getRbd = () => {
  $.ajax({
    url: "getRbd.php",
    method: "GET",
    success: function (json) {
      let template = ``;

      for (const rbd in json) {
        template += `<option value='${json[rbd].rbd}'>${json[rbd].name}</option>`;
      }
      return dataRbd.html(template);
    },
  });
  dataRbd.select2();
};

const getComuna = () => {
  $.ajax({
    url: "getComuna.php",
    method: "GET",
    data: dataComuna,
    success: function (json) {
      let template = ``;

      for (const rbd in json) {
        template += `<option value='${json[rbd].type}'>${json[rbd].type}</option>`;
      }
      return dataComuna.html(template);
    },
  });
  dataComuna.select2();
};

const postRbd = () => {
  $("#enviar").click(function(){
    let form = $("#formInformation").serializeArray();
    $.ajax({
      type: "POST",
      dataType: 'json',
      url: "ClassControl.php",
      data: form,
    }).done(function(response){
      $("#message").html(response.message);
    });
});
}

// // let inputRbd = $(".js-example-basic-single").keydown((event) => {
// //   if (
// //     (event.keyCode < 48 || event.keyCode > 57) &&
// //     (event.keyCode < 96 || event.keyCode > 105) &&
// //     event.keyCode !== 190 &&
// //     event.keyCode !== 110 &&
// //     event.keyCode !== 8 &&
// //     event.keyCode !== 9
// //   ) {
// //     return false;
// //   }
// //   let key = event.target.value;
// // });
