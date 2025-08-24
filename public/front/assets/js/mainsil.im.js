

$(function () {
  // Add to bookmark
  $(".heart").click(function () {
    var idImgFavorites = $(this).attr("id");
    $.ajax({
      method: "POST",
      url: "php/addtoBookmark.php",
      data: { idImgFavorites: idImgFavorites },
      dataType: "json",
      success: function (data) {
        let img = document.getElementById(data.id);
        img.src =
          data.ok === "ok"
            ? "img/icons/heart_full.png"
            : "img/icons/heart_empty.png";
      },
    });
  });

  // header area
  var headerHeight = $("header").height();
  $("#head-section").css("padding-top", headerHeight);

  $(window).scroll(function () {
    if ($(this).scrollTop() > 0) {
      $("header").addClass("active");
      $(".scrollUp").fadeIn();
    } else {
      $("header").removeClass("active");
      $(".scrollUp").fadeOut();
    }
  });

  // back to top
  $(".scrollUp").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 800);
  });

  $(function () {
    // Submit event
    $("#formAdd").on("submit", function (e) {
      // Ajax göndərişi
      $.ajax({
        url: "<?= base_url('/elan-add-process.php') ?>", // backend script yolu
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#errorAdd").hide().text("");
        },
        success: function (res) {
          try {
            const data = JSON.parse(res);
            if (data.status === "success") {
              alert("Elan uğurla əlavə edildi!");
              window.location.href = data.redirect || "<?= base_url('/') ?>";
            } else {
              $("#errorAdd")
                .show()
                .text(data.message || "Xəta baş verdi.");
            }
          } catch (e) {
            $("#errorAdd").show().text("Serverdən düzgün cavab gəlmədi.");
          }
        },
        error: function () {
          $("#errorAdd").show().text("Şəbəkə xətası baş verdi.");
        },
      });
    });

    // $("#formAdd").submit(function (e) {
    //   e.preventDefault();

    //   // check name
    //   if (inputName.val() == "") {
    //     errInputName.text("Bu sahə boş saxlanmamalıdır");
    //     $("#errorAdd")
    //       .text("İstifadəçi adı boş saxlanmamalıdır")
    //       .css("display", "block");
    //     inputName.addClass("errClass");
    //   } else if (inputName.val().length < 2) {
    //     errInputName.text("Bu sahədə minimum 2 hərf istifadə olunmalıdır");
    //     inputName.addClass("errClass");
    //     $("#errorAdd")
    //       .text("İstifadəçi adı minimum 2 hərf istifadə olunmalıdır")
    //       .css("display", "block");
    //   } else {
    //     errInputName.text(" ");
    //     inputName.removeClass("errClass");
    //     $("#errorAdd").text("").css("display", "none");

    //     // check user
    //     if (selectUser.val() == "") {
    //       errSelectUser.text("Bu seçim sahəsi boş saxlanmamalıdır");
    //       selectUser.addClass("errClass");
    //       $("#errorAdd")
    //         .text("Elan verən sahəsi boş saxlanmamalıdır")
    //         .css("display", "block");
    //     } else {
    //       errSelectUser.text(" ");
    //       selectUser.removeClass("errClass");
    //       $("#errorAdd").text("").css("display", "none");

    //       // check email
    //       if (inputEmail.val() == "") {
    //         emailHelp.text("Bu email sahəsi boş saxlanmamalıdır");
    //         emailHelp.removeClass("text-muted");
    //         emailHelp.addClass("text-danger");
    //         inputEmail.addClass("errClass");
    //         $("#errorAdd")
    //           .text("Email ünvan sahəsi boş saxlanmamalıdır")
    //           .css("display", "block");
    //       } else if (!inputEmail.val().match(regexEmail)) {
    //         emailHelp.text("Yazılan email standartlara uyğun deyil");
    //         emailHelp.removeClass("text-muted");
    //         emailHelp.addClass("text-danger");
    //         inputEmail.addClass("errClass");
    //         $("#errorAdd")
    //           .text("Yazılan email standartlara uyğun deyil")
    //           .css("display", "block");
    //       } else {
    //         emailHelp.text("E-poçtunuzu heç vaxt başqası ilə bölüşməyəcəyik.");
    //         emailHelp.removeClass("text-danger");
    //         emailHelp.addClass("text-muted");
    //         inputEmail.removeClass("errClass");
    //         $("#errorAdd").text("").css("display", "none");
    //         // check phone
    //         if (inputPhone.val() == "") {
    //           errInputPhone.text("Telefon sahəsi boş saxlanmamalıdır");
    //           inputPhone.addClass("errClass");
    //           $("#errorAdd")
    //             .text("Telefon sahəsi boş saxlanmamalıdır")
    //             .css("display", "block");
    //         } else if (inputPhone.val().length == 10) {
    //           if (!inputPhone.val().match(regexPhone)) {
    //             errInputPhone.text(
    //               "Daxil edilən nömrə standartlara uyğun olmalıdır"
    //             );
    //             inputPhone.addClass("errClass");
    //             $("#errorAdd")
    //               .text("Daxil edilən nömrə standartlara uyğun olmalıdır")
    //               .css("display", "block");
    //           } else {
    //             errInputPhone.text(" ");
    //             inputPhone.removeClass("errClass");
    //             $("#errorAdd").text("").css("display", "none");

    //             // check subcategory
    //             if (selectsubCategory.val() == "") {
    //               errSelectsubCategory.text(
    //                 "Bu seçim sahəsi boş saxlanmamalıdır"
    //               );
    //               selectsubCategory.addClass("errClass");
    //               $("#errorAdd")
    //                 .text("Kateqoriya seçim sahəsi boş saxlanmamalıdır")
    //                 .css("display", "block");
    //             } else {
    //               errSelectsubCategory.text(" ");
    //               selectsubCategory.removeClass("errClass");
    //               $("#errorAdd").text("").css("display", "none");

    //               if (selectsubCategory.val() == 34) {
    //                 var valuesArray = [];
    //                 var fields = document.getElementsByName("optionsAdd[]");
    //                 for (var i = 0; i < fields.length; i++) {
    //                   valuesArray.push(fields[i].value);
    //                 }

    //                 var valuesDataAray = [];
    //                 for (var g = 0; g < valuesArray.length; g++) {
    //                   if (valuesArray[g] == "") {
    //                     valuesDataAray.push("false");
    //                   } else {
    //                     valuesDataAray.push("true");
    //                   }
    //                 }

    //                 // javascript array unique
    //                 /* bu funksiyaya esasen bir dizide eyni adli 2 ve daha cox deyer varsa onlari birlesdirir ve bir deyer gosterir */
    //                 function onlyUnique(value, index, self) {
    //                   return self.indexOf(value) === index;
    //                 }

    //                 // console.log(valuesDataAray);
    //                 var newArrayValue = valuesDataAray.filter(onlyUnique);

    //                 if (newArrayValue == "true") {
    //                   $('input[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid #ced4da"
    //                   );
    //                   $('select[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid #ced4da"
    //                   );

    //                   $('input[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .text("");

    //                   $('select[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .text("");

    //                   $("#errorAdd").text("").css("display", "none");

    //                   // check title
    //                   if (inputElanTitle.val() == "") {
    //                     errInputElanTitle.text("Bu sahə boş saxlanmamalıdır");
    //                     inputElanTitle.addClass("errClass");
    //                     $("#errorAdd")
    //                       .text("Elanın adı boş saxlanmamalıdır")
    //                       .css("display", "block");
    //                   } else if (inputElanTitle.val().length < 2) {
    //                     errInputElanTitle.text(
    //                       "Bu sahədə minimum 2 hərf istifadə olunmalıdır"
    //                     );
    //                     inputElanTitle.addClass("errClass");
    //                     $("#errorAdd")
    //                       .text(
    //                         "Elanın adı minimum 2 hərf istifadə olunmalıdır"
    //                       )
    //                       .css("display", "block");
    //                   } else {
    //                     errInputElanTitle.text(" ");
    //                     inputElanTitle.removeClass("errClass");
    //                     $("#errorAdd").text("").css("display", "none");

    //                     // check price
    //                     if (inputPrice.val() == "") {
    //                       errInputPrice.text("Bu sahəsi boş saxlanmamalıdır");
    //                       inputPrice.addClass("errClass");
    //                       $("#errorAdd")
    //                         .text("Elanın qiyməti boş saxlanmamalıdır")
    //                         .css("display", "block");
    //                     } else {
    //                       if (!inputPrice.val().match(regexNumber)) {
    //                         errInputPrice.text(
    //                           "Bu sahədə ancaq rəqəmlər istifadə olunmalıdır"
    //                         );
    //                         inputPrice.addClass("errClass");
    //                         $("#errorAdd")
    //                           .text(
    //                             "Elanın qiyməti ancaq rəqəmlər istifadə olunmalıdır"
    //                           )
    //                           .css("display", "block");
    //                       } else {
    //                         errInputPrice.text(" ");
    //                         inputPrice.removeClass("errClass");
    //                         $("#errorAdd").text("").css("display", "none");

    //                         // check description
    //                         if (textareaAdd.val() == "") {
    //                           errTextareaAdd.text(
    //                             "Məzmun sahəsi boş saxlanmamalıdır"
    //                           );
    //                           textareaAdd.addClass("errClass");
    //                           $("#errorAdd")
    //                             .text("Məzmun sahəsi boş saxlanmamalıdır")
    //                             .css("display", "block");
    //                         } else {
    //                           if (textareaAdd.val().length < 14) {
    //                             errTextareaAdd.text(
    //                               "Məzmun sahəsində minimum 15 karakter olmalıdır"
    //                             );
    //                             textareaAdd.addClass("errClass");
    //                             $("#errorAdd")
    //                               .text(
    //                                 "Məzmun sahəsində minimum 15 karakter olmalıdır"
    //                               )
    //                               .css("display", "block");
    //                           } else {
    //                             errTextareaAdd.text(" ");
    //                             textareaAdd.removeClass("errClass");
    //                             $("#errorAdd").text("").css("display", "none");

    //                             // check img
    //                             if (fileInput.get(0).files.length > 0) {
    //                               $imgArray = [];
    //                               // count of multi files
    //                               for (
    //                                 $i = 0;
    //                                 $i < fileInput.get(0).files.length;
    //                                 $i++
    //                               ) {
    //                                 var file = fileInput.get(0).files[$i];
    //                                 var fileType = file.type;
    //                                 if (
    //                                   fileType == "image/png" ||
    //                                   fileType == "image/jpg" ||
    //                                   fileType == "image/jpeg" ||
    //                                   fileType == "image/gif"
    //                                 ) {
    //                                   errMultiImg.text(" ");
    //                                   $imgArray.push(file);
    //                                 } else {
    //                                   errMultiImg.text(
    //                                     "Şəkilin formatı standartlara uyğun deyil"
    //                                   );
    //                                   $("#errorAdd")
    //                                     .text(
    //                                       "Şəkilin formatı standartlara uyğun deyil"
    //                                     )
    //                                     .css("display", "block");
    //                                 }
    //                               }
    //                             } else {
    //                               errMultiImg.text(
    //                                 "Şəkil sahəsində ən azı bir şəkil olmalıdır"
    //                               );
    //                               $("#errorAdd")
    //                                 .text(
    //                                   "Şəkil sahəsində ən azı bir şəkil olmalıdır"
    //                                 )
    //                                 .css("display", "block");
    //                               $(".pip").remove();
    //                             }

    //                             if ($imgArray.length > 0) {
    //                               $.ajax({
    //                                 url: "php/formAdd.php",
    //                                 type: "post",
    //                                 data: new FormData(this),
    //                                 contentType: false,
    //                                 cache: false,
    //                                 processData: false,
    //                                 dataType: "json",
    //                                 beforeSend: showPreloader,
    //                                 complete: hidePreloader,
    //                                 // beforeSend: function () {
    //                                 //   $(".preloader").css("display", "block");
    //                                 //   $("body").addClass("overhidden ");
    //                                 // },
    //                                 success: function (data) {
    //                                   if (data.ok) {
    //                                     window.location.assign(data.ok);
    //                                     $(".form-control").val(" ");
    //                                     $("input [type=file]").val(" ");
    //                                     $(".pip").remove();
    //                                     $("#errorAdd").css("display", "none");
    //                                   } else {
    //                                     $("#errorAdd").css("display", "block");
    //                                     $("#errorAdd").html(data.text);
    //                                   }
    //                                   // $(".preloader").css("display", "none");
    //                                   // $("body").removeClass("overhidden ");
    //                                 },
    //                               });
    //                             }
    //                           }
    //                         }
    //                       }
    //                     }
    //                   }
    //                 } else {
    //                   // input
    //                   $('input[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid red"
    //                   );
    //                   $('input[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .html("Zəhmət olmasa bu sahəni boş saxlamayın");

    //                   // select
    //                   $('select[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid red"
    //                   );
    //                   $('select[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .html("Zəhmət olmasa seçim alanından bir seçim edin");

    //                   $("#errorAdd")
    //                     .text("Bütün xanalar tam doldurulmalıdır")
    //                     .css("display", "block");
    //                 }
    //               } else if (
    //                 selectsubCategory.val() == 67 ||
    //                 selectsubCategory.val() == 90
    //               ) {
    //                 var valuesArray = [];
    //                 var fields = document.getElementsByName("optionsAdd[]");
    //                 for (var i = 0; i < fields.length; i++) {
    //                   valuesArray.push(fields[i].value);
    //                 }

    //                 var valuesDataAray = [];
    //                 for (var g = 0; g < valuesArray.length; g++) {
    //                   if (valuesArray[g] == "") {
    //                     valuesDataAray.push("false");
    //                   } else {
    //                     valuesDataAray.push("true");
    //                   }
    //                 }

    //                 // javascript array unique
    //                 /* bu funksiyaya esasen bir dizide eyni adli 2 ve daha cox deyer varsa onlari birlesdirir ve bir deyer gosterir */
    //                 function onlyUnique(value, index, self) {
    //                   return self.indexOf(value) === index;
    //                 }

    //                 // console.log(valuesDataAray);
    //                 var newArrayValue = valuesDataAray.filter(onlyUnique);

    //                 if (newArrayValue == "true") {
    //                   $('input[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid #ced4da"
    //                   );
    //                   $('select[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid #ced4da"
    //                   );

    //                   $('input[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .text("");

    //                   $('select[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .text("");

    //                   $("#errorAdd").text("").css("display", "none");

    //                   // check city
    //                   if (selectCity.val() == "") {
    //                     errSelectCity.text(
    //                       "Bu seçim sahəsi boş saxlanmamalıdır"
    //                     );
    //                     selectCity.addClass("errClass");
    //                     $("#errorAdd")
    //                       .text("Şəhər seçim sahəsi boş saxlanmamalıdır")
    //                       .css("display", "block");
    //                   } else {
    //                     errSelectCity.text(" ");
    //                     selectCity.removeClass("errClass");
    //                     $("#errorAdd").text("").css("display", "none");

    //                     // check title
    //                     if (inputElanTitle.val() == "") {
    //                       errInputElanTitle.text("Bu sahə boş saxlanmamalıdır");
    //                       inputElanTitle.addClass("errClass");
    //                       $("#errorAdd")
    //                         .text("Elanın adı sahəsi boş saxlanmamalıdır")
    //                         .css("display", "block");
    //                     } else if (inputElanTitle.val().length < 2) {
    //                       errInputElanTitle.text(
    //                         "Bu sahədə minimum 2 hərf istifadə olunmalıdır"
    //                       );
    //                       inputElanTitle.addClass("errClass");
    //                       $("#errorAdd")
    //                         .text(
    //                           "Elanın adı sahəsi minimum 2 hərf istifadə olunmalıdır"
    //                         )
    //                         .css("display", "block");
    //                     } else {
    //                       errInputElanTitle.text(" ");
    //                       inputElanTitle.removeClass("errClass");
    //                       $("#errorAdd").text("").css("display", "none");

    //                       // check description
    //                       if (textareaAdd.val() == "") {
    //                         errTextareaAdd.text(
    //                           "Məzmun sahəsi boş saxlanmamalıdır"
    //                         );
    //                         textareaAdd.addClass("errClass");
    //                         $("#errorAdd")
    //                           .text("Məzmun sahəsi boş saxlanmamalıdır")
    //                           .css("display", "block");
    //                       } else {
    //                         if (textareaAdd.val().length < 14) {
    //                           errTextareaAdd.text(
    //                             "Məzmun sahəsində minimum 15 karakter olmalıdır"
    //                           );
    //                           textareaAdd.addClass("errClass");
    //                           $("#errorAdd")
    //                             .text(
    //                               "Məzmun sahəsində minimum 15 karakter olmalıdır"
    //                             )
    //                             .css("display", "block");
    //                         } else {
    //                           errTextareaAdd.text(" ");
    //                           textareaAdd.removeClass("errClass");
    //                           $("#errorAdd").text("").css("display", "none");

    //                           // check img
    //                           if (fileInput.get(0).files.length > 0) {
    //                             $imgArray = [];
    //                             // count of multi files
    //                             for (
    //                               $i = 0;
    //                               $i < fileInput.get(0).files.length;
    //                               $i++
    //                             ) {
    //                               var file = fileInput.get(0).files[$i];
    //                               var fileType = file.type;
    //                               if (
    //                                 fileType == "image/png" ||
    //                                 fileType == "image/jpg" ||
    //                                 fileType == "image/jpeg" ||
    //                                 fileType == "image/gif"
    //                               ) {
    //                                 errMultiImg.text(" ");
    //                                 $imgArray.push(file);
    //                               } else {
    //                                 errMultiImg.text(
    //                                   "Şəkilin formatı standartlara uyğun deyil"
    //                                 );
    //                                 $("#errorAdd")
    //                                   .text(
    //                                     "Şəkilin formatı standartlara uyğun deyil"
    //                                   )
    //                                   .css("display", "block");
    //                               }
    //                             }
    //                           } else {
    //                             errMultiImg.text(
    //                               "Şəkil sahəsində ən azı bir şəkil olmalıdır"
    //                             );
    //                             $("#errorAdd")
    //                               .text(
    //                                 "Şəkil sahəsində ən azı bir şəkil olmalıdır"
    //                               )
    //                               .css("display", "block");
    //                             $(".pip").remove();
    //                           }

    //                           if ($imgArray.length > 0) {
    //                             $.ajax({
    //                               url: "php/formAdd.php",
    //                               type: "post",
    //                               data: new FormData(this),
    //                               contentType: false,
    //                               cache: false,
    //                               processData: false,
    //                               dataType: "json",
    //                               beforeSend: showPreloader,
    //                               complete: hidePreloader,
    //                               // beforeSend: function () {
    //                               //   $(".preloader").css("display", "block");
    //                               //   $("body").addClass("overhidden ");
    //                               // },
    //                               success: function (data) {
    //                                 if (data.ok) {
    //                                   window.location.assign(data.ok);
    //                                   $(".form-control").val(" ");
    //                                   $("input [type=file]").val(" ");
    //                                   $(".pip").remove();
    //                                   $("#errorAdd").css("display", "none");
    //                                 } else {
    //                                   $("#errorAdd").css("display", "block");
    //                                   $("#errorAdd").html(data.text);
    //                                 }
    //                                 // $(".preloader").css("display", "none");
    //                                 // $("body").removeClass("overhidden ");
    //                               },
    //                             });
    //                           }
    //                         }
    //                       }
    //                     }
    //                   }
    //                 } else {
    //                   // input
    //                   $('input[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid red"
    //                   );
    //                   $('input[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .html("Zəhmət olmasa bu sahəni boş saxlamayın");

    //                   // select
    //                   $('select[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid red"
    //                   );
    //                   $('select[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .html("Zəhmət olmasa seçim alanından bir seçim edin");

    //                   $("#errorAdd")
    //                     .text("Bütün xanalar tam doldurulmalıdır")
    //                     .css("display", "block");
    //                 }
    //               } else if (
    //                 selectsubCategory.val() == 80 ||
    //                 selectsubCategory.val() == 81 ||
    //                 selectsubCategory.val() == 82 ||
    //                 selectsubCategory.val() == 96 ||
    //                 selectsubCategory.val() == 114
    //               ) {
    //                 // check city
    //                 if (selectCity.val() == "") {
    //                   errSelectCity.text("Bu seçim sahəsi boş saxlanmamalıdır");
    //                   selectCity.addClass("errClass");
    //                   $("#errorAdd")
    //                     .text("Şəhər sahəsi boş saxlanmamalıdır")
    //                     .css("display", "block");
    //                 } else {
    //                   errSelectCity.text(" ");
    //                   selectCity.removeClass("errClass");
    //                   $("#errorAdd").text("").css("display", "none");

    //                   // check title
    //                   if (inputElanTitle.val() == "") {
    //                     errInputElanTitle.text("Bu sahə boş saxlanmamalıdır");
    //                     inputElanTitle.addClass("errClass");
    //                     $("#errorAdd")
    //                       .text("Elanın adı sahəsi boş saxlanmamalıdır")
    //                       .css("display", "block");
    //                   } else if (inputElanTitle.val().length < 2) {
    //                     errInputElanTitle.text(
    //                       "Bu sahədə minimum 2 hərf istifadə olunmalıdır"
    //                     );
    //                     inputElanTitle.addClass("errClass");
    //                     $("#errorAdd")
    //                       .text(
    //                         "Elanın adı minimum 2 hərf istifadə olunmalıdır"
    //                       )
    //                       .css("display", "block");
    //                   } else {
    //                     errInputElanTitle.text(" ");
    //                     inputElanTitle.removeClass("errClass");
    //                     $("#errorAdd").text("").css("display", "none");

    //                     // check price
    //                     if (inputPrice.val() == "") {
    //                       errInputPrice.text("Bu sahəsi boş saxlanmamalıdır");
    //                       inputPrice.addClass("errClass");
    //                       $("#errorAdd")
    //                         .text("Qiymət sahəsi boş saxlanmamalıdır")
    //                         .css("display", "block");
    //                     } else {
    //                       if (!inputPrice.val().match(regexNumber)) {
    //                         errInputPrice.text(
    //                           "Bu sahədə ancaq rəqəmlər istifadə olunmalıdır"
    //                         );
    //                         inputPrice.addClass("errClass");
    //                         $("#errorAdd")
    //                           .text(
    //                             "Qiymət ancaq rəqəmlər istifadə olunmalıdır"
    //                           )
    //                           .css("display", "block");
    //                       } else {
    //                         errInputPrice.text(" ");
    //                         inputPrice.removeClass("errClass");
    //                         $("#errorAdd").text("").css("display", "none");

    //                         // check description
    //                         if (textareaAdd.val() == "") {
    //                           errTextareaAdd.text(
    //                             "Məzmun sahəsi boş saxlanmamalıdır"
    //                           );
    //                           textareaAdd.addClass("errClass");
    //                           $("#errorAdd")
    //                             .text("Məzmun sahəsi boş saxlanmamalıdır")
    //                             .css("display", "block");
    //                         } else {
    //                           if (textareaAdd.val().length < 14) {
    //                             errTextareaAdd.text(
    //                               "Məzmun sahəsində minimum 15 karakter olmalıdır"
    //                             );
    //                             textareaAdd.addClass("errClass");
    //                             $("#errorAdd")
    //                               .text(
    //                                 "Məzmun sahəsində minimum 15 karakter olmalıdır"
    //                               )
    //                               .css("display", "block");
    //                           } else {
    //                             errTextareaAdd.text(" ");
    //                             textareaAdd.removeClass("errClass");
    //                             $("#errorAdd").text("").css("display", "none");

    //                             // check img
    //                             if (fileInput.get(0).files.length > 0) {
    //                               $imgArray = [];
    //                               // count of multi files
    //                               for (
    //                                 $i = 0;
    //                                 $i < fileInput.get(0).files.length;
    //                                 $i++
    //                               ) {
    //                                 var file = fileInput.get(0).files[$i];
    //                                 var fileType = file.type;
    //                                 if (
    //                                   fileType == "image/png" ||
    //                                   fileType == "image/jpg" ||
    //                                   fileType == "image/jpeg" ||
    //                                   fileType == "image/gif"
    //                                 ) {
    //                                   errMultiImg.text(" ");
    //                                   $imgArray.push(file);
    //                                 } else {
    //                                   errMultiImg.text(
    //                                     "Şəkilin formatı standartlara uyğun deyil"
    //                                   );
    //                                   $("#errorAdd")
    //                                     .text(
    //                                       "Şəkilin formatı standartlara uyğun deyil"
    //                                     )
    //                                     .css("display", "block");
    //                                 }
    //                               }
    //                             } else {
    //                               errMultiImg.text(
    //                                 "Şəkil sahəsində ən azı bir şəkil olmalıdır"
    //                               );
    //                               $(".pip").remove();
    //                               $("#errorAdd")
    //                                 .text(
    //                                   "Şəkil sahəsində ən azı bir şəkil olmalıdır"
    //                                 )
    //                                 .css("display", "block");
    //                             }

    //                             if ($imgArray.length > 0) {
    //                               $.ajax({
    //                                 url: "php/formAdd.php",
    //                                 type: "post",
    //                                 data: new FormData(this),
    //                                 contentType: false,
    //                                 cache: false,
    //                                 processData: false,
    //                                 dataType: "json",
    //                                 beforeSend: showPreloader,
    //                                 complete: hidePreloader,
    //                                 // beforeSend: function () {
    //                                 //   $(".preloader").css("display", "block");
    //                                 //   $("body").addClass("overhidden ");
    //                                 // },
    //                                 success: function (data) {
    //                                   if (data.ok) {
    //                                     window.location.assign(data.ok);
    //                                     $(".form-control").val(" ");
    //                                     $("input [type=file]").val(" ");
    //                                     $(".pip").remove();
    //                                     $("#errorAdd").css("display", "none");
    //                                   } else {
    //                                     $("#errorAdd").css("display", "block");
    //                                     $("#errorAdd").html(data.text);
    //                                   }
    //                                   // $(".preloader").css("display", "none");
    //                                   // $("body").removeClass("overhidden ");
    //                                 },
    //                               });
    //                             }
    //                           }
    //                         }
    //                       }
    //                     }
    //                   }
    //                 }
    //               } else {
    //                 var valuesArray = [];
    //                 var fields = document.getElementsByName("optionsAdd[]");
    //                 for (var i = 0; i < fields.length; i++) {
    //                   valuesArray.push(fields[i].value);
    //                 }

    //                 var valuesDataAray = [];
    //                 for (var g = 0; g < valuesArray.length; g++) {
    //                   if (valuesArray[g] == "") {
    //                     valuesDataAray.push("false");
    //                   } else {
    //                     valuesDataAray.push("true");
    //                   }
    //                 }

    //                 // javascript array unique
    //                 /* bu funksiyaya esasen bir dizide eyni adli 2 ve daha cox deyer varsa onlari birlesdirir ve bir deyer gosterir */
    //                 function onlyUnique(value, index, self) {
    //                   return self.indexOf(value) === index;
    //                 }

    //                 // console.log(valuesDataAray);
    //                 var newArrayValue = valuesDataAray.filter(onlyUnique);

    //                 if (newArrayValue == "true") {
    //                   $('input[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid #ced4da"
    //                   );
    //                   $('select[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid #ced4da"
    //                   );

    //                   $('input[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .text("");

    //                   $('select[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .text("");

    //                   $("#errorAdd").text("").css("display", "none");

    //                   // check city
    //                   if (selectCity.val() == "") {
    //                     errSelectCity.text(
    //                       "Bu seçim sahəsi boş saxlanmamalıdır"
    //                     );
    //                     selectCity.addClass("errClass");
    //                     $("#errorAdd")
    //                       .text("Şəhər sahəsi boş saxlanmamalıdır")
    //                       .css("display", "block");
    //                   } else {
    //                     errSelectCity.text(" ");
    //                     selectCity.removeClass("errClass");
    //                     $("#errorAdd").text("").css("display", "none");

    //                     // check title
    //                     if (inputElanTitle.val() == "") {
    //                       errInputElanTitle.text("Bu sahə boş saxlanmamalıdır");
    //                       inputElanTitle.addClass("errClass");
    //                       $("#errorAdd")
    //                         .text("Elanın adı sahəsi boş saxlanmamalıdır")
    //                         .css("display", "block");
    //                     } else if (inputElanTitle.val().length < 2) {
    //                       errInputElanTitle.text(
    //                         "Bu sahədə minimum 2 hərf istifadə olunmalıdır"
    //                       );
    //                       inputElanTitle.addClass("errClass");
    //                       $("#errorAdd")
    //                         .text(
    //                           "Elanın adı minimum 2 hərf istifadə olunmalıdır"
    //                         )
    //                         .css("display", "block");
    //                     } else {
    //                       errInputElanTitle.text(" ");
    //                       inputElanTitle.removeClass("errClass");
    //                       $("#errorAdd").text("").css("display", "none");

    //                       // check price
    //                       if (inputPrice.val() == "") {
    //                         errInputPrice.text("Bu sahəsi boş saxlanmamalıdır");
    //                         inputPrice.addClass("errClass");
    //                         $("#errorAdd")
    //                           .text("Qiymət sahəsi boş saxlanmamalıdır")
    //                           .css("display", "block");
    //                       } else {
    //                         if (!inputPrice.val().match(regexNumber)) {
    //                           errInputPrice.text(
    //                             "Bu sahədə ancaq rəqəmlər istifadə olunmalıdır"
    //                           );
    //                           inputPrice.addClass("errClass");
    //                           $("#errorAdd")
    //                             .text(
    //                               "Qiymət ancaq rəqəmlər istifadə olunmalıdır"
    //                             )
    //                             .css("display", "block");
    //                         } else {
    //                           errInputPrice.text(" ");
    //                           inputPrice.removeClass("errClass");
    //                           $("#errorAdd").text("").css("display", "none");

    //                           // check description
    //                           if (textareaAdd.val() == "") {
    //                             errTextareaAdd.text(
    //                               "Məzmun sahəsi boş saxlanmamalıdır"
    //                             );
    //                             textareaAdd.addClass("errClass");
    //                             $("#errorAdd")
    //                               .text("Məzmun sahəsi boş saxlanmamalıdır")
    //                               .css("display", "block");
    //                           } else {
    //                             if (textareaAdd.val().length < 14) {
    //                               errTextareaAdd.text(
    //                                 "Məzmun sahəsində minimum 15 karakter olmalıdır"
    //                               );
    //                               textareaAdd.addClass("errClass");
    //                               $("#errorAdd")
    //                                 .text(
    //                                   "Məzmun sahəsində minimum 15 karakter olmalıdır"
    //                                 )
    //                                 .css("display", "block");
    //                             } else {
    //                               errTextareaAdd.text(" ");
    //                               textareaAdd.removeClass("errClass");
    //                               $("#errorAdd")
    //                                 .text("")
    //                                 .css("display", "none");

    //                               // check img
    //                               if (fileInput.get(0).files.length > 0) {
    //                                 $imgArray = [];
    //                                 // count of multi files
    //                                 for (
    //                                   $i = 0;
    //                                   $i < fileInput.get(0).files.length;
    //                                   $i++
    //                                 ) {
    //                                   var file = fileInput.get(0).files[$i];
    //                                   var fileType = file.type;
    //                                   if (
    //                                     fileType == "image/png" ||
    //                                     fileType == "image/jpg" ||
    //                                     fileType == "image/jpeg" ||
    //                                     fileType == "image/gif"
    //                                   ) {
    //                                     errMultiImg.text(" ");
    //                                     $imgArray.push(file);
    //                                   } else {
    //                                     errMultiImg.text(
    //                                       "Şəkilin formatı standartlara uyğun deyil"
    //                                     );
    //                                     $("#errorAdd")
    //                                       .text(
    //                                         "Şəkilin formatı standartlara uyğun deyil"
    //                                       )
    //                                       .css("display", "block");
    //                                   }
    //                                 }
    //                               } else {
    //                                 errMultiImg.text(
    //                                   "Şəkil sahəsində ən azı bir şəkil olmalıdır"
    //                                 );
    //                                 $(".pip").remove();
    //                                 $("#errorAdd")
    //                                   .text(
    //                                     "Şəkil sahəsində ən azı bir şəkil olmalıdır"
    //                                   )
    //                                   .css("display", "block");
    //                               }

    //                               if ($imgArray.length > 0) {
    //                                 $.ajax({
    //                                   url: "php/formAdd.php",
    //                                   type: "post",
    //                                   data: new FormData(this),
    //                                   contentType: false,
    //                                   cache: false,
    //                                   processData: false,
    //                                   dataType: "json",
    //                                   beforeSend: showPreloader,
    //                                   complete: hidePreloader,
    //                                   // beforeSend: function () {
    //                                   //   $(".preloader").css("display", "block");
    //                                   //   $("body").addClass("overhidden ");
    //                                   // },
    //                                   success: function (data) {
    //                                     if (data.ok) {
    //                                       window.location.assign(data.ok);
    //                                       $(".form-control").val(" ");
    //                                       $("input [type=file]").val(" ");
    //                                       $(".pip").remove();
    //                                       $("#errorAdd").css("display", "none");
    //                                     } else {
    //                                       $("#errorAdd").css(
    //                                         "display",
    //                                         "block"
    //                                       );
    //                                       $("#errorAdd").html(data.text);
    //                                     }
    //                                     // $(".preloader").css("display", "none");
    //                                     // $("body").removeClass("overhidden ");
    //                                   },
    //                                 });
    //                               }
    //                             }
    //                           }
    //                         }
    //                       }
    //                     }
    //                   }
    //                 } else {
    //                   // input
    //                   $('input[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid red"
    //                   );
    //                   $('input[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .html("Zəhmət olmasa bu sahəni boş saxlamayın");

    //                   // select
    //                   $('select[name="optionsAdd[]"]').css(
    //                     "border",
    //                     "1px solid red"
    //                   );
    //                   $('select[name="optionsAdd[]"]')
    //                     .parent("div")
    //                     .find(".text-danger")
    //                     .html("Zəhmət olmasa seçim alanından bir seçim edin");

    //                   $("#errorAdd")
    //                     .text("Bütün xanalar tam doldurulmalıdır")
    //                     .css("display", "block");
    //                 }
    //               }
    //             }
    //           }
    //         } else {
    //           errInputPhone.text("Bu sahədə 10 rəqəm istifadə olunmalıdır");
    //           inputPhone.addClass("errClass");
    //           $("#errorAdd")
    //             .text("Telefon sahəsində 10 rəqəm istifadə olunmalıdır")
    //             .css("display", "block");
    //         }
    //       }
    //     }
    //   }
    // });
  });

  // carousel2
  $(".owl-carousel").owlCarousel({
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 2,
      },
      900: {
        items: 3,
      },
      1100: {
        items: 4,
      },
      1200: {
        items: 5,
      },
    },
  });

  // isotope js in user elan
  var $projects = $(".projects");

  $projects.isotope({
    itemSelector: ".item",
    layoutMode: "fitRows",
  });

  $("ul.filters > li").on("click", function (e) {
    e.preventDefault();

    var filter = $(this).attr("data-filter");

    $("ul.filters > li").removeClass("active");
    $(this).addClass("active");

    $projects.isotope({ filter: filter });
  });

  // pagination section
  // load_data();
  // function load_data(page) {
  //   $.ajax({
  //     method: "POST",
  //     url: "php/load_data.php",
  //     data: { page: page },
  //     dataType: "text",
  //     success: function (data) {
  //       $("#pagination_data").html(data);
  //     },
  //   });
  // }

  // $(document).on("click", ".next_link", function () {
  //   var page = $(this).attr("id");
  //   load_data(page);
  // });
});
