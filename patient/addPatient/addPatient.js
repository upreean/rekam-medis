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
const patientRoomImage = document.querySelector(".patient-room-logo");
const medicineImage = document.querySelector(".medicine-logo");
const medicalRecordImage = document.querySelector(".medical-record-logo");

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

// Medical Record
function changeImagesMedicalRecord() {
  const nameImage = imageLocation + "medical-records" + newImage;

  medicalRecordImage.setAttribute("src", nameImage);
}
function defaultImagesMedicalRecord() {
  const nameImage = imageLocation + "medical-records" + defaultImage;

  medicalRecordImage.setAttribute("src", nameImage);
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

searchButton.addEventListener("click", function (e) {
  if (window.innerWidth < 576) {
    e.preventDefault();
    searchForm.classList.toggle("show");
    if (searchForm.classList.contains("show")) {
      searchButtonIcon.classList.replace("bx-search", "bx-x");
    } else {
      searchButtonIcon.classList.replace("bx-x", "bx-search");
    }
  }
});

function logout() {
  window.location.href = "../LoginPage/login.html";
}

if (window.innerWidth < 768) {
  sidebar.classList.add("hide");
} else if (window.innerWidth > 576) {
  searchButtonIcon.classList.replace("bx-x", "bx-search");
  searchForm.classList.remove("show");
}

window.addEventListener("resize", function () {
  if (this.innerWidth > 576) {
    searchButtonIcon.classList.replace("bx-x", "bx-search");
    searchForm.classList.remove("show");
  }
});

const switchMode = document.getElementById("switch-mode");

switchMode.addEventListener("change", function () {
  if (this.checked) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.remove("dark");
  }
});

function doctor() {
  window.location.href = "../../doctor/doctor.html";
}

function dashboard() {
  window.location.href = "../../index.html";
}

function patient() {
  window.location.href = "../patient.html";
}

function patientRoom() {
  window.location.href = "../../patientRoom/patientRoom.html";
}

function medicine() {
  window.location.href = "../../medicine/medicine.html";
}

function medicalRecord() {
  window.location.href = "../../medicalRecord/medicalRecord.html";
}

function setting() {
  window.location.href = "../../Setting/setting.html";
}
