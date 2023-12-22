const allSideMenu = document.querySelectorAll("#sidebar .side-menu  li a");

allSideMenu.forEach((item) => {
  const li = item.parentElement;

  item.addEventListener("click", function () {
    allSideMenu.forEach((i) => {
      i.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

// Get element image
const doctorImage = document.querySelector(".doctor-logo");
const patientImage = document.querySelector(".patient-logo");
const patientRoomImage = document.querySelector(".patient-room-logo");
const medicineImage = document.querySelector(".medicine-logo");

// Format Image
const imageLocation = "../../assets/img/";
const defaultImage = ".png";
const newImage = "-blue.png";

// Doctor
function changeImagesDoctor() {
  const nameImage = imageLocation + "doctor" + newImage;

  doctorImage.setAttribute("src", nameImage);
}
function defaultImagesDoctor() {
  const nameImage = imageLocation + "doctor" + defaultImage;

  doctorImage.setAttribute("src", nameImage);
}

// Patient
function changeImagesPatient() {
  const nameImage = imageLocation + "patient" + newImage;

  patientImage.setAttribute("src", nameImage);
}
function defaultImagesPatient() {
  const nameImage = imageLocation + "patient" + defaultImage;

  patientImage.setAttribute("src", nameImage);
}

// Patient Room
function changeImagesPatientRoom() {
  const nameImage = imageLocation + "room" + newImage;

  patientRoomImage.setAttribute("src", nameImage);
}
function defaultImagesPatientRoom() {
  const nameImage = imageLocation + "room" + defaultImage;

  patientRoomImage.setAttribute("src", nameImage);
}

// Medicine
function changeImagesMedicine() {
  const nameImage = imageLocation + "medicines" + newImage;

  medicineImage.setAttribute("src", nameImage);
}
function defaultImagesMedicine() {
  const nameImage = imageLocation + "medicines" + defaultImage;

  medicineImage.setAttribute("src", nameImage);
}

// TOGGLE SIDEBAR
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

const searchButton = document.querySelector(
  "#content nav form .form-input button"
);
const searchButtonIcon = document.querySelector(
  "#content nav form .form-input button .bx"
);
const searchForm = document.querySelector("#content nav form");

function logout() {
  window.location.href = "../LoginPage/login.html";
}

window.addEventListener("resize", function () {
  if (this.innerWidth > 576) {
    searchButtonIcon.classList.replace("bx-x", "bx-search");
    searchForm.classList.remove("show");
  }
});

function doctor() {
  window.location.href = "../../doctor/doctor.html";
}

function dashboard() {
  window.location.href = "../../index.html";
}

function patient() {
  window.location.href = "../../patient/patient.html";
}

function patientRoom() {
  window.location.href = "../../patientRoom/patientRoom.html";
}

function medicine() {
  window.location.href = "../../medicine/medicine.html";
}

function medicalRecord() {
  window.location.href = "../medicalRecord.html";
}

function setting() {
  window.location.href = "../../Setting/setting.html";
}
