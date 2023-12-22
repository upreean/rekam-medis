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
const medicineImage = document.querySelector(".medicine-logo");
const medicalRecordImage = document.querySelector(".medical-record-logo");

// Format Image
const imageLocation = "../assets/img/";
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

function logout() {
  window.location.href = "../login/logout.php";
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

function addPatientRoom() {
  window.location.href = "addPatientRoom.php";
}

function doctor() {
  window.location.href = "../doctor/doctor.php";
}

function dashboard() {
  window.location.href = "../index.php";
}

function patient() {
  window.location.href = "../patient/patient.php";
}

function patientRoom() {
  window.location.href = "patientRoom.php";
}

function medicine() {
  window.location.href = "../medicine/medicine.php";
}

function medicalRecord() {
  window.location.href = "../medicalRecord/medicalRecord.php";
}

function setting() {
  window.location.href = "../Setting/setting.php";
}
