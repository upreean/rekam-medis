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

function logout() {
  window.location.href = "../login/logout.php";
}

function doctor() {
  window.location.href = "../doctor/doctor.php";
}

function dashboard() {
  window.location.href = "../index.php";
}

function patient() {
  window.location.href = "patient.php";
}

function patientRoom() {
  window.location.href = "../patientRoom/patientRoom.php";
}

function medicine() {
  window.location.href = "../medicine/medicine.php";
}

function medicalRecord() {
  window.location.href = "../medicalRecord/medicalRecord.php";
}

function setting() {
  window.location.href = "setting.php";
}
