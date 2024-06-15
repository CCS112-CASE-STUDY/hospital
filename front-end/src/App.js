import React from 'react';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import UserLogin from './component/UserLogin';
import StaffPanel from './component/StaffPanel';
import PatientRegistration from './component/PatientRegistration';
import StaffRegistration from './component/StaffRegistration';
import ManageUsers from './component/ManageUsers';

function App() {
  return (
    <div>
      <BrowserRouter>
        <Routes>
          {
            // login route
          }

          <Route
            exact
            path='/'
            element={<UserLogin />}
          />

          {
            // admin routes
          }

          <Route
            path='/hospital/admin/panel'
            element={<StaffPanel />}
          />

          <Route
            path='/hospital/admin/manage_user'
            element={<ManageUsers />}
          />

          <Route
            path='/hospital/admin/view_appointments'
            element={<ViewAppoinments />}
          />

          <Route
            path='/hospital/admin/view_medical_records'
            element={<ViewMedicalRecords />}
          />

          {
            // patient routes
          }

          <Route
            path='/hospital/patient/panel'
            element={<PatientPanel />}
          />

          <Route
            path='/hospital/patient/view_medical_records'
            element={<PatientMedicalRecords />}
          />

          {
            // doctor routes
          }

          <Route
            path='/hospital/doctor/panel'
            element={<StaffPanel />}
          />

          <Route
            path='/hospital/doctor/manage_medical_records'
            element={<ManageMedicalRecords />}
          />

          {
            // receptionist routes
          }

          <Route
            path='/hospital/receptionist/panel'
            element={<StaffPanel />}
          />

          {
            // registration routes
          }

          <Route
            path='/user/patient/register'
            element={<PatientRegistration />}
          />

          <Route
            path='/user/staff/register'
            element={<StaffRegistration />}
          />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
