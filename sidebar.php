<section id="sidebar">
      <a href="#" class="brand">
        <img src="assets/img/healthcare.png" />
        <span class="text">REKAM MEDIS</span>
      </a>
      <ul class="side-menu top">
        <li class="active">
          <a href="#" onclick="dashboard()">
            <i class="bx bxs-dashboard"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            onclick="doctor()"
            onmouseover="changeImagesDoctor()"
            onmouseout="defaultImagesDoctor()"
          >
            <i class="bx"
              ><img src="assets/img/doctor.png" class="doctor-logo"
            /></i>
            <span class="text">Dokter</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            onclick="patient()"
            onmouseover="changeImagesPatient()"
            onmouseout="defaultImagesPatient()"
          >
            <i class="bx">
              <img src="assets/img/patient.png" class="patient-logo" />
            </i>
            <span class="text">Pasien</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            onclick="patientRoom()"
            onmouseover="changeImagesPatientRoom()"
            onmouseout="defaultImagesPatientRoom()"
          >
            <i class="bx">
              <img src="assets/img/room.png" class="patient-room-logo" />
            </i>
            <span class="text">Ruangan</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            onclick="medicine()"
            onmouseover="changeImagesMedicine()"
            onmouseout="defaultImagesMedicine()"
          >
            <i class="bx">
              <img src="assets/img/medicines.png" class="medicine-logo" />
            </i>
            <span class="text">Farmasi</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            onclick="medicalRecord()"
            onmouseover="changeImagesMedicalRecord()"
            onmouseout="defaultImagesMedicalRecord()"
          >
            <i class="bx">
              <img
                src="assets/img/medical-records.png"
                class="medical-record-logo"
              />
            </i>
            <span class="text">Rekam Medis</span>
          </a>
        </li>
      </ul>
      <ul class="side-menu">
        <li>
          <a href="#" onclick="setting()">
            <i class="bx bxs-cog"></i>
            <span class="text">Settings</span>
          </a>
        </li>
        <li>
          <a href="#" class="logout" onclick="logout()">
            <i class="bx bxs-log-out-circle"></i>
            <span class="text">Logout</span>
          </a>
        </li>
      </ul>
    </section>