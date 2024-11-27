package mandala.lijala.Appointment_Management.Repository;

import mandala.lijala.Appointment_Management.Model.Appointments;
import mandala.lijala.Appointment_Management.Model.Doctor;
import mandala.lijala.Appointment_Management.Model.Organization;
import mandala.lijala.Appointment_Management.Model.User;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.*;

import java.time.LocalDate;
import java.time.LocalTime;
import java.util.List;

public interface AppointmentsRepository extends JpaRepository<Appointments, Integer> {
    List<Appointments> findByDoctor(Doctor doctor);
    List<Appointments> findByUserID(User userID);
    @Query("SELECT a FROM Appointments a WHERE a.display = true")
    List<Appointments> findByOrganization(Organization organization);
    boolean existsByDoctorAndAppDateAndAppTime(Doctor doctor, LocalDate appDate, LocalTime appTime);


    List<Appointments> findByDoctorAndAppDateAfter(Doctor doctor, LocalDate date);




}
