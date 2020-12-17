function previewImg() {
  const cover = document.querySelector("#cover");
  const coverLabel = document.querySelector(".custom-file-label");
  const imgPreview = document.querySelector(".img-preview");

  coverLabel.textContent = cover.files[0].name;

  const filecover = new FileReader();
  filecover.readAsDataURL(cover.files[0]);

  filecover.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}

$(".nav_search_btn").click(function () {
  $(".nav_input").toggleClass("active").focus;
  $(this).toggleClass("animate");
  $(".nav_input").val("");
});

const flashData = $('.flash-data').data('flashdata');
if(flashData){
  console.log('Ai')
  Swal.fire({
    title: "Data Komik",
    text: "Berhasil " + flashData,
    position: "center",
    icon: "success",
    showConfirmButton: false,
    timer: 1500,
  });
}
