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

          {
            // patient routes
          }

          <Route
            path='/hospital/patient/panel'
            element={<PatientPanel />}
          />

          {
            // doctor routes
          }

          <Route
            path='/hospital/doctor/panel'
            element={<StaffPanel />}
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
